<?php

namespace App\Http\Controllers\user;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboardcontroller extends Controller
{
    public function index(){
        $userTransaction = Transaction::where('user_id', auth()->user()->id)->get();
        $pending = $userTransaction->where('status', 'PENDING')->count();
        $settlement = $userTransaction->where('status', 'settlement')->count();
        $expired = $userTransaction->where('status', 'expired')->count();
        $success = $userTransaction->where('status', 'success')->count();

        return view('pages.user.index', compact('pending', 'settlement', 'expired'));

    }


}
