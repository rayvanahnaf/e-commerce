<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Controller
{
    public function index()
    {
        $category = Category::count();
        $product = Product::count();
        $user = User::where('role', 'user')->count();
        $users = User::where('role', 'user')->get();
        return view('pages.admin.index', compact('category', 'product', 'user','users'));
    }
    public function resetPassword($id)
    {
        //get user by id
        $user = User::findOrFail($id);
        $user->password = Hash::make('password');
        $user->save();
        return redirect()->back()
            ->with('success', 'Reset Password Successfully To This User 🤫');
    }
    
}
