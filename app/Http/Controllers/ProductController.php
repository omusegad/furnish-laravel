<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    use UploadTrait;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = ProductCategory::all();
        return view('products.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = Validator::make($request->all(), [
        //     'product_category_id' => 'integer|required',
        //     'product_name' => 'string|required',
        //     'description' => 'string|required',
        //     'product_image' => 'required|mimes:jpg,png,jpeg,gif,svg',
        //     'regular_price'  => 'numeric|required',
        //     'offer_percentage'  => 'numeric|required'
        // ]);

        if ($request->has('product_image')) {
            $image = $request->file('product_image');
            $name = Str::slug($request->input('product_name')).time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension() ;
            $this->uploadOne($image, $folder, 'public', $name);
        }

        $data = $request->all();
        $data['sale_price'] = $this->getSalePrice( $data['offer_percentage'],  $data['regular_price']);
        $data['user_id'] = Auth::id();
        $data['product_image_url'] =  $filePath ?? "";

        // dd($data);
        Product::create($data);
        return back()->with('message', "Product created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Product::findOrFail($id);
       // dd( $cat)
        return view('products.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::where('id',$id)->update([
            'ProductName' => $request->input('ProductName'),
            'description' => $request->input('description'),
        ]);
        return back()->with('message','Product deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index')->with('message','Product deleted successfully!');

    }

    private function  getSalePrice($offerP, $regularPrice){
        $discount = ($regularPrice * $offerP/100);
        $saleprice = ( $regularPrice - $discount );
        return $saleprice;
    }
}
