<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
       $validator = Validator::make($request->all(),[
            'name' => 'required|unique:products,name,',
            'price' => 'required|integer',
            'description' => 'required|string'
       ]);
       if($validator->fails()){
           return sendErrorResponse("Validation Error!", $validator->errors(), 422);
       }
       $data = $validator->validated();
       $data['slug'] = Str::slug($data['name']);
      return $this->product->store($data);
    }

    public function show($id){
       return $this->product->show($id);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'unique:products,name,'.$id],
            'price' => 'required|integer',
            'description' => 'required|string'
       ]);
       if($validator->fails()){
           return sendErrorResponse("Validation Error!", $validator->errors(), 422);
       }
       $data = $validator->validated();
       $data['slug'] = Str::slug($data['name']);
      return  $this->product->update($data, $id);
    }
    public function destroy($id){
       return $this->product->delete($id);
    }
}
