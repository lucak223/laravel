<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class Pagecontroller extends Controller
{
    public function index(){
        $productList = Product::all();
        $data = [
            'productList' => $productList,
        ];
        return view('page.index',$data);
       }
}
