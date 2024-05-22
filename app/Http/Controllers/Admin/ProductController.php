<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $product = Product::select('id', 'name', 'price', 'category_id', 'description')->latest()->get();  // mengambil semua isi tabel news dan diurutkan secara latest (terbaru)
        $category = Category::all();   // menampilkan semua data yang ada didalam table category
        return view('pages.admin.Product.index', compact('product', 'category'));
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
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        try {
            // create category
            $data = $request->all();


            $data['name'] = $request->name;
            $data['category_id'] = $request->category_id;
            $data['price'] = $request->price;
            $data['slug'] = Str::slug($request->name);
            $data['description'] = $request->description;

            product::create($data);

            return redirect()->back()->with('success', 'Success To Add Category');

            // dd($category);

        } catch (Exception $e) {
            dd($e->getMessage());
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
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required'


        ]);
        $product = Product::find($id);
        try {

            $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            $product->update($data);
            return redirect()->back()->with('success', 'berhasil diubah 😁');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'GAGAL UPDATE 😭');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // find prod by id
            $product = product::find($id);
            // delete prod
            $product->delete();
            return redirect()->back()->with('success', 'Success To Delete Category');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed To Delete Category');
        }
    }
}
