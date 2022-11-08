<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Poster;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        return view('index');
        
    }


    function login(Request $request) {
        
        
        $posters = Poster::all();
        foreach($posters as $poster){
            if($poster->username == $request->input('username')){
                $request->session()->put(['poster'=>$poster]);
                
            
            }
        }
       
        if($request->session()->has('poster')){
        return redirect('./topic');}
        else{
            return view('index')->withErrors(['user' => 'User not found']);
        }
    }

    function logout(Request $request) {
        $request->session()->forget('poster');
        return redirect('/');
    }
    
}
