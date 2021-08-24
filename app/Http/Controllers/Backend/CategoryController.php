<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Http\Requests\CategoryRequest;
use Auth;

class CategoryController extends Controller
{
    public function view(){
        $allData = Category::all();
        return view('backend.category.view-category', compact('allData'));
    }

    public function add(){
        return view('backend.category.add-category');
    }

    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect()->route('categories.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $editData = Category::find($id);

        return view('backend.category.add-category', compact('editData'));
    }

    public function update(CategoryRequest $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->updated_by = Auth::user()->id;
        $category->save();

        return redirect()->route('categories.view')->with('success', 'Data updated successfully');

    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.view')->with('success', 'Data deleted successfully');
    }
}
