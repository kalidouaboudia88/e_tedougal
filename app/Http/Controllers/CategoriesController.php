<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('verified');*/
        $this->middleware(['can:admin', 'can:seller']);
        //$this->authorize('seller');//*/
    }

    public function index(){
        $categories = Category::orderBy('created_at','DESC')->get();
        return view('categories.index', compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required | min:3',
            'on_menu' => 'nullable | digits_between:0,1'
        ]);
        $name = $request->input('name');
        $on_menu = $request->input('on_menu') ?? 0;
        Category::updateOrCreate(['name'=>$name,'on_menu' => $on_menu]);
        return redirect()->route('categories.index')->with(['success' => 'Category enregistrée']);
    }

    public function edit(Category $category){
        return view('categories.edit', ['category'=>$category]);
    }

    public function update(Request $request, Category $category){
        $request->validate([
            'name' => 'required | min:3',
            'on_menu' => 'nullable | digits_between:0,1'
        ]);
        $category->update(['name'=>$request->input('name'),'on_menu'=>$request->input('on_menu')]);
        return redirect()->route('categories.index')->with(['success' => 'Category modifiée']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with(['success' => "Category supprimée"]);
    }
}
