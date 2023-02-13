<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Welcome to Laravel',
            'description' => 'This is app to learning Laravel',
            'author' => 'admin'
        );
        return view('pages.index')->with($data);
    }

    public function about(){
        $data = array(
            'title' => 'About Page',
            'description' => 'This is about page tho',
            'author' => 'admin'
        );
        return view('pages.about') -> with($data);
    }

    public function services(){
        $data = array(
            'title' => 'Services Page',
            'description' => 'We have several job to do',
            'services' => ['Web Design', 'Programming', 'SEO', 'Consulting'],
            'author' => 'admin'
        );
        return view('pages.services')->with($data);
    }
}
