<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductGet($id){
        $emp = Product::find($id);
        return Response()->json([
            "m" => "products",
            "ms" => $emp,
        ]);
    }
    public function ProductDelete($id){
        Product::destroy($id);
        return "success";

    }
    public function ProductStatus($id){
        $emp = Product::find($id);
        if ($emp->pdt_status == 1){
            $emp->pdt_status = 0;
            $st = 0;
        }
        else{
            $emp->pdt_status = 1;
            $st = 1;

        }
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $st,
        ]);

    }
    public function AllProduct(){
        $pdt  = Product::get();
        return view('product.all-product',compact('pdt'));
    }
    public function AddProduct(Request $request){
        $emp = new Product();
        $emp->pdt_status = 0;
        $emp->pdt_name = $request->input('pdt_name');
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function UpadteProduct(Request $request){
        $emp = Product::find($request->input('id4update'));

        Product::where('id',$request->input('id4update'))->update([
            'pdt_name'=>$request->input('pdt_name'),
        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
}
