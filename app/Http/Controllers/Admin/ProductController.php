<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOpening;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->with('unit','category')->get();
        return view('admin.Product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouses = Warehouse::query()->select(['id','title'])->get();
        $categories = Category::query()->get();
        $units = Unit::query()->get();
        return view('admin.Product.create',compact('warehouses','categories','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::transaction(function() use($request){
        $request->validate([
            'title'=>['required','string'],
            'category_id'=>['required','numeric','exists:categories,id'],
            'unit_id'=>['required','numeric','exists:units,id'],
            'warehouse_id'=>['required','numeric','exists:warehouses,id'],
            'quantity'=>['required','numeric'],
            'rate'=>['required','numeric'],
            'selling_price'=>['required','numeric'],
            'description'=>['nullable','string']
        ]);

        $opening = $request->only(['quantity','rate']);
       $opening = ProductOpening::create($opening);

        $rate = $request->selling_price;
        $opening_id = $opening->id;
        $slug = Str::slug($request->title);
        $product = Product::query()->select('sku')->latest()->first();
        if($product){
            $sku = $product->sku +1;
        }else{
            $sku = 11111111;
        }


        $productData = array_merge($request->only(['title','category_id','unit_id','description']),
        compact('rate','opening_id','slug','sku'));
       $product =  Product::create($productData);
       $product->storage()->create($request->only(['warehouse_id','quantity']));


        
   });

   return redirect()->route('admin.product.index');

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
             $warehouses = Warehouse::query()->select(['id','title'])->get();
             $categories = Category::query()->get();
             $units = Unit::query()->get();
             
             return view('admin.Product.edit',compact('warehouses','categories','units','product'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
