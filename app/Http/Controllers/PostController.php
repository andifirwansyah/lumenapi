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
    public function delete($id){
        $post = Post::where('id_post',$id)->first();
        if($post != null){
            $post->delete();
            if($post){
                return response()->json([
                    "status" => "success",
                    "msg" => "Article has been deleted!"
                ]);
            }else{
                return response()->json([
                    "status" => "failed",
                    "msg" => "Not found! Couldn't delete article"
                ]);
            }       
        }
    }
    public function update(Request $request, $id_post){
        $post = Post::where('id_post', $id_post)->first();
        if($post){
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();
            
            return response()->json([
                "status" => "success",
                "msg" => "Article update successful!"
            ]);
        }else{
            return response()->json([
                "status" => "failed",
                "msg" => "Couldn't update, article not found!"
            ]);
        }
        
    
    }

}
