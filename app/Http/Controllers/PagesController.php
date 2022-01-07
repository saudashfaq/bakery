<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function theme(){

        return view('index');
    }
    public function index()
    {
        //return 'INDEX HERE';
        $title = 'Welcome To Cake Factory ';
        //return view('pages.index' , compact('title'));

        //same output like compact but when we pass multiple values like as an array then use with() method ..
        return view('pages.index')->with('title' , $title);
    }

    public function about(){
        $title = 'About us ' ;
        return view('pages.about')->with('title' , $title);

    }

    public function services(){
        //$title = 'Services ';

        $data = array(
            'title'=>'Services',
            'services'=>['cake' , 'sweets' , 'zxy']

        );
        return view('pages.services')->with($data);
    }

}
