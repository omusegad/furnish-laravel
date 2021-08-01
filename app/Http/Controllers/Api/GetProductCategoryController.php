<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;

class GetProductCategoryController extends Controller
{
    public function index(Request $request){
       // $data = ProductCategory::all();
        $data =  ProductCategoryResource::collection(ProductCategory::all());
         if($data) {
             return response()->json(["data"  => $data ], 200);
        }else if(emplty($data)){
             return response()->json(["data"  => "No Result available" ], 200);
        }else{
           return response()->json(["data"  => "Oops! Sorry something went wrong!" ]);
        }
     }

}
