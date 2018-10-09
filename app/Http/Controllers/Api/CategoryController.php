<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate();
        return $categories;
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return $category;
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        return $category;
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
        }

        return response()->json([], 204);
    }
}
