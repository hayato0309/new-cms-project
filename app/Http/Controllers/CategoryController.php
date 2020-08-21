<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){

        $categories = DB::table('categories')->paginate(10);

        return view('admin.category.index', ['categories' => $categories]);
    }

    public function store(){

        request()->validate([

            'name' => 'required|unique:categories',
        ]);

        Category::create([

            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ]);

        $category = Category::latest('created_at')->first();

        session()->flash('category-created-message', 'Category was created : ' . $category->name);

        return back();
    }

    public function edit(Category $category){

        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Category $category){

        request()->validate([

            'name' => 'required|unique:categories',
        ]);

        $category->name = Str::ucfirst(request('name'));
        $category->slug = Str::of(Str::lower(request('name')))->slug('-');

        if($category->isDirty('name')){

            session()->flash('category-updated-message', 'Category was updated.');
            $category->save();

        } else {

            session()->flash('category-not-updated-message', 'Nothing has beed updated.');

        }

        return back();
    }

    public function destroy(Category $category){

        $category->delete();

        session()->flash('category-deleted-message', 'Category was deleted : ' . $category->name);

        return back();
    }
}
