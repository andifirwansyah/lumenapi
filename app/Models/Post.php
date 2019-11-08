<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    protected $table = 'posts';
    protected $primaryKey = 'id_post';
    protected $fillable = ['title', 'body'];
}