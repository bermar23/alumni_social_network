<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use Auth;
use App\User;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SavePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request)
    {
        $post = new Post();        

        if(!$this->savePost(new Post(), $request)){
            return back()->with('error', 'Error.')->withInput();
        }

        return back()->with('success', 'Success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::find($post_id);

        if(!$post){            
            return redirect('posts');
        }
        
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\SavePostRequest  $request
     * @param  int  $post_id
     * @return \Illuminate\Http\Response
     */
    public function update(SavePostRequest $request, $post_id)
    {               
        if(!$this->savePost(Post::FindOrFail($post_id), $request)){
            return back()->with('error', 'Error updating post.')->withInput();
        }

        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function savePost(Post $post, SavePostRequest $request)
    {
        $user = Auth::user();
        $post->fill($request->all());
        $post->user_id = $user->user_id;
        $post->save();

        return $post;
    }
}
