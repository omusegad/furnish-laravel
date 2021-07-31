<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsByController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = $request->all();
        $action = $request->input('GET_BY_CATEGORY');
        switch ($action) {
            case $action === "GET_BY_CATEGORY":
                $products = Product::where('product_category_id', $data['product_category_id'])->get();
               if($products) {
                        return response()->json(["data"  => $products ], 200);
                }else if(emplty($products)){
                        return response()->json(["data"  => "No Result available" ], 200);
                }else{
                    return response()->json(["data"  => "Oops! Sorry something went wrong!" ]);
                }
              break;
            default:
            return response()->json(["data"  => "Oops! Sorry action not allowed" ]);
          }
    }

}
