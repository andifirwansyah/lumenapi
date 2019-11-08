<?php 

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    public function create_post(Request $req){
        $this->validate($req, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $isPost = Post::create($req->all());
        if($isPost){
            return response()->json([
                'status' => 'success',
                'msg' => 'article successful created!'
            ]);
        }
    }
    public function post_list(){
         return response()->json([
            'data' => Post::all()
         ]);
    }
    public function byId($id){
        $post = Post::find($id);
        if(!$post){
            return response()->json([
                'status' => 'failed',
                'msg' => 'post not found!'
             ]);
        }
        return response()->json([
            'data' => $post
         ]);
    }

}
