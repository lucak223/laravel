<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Http\Request;

class cartcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Kiểm tra giỏ hàng, nếu chưa có thì tạo giỏ hàng trống
    if (!Session::exists('cart')) {
        Session::put('cart', []);
    }

    $cart = Session::get('cart');
    $totalMoney = 0; // Khởi tạo biến tổng tiền
    foreach ($cart as &$item) {
        $product = Product::find($item['id']);

        if ($product) {
            $item['name'] = $product->name;
            $item['slug'] = $product->slug;
            $item['price'] = $product->price;
            $item['sale_price'] = $product->sale_price;
            $item['total'] = (($item['sale_price']) ? $item['sale_price'] : $item
            ['price']) * $item['quantity'];
            $totalMoney += $item['total'];
        }
        Session::put('cart', $cart);
        $data = [
            'cart' => $cart,
            'totalMoney' => $totalMoney
            ];
            return view('cart.index', $data);
    }
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   
    public function store(Request $request)
    {
        if (!Session::exists('cart')) {
            // Tạo giỏ hàng nếu chưa có
            Session::put('cart', []);
        }
    
        // Khi thêm SP vào cart
        // TH1: Đã có sản phẩm trong cart -> tăng số lượng
        $inCart = false;
        $cart = Session::get('cart');
        foreach ($cart as &$item) {
            if ($item['id'] == $request->id) {
                $item['quantity'] += $request->quantity;
                $inCart = true;
                Session::put('cart', $cart);
                break;
            }
        }
    
        // TH2: Chưa có sản phẩm -> thêm vào cart
        if (!$inCart) {
            Session::push('cart', [
                "id" => $request->id,
                "quantity" => $request->quantity
            ]);
        }
    
        // Session::forget('cart');
        // print_r(Session::get('cart'));
        $product = Product::find($request->id);
        return redirect('/detail/'.$product->slug)->with('success', 'Đã thêm vào giỏ');

    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Kiểm tra giỏ hàng ? Nếu chưa có -> Tạo cái giỏ trống
        if (!Session::exists('cart')) {
            Session::put('cart', []);
        }
    
        $cart = Session::get('cart');
    
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $request->quantity;
                break;
            }
        }
    
        Session::put('cart', $cart);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Kiểm tra giỏ hàng ? Nếu chưa có -> Tạo cái giỏ trống
    if (!Session::exists('cart')) {
        Session::put('cart', []);
    }

    $cart = Session::get('cart');

    foreach ($cart as $index => $item) {
        if ($item['id'] == $id) {
            unset($cart[$index]);
            break;
        }
    }

    Session::put('cart', $cart);
}
}
