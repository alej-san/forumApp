<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Http\Request;
use App\Http\Requests\PosterCreateRequest;
use App\Http\Requests\PosterEditRequest;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $poster =  session()->get('poster');
        return view('poster.index', ['poster' => $poster]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poster.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   try{
        $poster = new Poster($request->all());
        $poster->save();
         return view('index');
    }catch(\Exception $e){
            return back()->withInput()->withErrors(['default'=>'an error occurred']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(Poster $poster)
    {
        
        //la sentencia anterior es innecesaria si se pasa el objeto bike
        //ya que es lo que hace laravel de base inyectando dependencias
        return view('poster.show', ['poster' => $poster]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function edit(Poster $poster)
    {
         return view('poster.edit', ['poster' => $poster]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poster $poster)
    {   try{
       $poster->update($request->all()) ;
        return redirect('poster/' . $poster->id);
    }catch(\Exception $e){
            return back()->withInput()->withErrors(['default'=>'an error occurred']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poster $poster)
    {   try{
        $request->session()->forget('poster');
        $poster->delete();
        return redirect('url(.)');
    }catch(\Exception $e){
            return back()->withErrors(['default'=>'an error occurred']);
        }
    }
}
