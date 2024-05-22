<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Storage;

class AdminCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::select('id', 'name', 'image')->latest()->get();

        return view('pages.admin.category.index', compact('category'));
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
        $this->validate($request, [
            'name'=>'required',
            'image'=>'required|image|mimes:png,jpeg,jpg|max:3000'
        ]);
        try {
            $data = $request->all();

            //store image
            $image = $request->file('image');
            $image->storeAs('public/category', $image->hashName());

            // create category
            $data['image'] = $image->hashName();
            $data['slug']= Str::slug($request->name);

            Category::create($data);

            return redirect()->back()->with('success', 'berhasil');

        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed To Add Category');
        }
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $category = Category::find($id);
        try {
            if ($request->file('image')=='') {
                $data = $request->all();
                $data['slug']=Str::slug($request->name);
                $category->update($data);
                return redirect()->back()->with('success', 'berhasil tanpa gambar 😎 ');
            }else{
                //DELET IMG
                Storage::disk('local')->delete('public/category/'.basename($category->image));
                //store img
                $image = $request->file('image');
                $image->storeAs('public/category', $image->hashName());
                $data=$request->all();
                $data['image']=$image->hashName();
                $data['slug']=Str::slug($request->name);
                $category->update($data);
                return redirect()->back()->with('success', 'berhasil diubah 😁');
            }
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'GAGAL UPDATE 😭');
        }
      
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // find category
            $category = Category::find($id);
            // delete img
            Storage::disk('local')->delete('public/category/' .basename($category->image));
            //delete data by id
            $category->delete();
            return redirect()->back()->with('success', 'berhasil');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gabisa diapus 👾');
        }
    }
}
