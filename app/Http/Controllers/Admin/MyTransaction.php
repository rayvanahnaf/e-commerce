<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use App\Models\transactionItem;
use Illuminate\Http\Request;


class MyTransaction extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mytransaction = transaction::with(['user'])->where('user_id',auth()->user()->id)->latest()->get();
        return view('pages.admin.my-transaction.index',compact('mytransaction'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showDataBySlugAndId($slug, $id) {
        $transaction = transaction::where('slug', $slug)->where('id', $id)->firstOrFail();

        return view('pages.admin.my-transaction.show', compact(
            'transaction'
        ));
    }
}
