<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //admin panel
    public function index(){
        return view('admin/pages/products/index');
    }
    public function create(){
     return view('admin/pages/products/create');
    }
    public function store(Request $request){
        return "save product";
    }
    public function edit(){
        return "edit";
    }
    public function update(){
        return "update";
    }
    public function delete($id){
        return "delete";
    }
}
