<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Dish;
use App\Item;
use App\ItemStock;
use App\Product;
use App\Recipe;
use App\Unit;
use App\Vat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DishController extends Controller
{
    public function DishGet($id)
    {
        $emp = Dish::find($id);
        return Response()->json([
            "m" => "dishes",
            "ms" => $emp,
        ]);

    }

    public function DishDelete($id)
    {
        Dish::destroy($id);
        return "success";

    }

    public function DishStatus($id)
    {
        $emp = Dish::find($id);
        if ($emp->dish_status == 1) {
            $st = 0;
            $emp->dish_status = 0;
        } else {
            $st = 1;
            $emp->dish_status = 1;

        }
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $st,
        ]);
    }

    public function AllDish()
    {
        $emp = Dish::get();
        $pdt = Product::where('pdt_status',1)->get();
        $vat = Vat::where('vat_status',1)->get();
        $unit = Unit::where('unit_status',1)->get();
        $dis = Discount::where('discount_status',1)->get();
        return view('dish.all-dish', compact('emp', 'pdt', 'vat', 'unit', 'dis'));
    }

    public function AddDish(Request $request)
    {
        $emp = new Dish();
        $id = rand(1000, 9999);
        $emp->dish_status = 0;
        $emp->dish_id = $id;
        $emp->dish_unit = $request->input('dish_unit');
        $emp->dish_vat = $request->input('dish_vat');
        $emp->dish_type = $request->input('dish_type');
        $emp->dish_price = $request->input('dish_price');
        $emp->dish_name = $request->input('dish_name');
        $emp->dish_discount = $request->input('dish_discount');
        if ($image = $request->file('dish_image')) {
            $name = $id;
            $extension = $image->getClientOriginalExtension();
            $imageName = $name . '.' . $extension;
            $path = public_path('image/dish');
            $image->move($path, $imageName);
            $emp->dish_image = $imageName;
        }

        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }

    public function UpadteDish(Request $request)
    {
        $emp = Dish::find($request->input('id4update'));
        $image_path = "image/dishe/$emp->dish_image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Dish::where('id', $request->input('id4update'))->update([
            'dish_unit' => $request->input('dish_unit'),
            'dish_vat' => $request->input('dish_vat'),
            'dish_type' => $request->input('dish_type'),
            'dish_price' => $request->input('dish_price'),
            'dish_name' => $request->input('dish_name'),
            'dish_discount' => $request->input('dish_discount'),

        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }

    public function RecipeDish(){
        $emp = Dish::get();
        $pdt = Product::get();
        $vat = Vat::get();
        $unit = Unit::get();
        $dis = Discount::get();
        $re = Recipe::get();
        return view('dish.recipe', compact('emp', 'pdt', 'vat', 'unit', 'dis','re'));

    }
    public function RecipeAdd($id){
        $emp = Dish::find($id);
        $item = Item::where('item_status',1)->get();
        $re = Recipe::all();
        return view('dish.add-recipe', compact('emp','item','re'));

    }
    public function NewRecipeAdd(Request $request){
        $r = new Recipe();
        $r->d_name = $request->input('d_name');
        $r->d_type =$request->input('d_type');
        $r->i_name =$request->input('ite');
        $r->i_q =$request->input('r_q');
        if ($request->input('ite') != null && $request->input('r_q') != null){
            $r->save();
        }
        return back();
    }
    public function RecipeDelete($id){
        Recipe::destroy($id);
        return back();
    }
}
