<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Product;
use App\Models\transaction;
use App\Models\transactionItem;
use Exception;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class FrontendController extends Controller
{
    public function index()
    {

        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->limit(8)->get();

        // dd($product);

        return view('pages.frontend.index2', compact('category', 'product'));
    }

    public function detailProduct($slug)
    {
        $category = Category::select('id', 'name')->latest()->get();
        $product = Product::with('product_galleries')->where('slug', $slug)->first();
        $recomendation = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->inRandomOrder()->limit(4)->get();
        return view('pages.frontend.detailProduct', compact('product', 'category', 'recomendation'));
    }
    public function detailCategory($slug)
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $categories = Category::where('slug', $slug)->first();
        $product = Product::with('product_galleries')->where('category_id', $categories->id)->latest()->get();
        return view('pages.frontend.detailCategory', compact('category', 'categories', 'product'));
    }
    public function cart()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->latest()->get();
        return view('pages.frontend.cart', compact('category', 'cart'));
    }
    public function addToCart(Request $request, $id)
    {
        try {
            cart::create([
                'product_id' => $id,
                'user_id' => auth()->user()->id

            ]);
            return redirect()->route('cart');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
    public function deleteCart($id)
    {
        try {
            cart::findOrFail($id)->delete();
            return redirect()->route('cart');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
    public function checkout(Request $request)
    {
        try {
            $data = $request->all();
            //gat data cart user
            $cart = cart::with('product')->where('user_id', auth()->user()->id)->get();
            //dd data cart
            // dd($cart);
            //create transaction
            $transaction = transaction::create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'addres' => $data['addres'],
                'phone' => $data['phone'],
                'total_price' => $cart->sum('product.price')
            ]);
            //create transaction item
            foreach ($cart as $item) {
                transactionItem::create([
                    'user_id' => auth()->user()->id,
                    'transaction_id' => $transaction->id,
                    'product_id' => $item->product->id
                ]);
            }
            cart::where('user_id', auth()->user()->id)->delete();
            //seting midtrans
            //use midtrans\config
            //use midtrans\snap
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$clientKey = config('services.midtrans.clientKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$isSanitized = config('services.midtrans.is3ds');
            //setup var midtrans
            $midtrans = [
                'transaction_details' => [
                    'order_id' => 'RAY'.$transaction->id,
                    'gross_amount' => (int) $transaction->total_price,
                ],
                'customer_details' => [
                    'first_name' => $transaction->name,
                    'email'=>$transaction->email,
                    'phone'=>$transaction->phone
                ],
                'enable_payment'=>[
                    'gopay',
                    'bank_transfer',
                ],
                'vtweb'=>[],

            ];
            //create payment url from midtrans
            $paymentUrl=Snap::createTransaction($midtrans)->redirect_url;
            //update payment url
            $transaction->update([
                'payment_url'=>$paymentUrl
            ]);
            return redirect($paymentUrl);

        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
}
