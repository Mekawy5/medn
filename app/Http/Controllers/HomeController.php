<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Kryptonit3\Counter\Counter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Post::whereIn('category_id',[1,2,3,4,5])->orderBy('id', 'desc')->take(5)->get()->all();

        $sections = array(
            'land' => Post::where('category_id',1)->orderBy('created_at','DESC')->get()->first(),
            'naval' => Post::where('category_id',2)->orderBy('created_at','DESC')->get()->first(),
            'air&space' => Post::whereIn('category_id',[3,4,5])->orderBy('created_at','DESC')->get()->first(),
            'world' => Post::where('category_id',6)->orderBy('created_at','DESC')->get()->first(),
        );

        $medias = Photo::whereNotNull('title')->orderBy('created_at','DESC')->take(5)->get();

        $articles = Post::where('category_id',9)->orderBy('id','desc')->take(4)->get();

        return view('main.index',compact('sliders','sections','articles','medias'));
    }

    public function show($title_slug){
        $post = Post::where('title_slug',$title_slug)->get()->first();
        if($post){

            return view('main.article',compact('post'));

        }else{
            return redirect('/');
        }
    }


    public function search()
    {

        $keyword = Input::get('keyword', false);
        $posts = Post::where('title', 'like', '%'.$keyword.'%')->orWhere('body', 'like', '%'.$keyword.'%')->get();
        return view('main.search',compact('posts','keyword'));
    }

    public function category($key){

        if($key == 'land')
            $articles = Post::where('category_id',1)->orderBy('id','desc')->paginate(5);
        elseif($key == 'naval')
            $articles = Post::where('category_id',2)->orderBy('id','desc')->paginate(5);
        elseif($key == 'air&space')
            $articles = Post::whereIn('category_id',[3,4,5])->orderBy('id','desc')->paginate(5);
        elseif($key == 'airforce')
            $articles = Post::where('category_id',3)->orderBy('id','desc')->paginate(5);
        elseif($key == 'airdefence')
            $articles = Post::where('category_id',4)->orderBy('id','desc')->paginate(5);
        elseif($key == 'space')
            $articles = Post::where('category_id',5)->orderBy('id','desc')->paginate(5);
        elseif($key == 'world')
            $articles = Post::where('category_id',6)->orderBy('id','desc')->paginate(5);

        return view('main.category',compact('articles','key'));

    }






















}
