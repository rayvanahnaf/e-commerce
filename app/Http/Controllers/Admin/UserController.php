<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'user')->select('id', 'name', 'email')->latest()->get();

        return view('pages.admin.user.index', compact('user'));
    }

    public function resetPassword(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update(['password' => bcrypt("password")]);
            return redirect()->back()->with('success', "Successfully Reset Password To Password");
        } catch (\Exception $th) {
            return redirect()->back()->with('error', "Failed To Reset Password To Password");
        }
    }
}
