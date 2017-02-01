<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //


    protected  $upload = '/images/';



    protected $fillable = [
        'file',
        'title',
        'edit'
    ];


    public function getFileAttribute($photo){

        return $this->upload . $photo;

    }

//    public function post(){
//        return $this->hasOne('App\Post');
//    }



}
