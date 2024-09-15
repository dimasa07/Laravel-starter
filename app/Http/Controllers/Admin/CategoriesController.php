<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Notification\Toast;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10)->onEachSide(1);

        return view('admin.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        $checkName = Category::where('name', $request->name)->first();
        if($checkName){
            return back()->withErrors([
                'name' => 'Category name is already exists'
            ]);
        }

        $category = new Category();
        $category->fill($request->input());
        $category->save();

        return back()->with('toast', new Toast('Category saved successfully', 'success'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        $checkName = Category::where([
            ['id', '!=', $category->id],
            ['name', $request->name]
        ])->first();
        if($checkName){
            return back()->withErrors([
                'name' => 'Category name is already exists'
            ]);
        }

        $category->fill($request->input());
        $category->save();

        return back()->with('toast', new Toast('Category updated successfully', 'success'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('toast', new Toast('Category deleted successfully', 'success'));
    }
}
