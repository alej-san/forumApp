<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $post = Post::all();
       // dd($bikes);
        return view('posts.index', ['post' => $post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {   
         $poster =  $request->session()->get('poster');
         $request->session()->put(['input'=> $request->input('id')]);
         
        return view('posts.create', ['poster'=> $poster]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   try{
        $post = new Post($request->all());
        $post->topicid = $request->session()->get('input');
        $poster =  $request->session()->get('poster');
        $post->userid = $poster->id;
        $post->save();
        
         return redirect('post/' . $post->id);
    }catch(\Exception $e){
            return back()->withInput()->withErrors(['message'=>'fill out message']);
        }
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
         return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   try{
        $post->update($request->all()) ;
        return redirect('post/' . $post->id);
    }catch(\Exception $e){
            return back()->withInput()->withErrors(['default'=>'an error occurred']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   try{
        $post->delete();
        return redirect('/topic');
    }catch(\Exception $e){
            return back()->withErrors(['default'=>'an error occurred']);
        }
    }
}
