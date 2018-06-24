<?php

use App\Admin\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

        /*
        $rootProjectPatchDir = base_path();
        $outsideProjectPatchDir = dirname($rootProjectPatchDir, 2);


        if(!is_dir($outsideProjectPatchDir.'/shared')) {
            File::makeDirectory($outsideProjectPatchDir . '/shared', 0777, true);
        }

        if(!is_dir($outsideProjectPatchDir.'/shared/public')) {
            File::makeDirectory($outsideProjectPatchDir . '/shared/public', 0777, true);
        }

        if(!is_dir($outsideProjectPatchDir.'/shared/public/storage')) {
            File::makeDirectory($outsideProjectPatchDir . '/shared/public/storage', 0777, true);
        }

        if(!is_dir($outsideProjectPatchDir.'/shared/public/storage/upload_pictures')){
            File::makeDirectory($outsideProjectPatchDir.'/shared/public/storage/upload_pictures', 0777, true);
        }

        if(!is_dir($outsideProjectPatchDir.'/shared/public/storage/common_pictures')) {
            File::makeDirectory($outsideProjectPatchDir . '/shared/public/storage/common_pictures', 0777, true);
        }

        $upload_pic_path = $outsideProjectPatchDir.'/shared/public/storage/upload_pictures';
        $common_pic_path = $outsideProjectPatchDir . '/shared/public/storage/common_pictures';
        */



        /*
        if(!is_dir($upload_pic_path.'/'.$productId)) {
            File::makeDirectory($upload_pic_path.'/'.$productId, 0777, true);
        }
        */


        Storage::makeDirectory('public/upload_pictures/'.$productId);
        $image = Image::make($file_main_pic->getRealPath());


        //$path = $upload_pic_path.'/'.$productId.'/'. $fileNameToStore;

        $path = storage_path('app/public/upload_pictures/'.$productId.'/'. $fileNameToStore);


        $water_mark = storage_path('app/public/common_pictures/watermark.png');

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