<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\Comment;

class PostController extends Controller
{
    public function addPost(){
        return view('add-post');
    }

    public function createPost(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with('post_created','Post has been created successfully');
    }

    public function getPost(){
        $posts = Post::orderBy('id','Desc')->get();
        return view('posts',compact('posts'));
    }


    public function deletePost($id){
        Post::where('id',$id)->delete();
        return back()->with('post_delete','Post has been deleted successfully!');
    }

    public function editPost($id){
        $post = Post::find($id);
        return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request){
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body = $request->body; 
        $post->save();
        return redirect('/');
        // back()->with('post_updated','Post has been update successfully!');
    }
    // ======================================================
        //relationship
    // ======================================================

    public function addCommentPost(){
        $post = new Post();

        $post->title = "Second Post Title";
        $post->body = "Second post Comment";
        $post->save();

        return "Post has been created successfully";
    }

    public function addComment($id){
        $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = "First Comment in This Post";
        $post->comments()->save($comment);

        return "Comment has been posted";
    }



}
