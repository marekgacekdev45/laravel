<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //index
    public function index()
    {
        $colors = Color::all();
        return view('admin/pages/colors/index', ['colors' => $colors]);
    }
    //store
    public function store(Request $request)
    {

        //validate
        $request->validate([
            'name' => 'required|unique:colors|max:255',
            'code' => 'required|max:255'
        ]);
        //store
        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();
        //return response
        return back()->with('success', 'Category Saved');
    }
    public function destroy($id)
    {
        Color::findOrFail($id)->delete();
        return back()->with('success', 'Color Deleted');
    }
}