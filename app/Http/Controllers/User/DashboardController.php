<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.user.index');
    }

    public function changePassword(Request $request) {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        try {
            $currentPassword = Hash::check($request->old_password, auth()->user()->password);

            if ($currentPassword) {
                if ($request->password == $request->confirm_password) {
                    $user = auth()->user();
                    $user->password = Hash::make($request->password);
                    $user->save();

                    return redirect()->back()->with('success', 'Your Password Successfully Has Been Changed');
                } else {
                    return redirect()->back()->with('error', 'Your New Password Is Not Same With Confirm Password');
                }
            } else {
                return redirect()->back()->with('error', 'Your Old Password Is Wrong');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Failed To Change Password');
        }
    }
}
