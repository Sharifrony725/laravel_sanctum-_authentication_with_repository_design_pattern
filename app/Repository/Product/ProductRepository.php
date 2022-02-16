<?php
namespace App\Repository\Product;
use App\Models\Product;
use Illuminate\Database\QueryException;

class ProductRepository implements ProductInterface{
    public function index(){
        try{
            $data = Product::get();
            return sendSuccessResponse($data);
        }catch(QueryException $e){
            return sendErrorResponse("Something Went Wrong!", $e->getMessage(), 500);
        }
    }
    public function store($data = []){
        $data = Product::create($data);
        return sendSuccessResponse($data, 'Data Created Successfully!', '201');
    }

    public function show($id){
        try{
            $data = Product::find($id);
            if($data){
                return sendSuccessResponse($data);
            }else{
                return sendErrorResponse([], 'Data Not Found!', '404');
            }
        }catch(QueryException $e){
            return sendErrorResponse("Something Went Wrong!", $e->getMessage(), 500);
        }

    }

    public function update($data = [] , $id){
        try{
            $data =  Product::find($id)->update();
            return sendSuccessResponse($data, 'Data Updated Successfully!');
        }catch(QueryException $e){
            return sendErrorResponse("Something Went Wrong!", $e->getMessage(), 500);
        }
    }

    public function delete($id){
        try{
            $data =  Product::find($id)->delete();
            if($data){
                return sendSuccessResponse([], 'Data Deleted Successfully!', '201');
            }
        }catch(QueryException $e){
            return sendErrorResponse("Something Went Wrong!", $e->getMessage(), 500);
        }

     }

}
