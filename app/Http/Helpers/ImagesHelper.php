<?php

use App\Admin\Product;
use Illuminate\Support\Facades\DB;
use Image;

class ImagesHelper{

    public static function getLastProductId()
    {
        if(!isset(DB::table('products')->latest('id')->first()->id))
        {
            $product = new Product;
            $product->user_id = 1;
            $product->seller_id = 1;
            $product->category_id     = 1;
            $product->sub_category_id = 1;
            $product->identifier      = '';
            $product->sale            = 0;
            $product->active          = 0;
            $product->recommended     = 0;
            $product->best_sellers    = 0;
            $product->description     = '';
            $product->save();

            $oldId = DB::table('products')->latest('id')->first()->id;

            $product = Product::find($oldId);
            $product->delete();
        }
        else
        {
            $oldId = DB::table('products')->latest('id')->first()->id;
        }

        return $oldId;
    }

    public static function resizeImages($file_main_pic, $productId, $water_checked, $width, $height)
    {
        $extension = $file_main_pic->getClientOriginalExtension();
        $fileNameToStore = 'basic_'.time().'.'.$extension;

        $rootProjectPatchDir = base_path();
        $outsideProjectPatchDir = dirname($rootProjectPatchDir, 2);

        if(!is_dir($outsideProjectPatchDir.'/shared/storage/upload_pictures')){
            File::makeDirectory($outsideProjectPatchDir.'/shared', 0777, true);
            File::makeDirectory($outsideProjectPatchDir.'/shared/storage', 0777, true);
            File::makeDirectory($outsideProjectPatchDir.'/shared/storage/upload_pictures', 0777, true);
        }

        if(!is_dir($outsideProjectPatchDir.'/shared/storage/common_pictures')) {
            File::makeDirectory($outsideProjectPatchDir . '/shared/storage/common_pictures', 0777, true);
        }

        $upload_pic_path = $outsideProjectPatchDir.'/shared/storage/upload_pictures';
        $common_pic_path = $outsideProjectPatchDir . '/shared/storage/common_pictures';

        if(!is_dir($upload_pic_path.'/'.$productId)) {
            File::makeDirectory($upload_pic_path.'/'.$productId, 0777, true);
        }

        $image = Image::make($file_main_pic->getRealPath());
        $path = $upload_pic_path.'/'.$productId.'/'. $fileNameToStore;
        $water_mark = $common_pic_path.'/watermark.png';

        if(file_exists($water_mark) && $water_checked == 1)
        {
            $image->resize($width, $height)->insert($water_mark, 'bottom-right', 10, 10)->save($path);
        }
        else
        {
            $image->resize($width, $height)->save($path);
        }

        return $fileNameToStore;
    }
}