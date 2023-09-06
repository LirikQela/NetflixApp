<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index(){
        $series = Serie::all();

        return response()->json($series);
    }

    public function store(StoreSerieRequest $request){
        $series = new Serie();
        $series->name = $request->name;
        $series->description =$request->description;

        $series->save();
    }

    public function show($id){
        $serie = Serie::FindOrFail($id);
        return response()->json($serie);
    }

    public function destroy($id){
        $serie = Serie::FindOrFail($id);

        $serie->delete();

        return response()->json([
                'message'=>'category was deleted successfully'
            ]);
    }
    public function update(UpdateSerieRequest $request ,$id){
        $serie = Serie::FindOrFail($id);
        $serie->name = $request->name;
        $serie->description =$request->description;
        $serie->update();
        return response()->json([
            'mesage'=>'user was updated successfully'
        ]);
    }
}
