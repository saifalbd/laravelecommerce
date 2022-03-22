<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOpening;
use App\Models\ProductStorage;
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

        $opening = $request->only(['quantity','rate','warehouse_id']);
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
             $product->load('opening');
            // return $product;
             return view('admin.Product.edit',compact('warehouses','categories','units','product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
        'title'=>['required','string'],
        'category_id'=>['required','numeric','exists:categories,id'],
        'unit_id'=>['required','numeric','exists:units,id'],
        'warehouse_id'=>['nullable','numeric','exists:warehouses,id'],
        'quantity'=>['required','numeric'],
        'rate'=>['required','numeric'],
        'selling_price'=>['required','numeric'],
        'description'=>['nullable','string']
        ]);

    DB::transaction(function() use($request,$product){

          $opening = $request->only(['quantity','rate','warehouse_id']);


          $rate = $request->selling_price;
          $slug = Str::slug($request->title);

          $productData = array_merge($request->only(['title','category_id','unit_id','description']),
          compact('rate','slug'));

 

          $product->update($productData);

          $store= $product->storage->first();
          $store->decrement('quantity',$product->opening->quantity);

          if($request->warehouse_id){
          $has = $product->storage()->where('warehouse_id',$request->warehouse_id)->first();
          if($has){
          $has->increment('quantity',$request->quantity);
          }else{
          $product->storage()->create($request->only(['warehouse_id','quantity',]));
          }
          }else{
          $store->increment('quantity',$request->quantity);

          }

  


          $opening = $product->opening()->update($opening);

    });
     

   return redirect()->route('admin.product.index');
      


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
