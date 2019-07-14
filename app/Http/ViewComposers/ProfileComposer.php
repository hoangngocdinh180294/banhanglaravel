<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Typeproduct;



class ProfileComposer{
    public function compose(View $view){
        $typeproduct =Typeproduct::all();
        $view->with(compact('typeproduct'));
        $product =Product::all();
        $view->with(compact('product'));
    }


}