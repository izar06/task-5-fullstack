<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // get all category
        $category = Category::latest()->get();

        // return view
        return view('dashboard.category.index', [
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $category = new category();
        $category->name = $request->name;
        $category->user_id = auth()->user()->id;

        auth()->user()->categories()->save($category);

        return redirect('/category');
    }

    public function edit($id)
    {
        $category = auth()->user()->categories()->find($id);

        return view('dashboard.category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $category = auth()->user()->categories()->find($request->id);

        $category->name = $request->name;
        $category->user_id = auth()->user()->id;

        auth()->user()->categories()->save($category);

        return redirect('/category');
    }

    public function destroy(Category $category, $id)
    {
        $category = auth()->user()->categories()->find($id);

        $category->delete();

        return redirect('/category');
    }

}
