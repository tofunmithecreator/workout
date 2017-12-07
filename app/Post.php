<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //in order to set model to a table that isnt the default post table, we create one;
    protected $table='posts';
    // creating a relationship between the user and the post model; not, post has a one to one relationship with the user model i.e  its one post belongs to a user.
    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}
