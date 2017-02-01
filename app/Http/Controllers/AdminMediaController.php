<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    public function index(){

        $photos = Photo::all();

        return view('admin.media.index',compact('photos'));
    }


    public function create(){

        return view('admin.media.create');

    }


    public function store(Request $request){

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();

        $file->move('images',$name);

        Photo::create(['file'=>$name,'edit'=>true]);
        Session::flash('created','Media created successfully ...');
        return redirect('admin.media.show');

    }


    public function destroy($id){
        $photo = Photo::findOrFail($id);
        if(file_exists(public_path().$photo->file)){
            unlink(public_path().$photo->file);
        }
        $photo->delete();
        Session::flash('deleted','Media deleted successfully ...');
        return redirect('admin/media');


    }



    public function update(Request $request, $id)
    {
        $input = $request->all();
        $update = Photo::whereId($id)->update(['title'=>$input['title'],'edit'=>false]);
        if($update){
            Session::flash('edited','Media edited successfully ...');
            return redirect('admin/media/show');
        }
        else{
            Session::flash('error','Error while editing media ...');
            return redirect('admin/media');
        }

    }


    public function show(){
        $photos = Photo::where('edit',1)->get()->all();
        if($photos){
            return view('admin.media.description',compact('photos'));
        }
        else{
            Session::flash('no titleness media','No media need titles ... ');
            return redirect('admin/media');
        }
    }




}
