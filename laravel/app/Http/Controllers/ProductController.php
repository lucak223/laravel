<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ProductList = Product::all();
        return response()->json([
            'success' => true,
            'message' => 'Lấy dữ liệu thành công!',
            'data' => $ProductList
        ], 200);
    
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
        $Product = new Product();
        $Product->name = $request->name;
        $Product->sale_price = $request->sale_price;
        $Product->slug = $request->slug;
        $Product->image = $request->image;
        $Product->price = $request->price;
        $Product->description = $request->description;
        $Product->rating = $request->rating;
        $Product->quantity = $request->quantity;
    
        $Product->category_id = $request->category_id;
        if ($Product->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm SP mới!',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi khi thêm SP mới!',
            ], 422);
        }
    }
    public function detail($slug){
        $product = Product::where('slug', $slug)->first();

        $data = [
            'product' => $product,
        ];
        return view('product.detail', $data);
       }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Product = Product::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Lấy dữ liệu thành công!',
            'data' => $Product
        ]);
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
        $Product = Product::find($id);

      if ($request->name) {
            $Product->name = $request->name;
        }
        if ($request->sale_price) {
            $Product->sale_price = $request->sale_price;
        }
        if ($request->slug) {
            $Product->slug = $request->slug;
        }
        if ($request->image) {
            $Product->image = $request->image;
        }
        if ($request->price) {
            $Product->price = $request->price;
        }
        if ($request->description) {
            $Product->description = $request->description;
        }
        if ($request->rating) {
            $Product->rating = $request->rating;
        }
        if ($request->quantity) {
            $Product->quantity = $request->quantity;
        }
        if ($Product->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã sửa SP mới!',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi khi sửa SP mới!',
            ], 422);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Product = Product::find($id);
        $Product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Xóa SP thành công!',
        ], 200);
    }
}
