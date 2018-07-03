<?php

namespace App\Http\Controllers\Admin;

use App\Admin\SubCategory;
use App\Admin\Category;
use App\Admin\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;
use ImagesHelper;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products.index')->with('categories', $categories)->with('subCategories', $subCategories)->with('products', $products)->with('title', 'Всички продукти');
    }

    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.products.show')->with('categories', $categories)->with('subCategories', $subCategories)->with('product', $product)->with('title', 'Преглед на продукта');
    }

    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.products.create')->with('categories', $categories)->with('subCategories', $subCategories)->with('title', 'Създаване на продукт');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'     => 'required',
            'sub_category_id' => 'required',
        ]);

        $productId = ImagesHelper::getLastProductId() + 1;
        $descriptionRequest =  $request->input('description');

        if($request->hasFile('upload_gallery_pictures') )
        {
            $files_gallery_pic = $request->file('upload_gallery_pictures');

            for($i = 0; $i < count($files_gallery_pic); $i++)
            {
                if ($i == 0)
                {
                    $descriptionRequest['upload_main_picture'] = $this->resizeImages($files_gallery_pic[$i], $productId, $request->input('resize_percent'));
                }
                else
                {
                    $descriptionRequest['gallery'][$i]['upload_picture'] = $this->resizeImages($files_gallery_pic[$i], $productId, $request->input('resize_percent'));
                }
            }
        }

        if(!is_dir(storage_path('app/public/upload_pictures/'.$productId))){
            session()->flash('notif', 'Проблем със създаването на директорията на снимката');

            return redirect('admin/products/create');
        }


        if(isset($descriptionRequest['delivery_price'])) {
            $descriptionRequest['delivery_price'] = $this->price_format($descriptionRequest['delivery_price']);
        }

        if(isset($descriptionRequest['price'])) {

            $descriptionRequest['price'] = $this->price_format($descriptionRequest['price']);
        }

        if(isset($descriptionRequest['old_price'])){
            $descriptionRequest['old_price'] = $this->price_format($descriptionRequest['old_price']);
        }

        $descriptionRequest['article_id'] = mt_rand();

        $description = json_encode( $descriptionRequest, JSON_UNESCAPED_UNICODE );
        $subCategoryName = SubCategory::find($request->input('sub_category_id'))->name;

        $product = new Product;
        $product->category_id     = $request->input('category_id');
        $product->sub_category_id = $request->input('sub_category_id');
        $product->identifier      = preg_replace('/\s+/', '_', mb_strtolower($subCategoryName));
        $product->active          = $request->input('active');
        $product->sale            = $request->input('sale');
        $product->recommended     = $request->input('recommended');
        $product->best_sellers    = $request->input('best_sellers');
        $product->product_color   = $request->input('product_color');
        $product->description     = $description;
        $product->save();

        session()->flash('notif', 'Продукта е създаден');

        return redirect('admin/products/create');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.products.edit')->with('categories', $categories)->with('subCategories', $subCategories)->with('product', $product)->with('title', 'Обновяване информацията за продукта');
    }

    public function resizeImages($picture, $productId, $resize_percent)
    {
        $extension = $picture->getClientOriginalExtension();
        $fileNameToStore = 'basic_'.time().'.'.$extension;
        $pathToStore = storage_path('app/public/upload_pictures/'.$productId);

        if(!is_dir($pathToStore)){
            Storage::makeDirectory('public/upload_pictures/'.$productId, 0775, true);
        }

        list($width, $height) = getimagesize($picture->getRealPath());

        $newWidth  = intval(($resize_percent / 100) * $width);
        $newHeight = intval(($resize_percent / 100) * $height);

        Image::make($picture->getRealPath())->resize($newWidth, $newHeight)->save($pathToStore.'/'.$fileNameToStore);

        return $fileNameToStore;
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id'     => 'required',
            'sub_category_id' => 'required',
        ]);

        $product = Product::find($id);
        $descriptionRequest =  $request->input('description');

        $old_descriptions = json_decode($product->description, true);

        if($request->hasFile('upload_gallery_pictures') )
        {
            $files_gallery_pic = $request->file('upload_gallery_pictures');

            for($i = 0; $i < count($files_gallery_pic); $i++)
            {
                if ($i == 0)
                {
                    $descriptionRequest['upload_main_picture'] = $this->resizeImages($files_gallery_pic[$i], $productId, $request->input('resize_percent'));
                }
                else
                {
                    $descriptionRequest['gallery'][$i]['upload_picture'] = $this->resizeImages($files_gallery_pic[$i], $productId, $request->input('resize_percent'));
                }
            }
        }


        if(isset($descriptionRequest['delivery_price'])) {

            $descriptionRequest['delivery_price'] = $this->price_format($descriptionRequest['delivery_price']);
        }

        if(isset($descriptionRequest['price'])) {
            $descriptionRequest['price'] = $this->price_format($descriptionRequest['price']);
        }

        if(isset($descriptionRequest['old_price'])){
            $descriptionRequest['old_price'] = $this->price_format($descriptionRequest['old_price']);
        }

        $description = json_encode( $descriptionRequest, JSON_UNESCAPED_UNICODE );
        $subCategoryName = SubCategory::find($request->input('sub_category_id'))->name;

        $product->category_id     = $request->input('category_id');
        $product->sub_category_id = $request->input('sub_category_id');
        $product->identifier      = preg_replace('/\s+/', '_', mb_strtolower($subCategoryName));
        $product->active          = $request->input('active');
        $product->sale            = $request->input('sale');
        $product->recommended     = $request->input('recommended');
        $product->best_sellers    = $request->input('best_sellers');
        $product->product_color   = $request->input('product_color');
        $product->description     = $description;
        $product->save();

        $actual_data = Product::find($id);
        $new_descriptions = json_decode($actual_data->description, true);

        if (isset($new_descriptions['gallery']))
        {
            $pic_files = Storage::allFiles('public/upload_pictures/'.$id.'/');
            $pic_name = array();

            for($i = 0; $i< count($pic_files); $i++)
             {
                 $file_name = pathinfo($pic_files[$i], PATHINFO_FILENAME);
                 if(mb_substr($file_name, 0, 5) != 'basic')
                 {
                     $file_exn = pathinfo($pic_files[$i],  PATHINFO_EXTENSION);
                     $file_name = pathinfo($pic_files[$i], PATHINFO_FILENAME);
                     $pic_name[$i] = $file_name.'.'.$file_exn;
                 }
             }

            $new_pictures = array_column($new_descriptions['gallery'], 'upload_picture');
            $diff_pic = array_diff($pic_name, $new_pictures);

            foreach($diff_pic as $old_picture)
            {
                Storage::delete('public/upload_pictures/'.$id.'/'.$old_picture);
            }
        }

        session()->flash('notif', 'Продукта е обновен');
        return redirect('/admin/products')->with('title', 'Обновяване на продукта');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Storage::deleteDirectory('public/upload_pictures/'.$id);
        session()->flash('notif', 'Продукта е изтрит');
        return redirect('/admin/products');
    }

    public function price_format($price){
        return number_format(str_replace(",", ".", floatval($price)), 2);
    }
}
