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
}
