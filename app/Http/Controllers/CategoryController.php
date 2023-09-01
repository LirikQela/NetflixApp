<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return response()->json($categories);
    }

    public function store(StoreCategoryRequest $request){
        $category = new Category();
        $category->name = $request->name;
        $category->description =$request->description;
        $category->save();
    }

    public function show($id){
        $category = Category::FindOrFail($id);
        return response()->json($category);
    }

    public function destroy($id){
        $category = Category::FindOrFail($id);

        $category->delete();

        return response()->json([
                'message'=>'category was destroyed'
            ]);
    }
    public function update(UpdateCategoryRequest $request ,$id){
        $category = Category::FindOrFail($id);
        $category->name = $request->name;
        $category->description =$request->description;
        $category->update();
        return response()->json([
            'mesage'=>'user was updated'
        ]);
    }
}
