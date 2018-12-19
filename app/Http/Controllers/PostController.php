<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function index(){
        $pages = Page::all();
        return view('pages.index',compact('pages'));
    }

    public function show($id){
        $page = Page::find($id);
        return view('pages.show',compact('page'));
    }
    public function delete($id){

//delete
        $page = Page::find($id);
        $page->delete();

        // redirect
        return Redirect::to('pages');

    }
    public function create()
    {
        $page = new Page;
        $page->title    = Input::get('title');
        $page->alias    = Input::get('alias');
        $page->content  = Input::get('content');
        $page->save();

        return $page;
        // redirect
        //return Redirect::to('pages');
    }

}
