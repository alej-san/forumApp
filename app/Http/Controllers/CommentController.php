<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentCreateRequest;
use App\Http\Requests\CommentEditRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
         $request->session()->put(['post'=> $request->input('postid')]);
         
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   try{
        $comment = new Comment($request->all());
        $comment->postid = $request->session()->get('post');
        $poster =  $request->session()->get('poster');
        $comment->userid = $poster->id;
        $comment->save();
        
         return redirect('post/' . $comment->postid);
    }catch(\Exception $e){
            return back()->withInput()->withErrors(['default'=>'an error occurred']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
         return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {   try{
        $comment->update($request->all()) ;
        return redirect('post/' . $comment->postid);
    }catch(\Exception $e){
            return back()->withInput()->withErrors(['default'=>'an error occurred']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {   try{
        $comment->delete();
        return redirect('/post' . $comment->postid);
    }catch(\Exception $e){
            return back()->withErrors(['default'=>'an error occurred']);
        }
    }
}
