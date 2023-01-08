<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::orderBy('name')->paginate(10),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $this->validateCategory();

        Category::create($attributes);

        return redirect('/admin/categories')->with('success', 'Category created successfully!');
    }

    protected function validateCategory(?Category $category = null): array
    {
        $category ??= new Category();

        return request()->validate([
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category)],
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category)],
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $attributes = $this->validateCategory($category);

        $category->update($attributes);

        return back()->with('success', 'Category Updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Category Deleted!');
    }
}
