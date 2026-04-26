<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    //
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $category = Category::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'color_code' => $validated['color_code'],
        ]);
        return response()->json([
            'message' => 'カテゴリーを保存しました',
            'data' => $category,
        ], 201);
    }
}
