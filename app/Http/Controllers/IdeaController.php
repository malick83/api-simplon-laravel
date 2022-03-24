<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Http\Resources\IdeaResource;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Idea::orderByDesc('created_at')->get();
 
        return IdeaResource::collection(Idea::orderByDesc('created_at')->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Idea::create($request->all())){
            return response()->json([
                'success' => 'Idée créée avec success',
            ], 200);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $idea = Idea::find($id);
        return new IdeaResource($idea);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $idea = Idea::find($id);
        if($idea->update($request->all())){
            return response()->json([
                'success' => 'Idée modifiée avec success',
            ], 200);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $idea = Idea::find($id);
        if($idea->delete($idea)){
            return response()->json([
                'success' => 'Idée supprimée avec success',
            ], 200);
        } 
    }
}
