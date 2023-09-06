<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();

        return response()->json($movies);
    }

    public function store(StoreMovieRequest $request){
        $movies = new Movie();
        $movies->name = $request->name;
        $movies->description =$request->description;
        $movies->category_id =$request->category_id;
        $movies->file =$request->file;
        $movies->thumbnail =$request->thumbnail;
        $movies->rating =$request->rating;
        $movies->serie_id =$request->serie_id;
        $movies->date =now();

        $movies->save();
    }

    public function show($id){
        $movies = Movie::FindOrFail($id);
        return response()->json($movies);
    }

    public function destroy($id){
        $movies = Movie::FindOrFail($id);

        $movies->delete();

        return response()->json([
                'message'=>'category was deleted'
            ]);
    }
    public function update(UpdateMovieRequest $request ,$id){
        $movies = Movie::FindOrFail($id);
        $movies->name = $request->name;
        $movies->description =$request->description;
        $movies->category_id =$request->category_id;
        $movies->file =$request->file;
        $movies->thumbnail =$request->thumbnail;
        $movies->rating =$request->rating;
        $movies->serie_id =$request->serie_id;
        $movies->date =now();
        $movies->update();
        return response()->json([
            'mesage'=>'user was updated'
        ]);
    }
}
