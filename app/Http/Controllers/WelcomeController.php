<?php

namespace App\Http\Controllers;

use Session;

use App\Cart;
use App\Like;
use App\Order;

use App\Admin\Page;
use App\Admin\Product;
use App\Admin\Category;
use App\Admin\SubCategory;

use App\Http\Requests;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('active', true)->where('category_id', 21)->orderBy('created_at', 'desc')->paginate(9);
        $product_count = count($products);

        return view('welcome')->with('categories', $categories)->with('subCategories', $subCategories)->with('products', $products)->with('product_count', $product_count);

    }
}
