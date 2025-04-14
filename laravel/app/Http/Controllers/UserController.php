<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
        public function index()
{
    $userList = User::all();
    return response()->json([
        'success' => true,
        'message' => 'Lấy dữ liệu thành công!',
        'data' => $userList
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm tài khoản mới!',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi khi thêm tài khoản mới!',
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Lấy dữ liệu thành công!',
            'data' => $user
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
        $user = User::find($id);

      if ($request->name) {
            $user->name = $request->name;
        }
        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->role) {
            $user->role = $request->role;
        }
        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã sửa tài khoản mới!',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi khi sửa tài khoản mới!',
            ], 422);
        }

    }
    public function login(){
        return view('user.login');
       }
       public function register(){
        return view('user.register');
       }

    public function postlogin(Request $request){
        $isLogin = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
    
        if ($isLogin) {
            if (Auth::user()->role == 'admin'){
                return redirect('/admin');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login')->with('rerror', 'Email hoặc mật khẩu không đúng');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');

    }
    public function destroy(string $id)
{
    $user = User::find($id);
    $user->delete();
    return response()->json([
        'success' => true,
        'message' => 'Xóa tài khoản thành công!',
    ], 200);
}
}
