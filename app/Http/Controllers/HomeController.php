<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo"=>"Home","url"=>""],
            //["titulo"=>"Lista de Compras","url"=>""]
        ]);

        //return view('admin.artigos.index',compact('listaMigalhas'));

        return view('home', compact('listaMigalhas'));
    }
}
