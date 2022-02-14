<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repository\Product\ProductInterface;
class ProductController extends Controller
{
    protected $product;
    public function __construct(ProductInterface $product){
        $this->product = $product;
    }
    public function index(){
        return $this->product->index();
    }
    public function store(Request $request){
        //return $request->all();
      return $this->product->store($request->all());
    }

    public function show($id){
       return $this->product->show($id);
    }
    public function update(Request $request, $id){
        //return $request->all();
      return  $this->product->update($request->all(), $id);
    }
    public function destroy($id){
       return $this->product->delete($id);
    }
}
