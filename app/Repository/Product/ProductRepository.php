<?php
namespace App\Repository\Product;
use App\Models\Product;
class ProductRepository implements ProductInterface{
    public function index(){
        $data = Product::get();
        return sendSuccessResponse($data);
    }
    public function store($data = []){
        $data = Product::create($data);
        return sendSuccessResponse($data, 'Data Created Successfully!', '201');
    }

    public function show($id){
        $data = Product::find($id);
        if($data){
            return sendSuccessResponse($data);
        }else{
            return sendErrorResponse([], 'Data Not Found!', '404');
        }
    }

    public function update($data = [] , $id){
       $data =  Product::find($id)->update();
        return sendSuccessResponse($data, 'Data Updated Successfully!');
    }

    public function delete($id){
       $data =  Product::find($id)->delete();
        if($data){
            return sendSuccessResponse([], 'Data Deleted Successfully!', '201');
        }
     }

}
