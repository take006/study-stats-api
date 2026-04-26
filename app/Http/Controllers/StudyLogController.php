<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
use App\Http\Requests\StoreStudyLogRequest;

class StudyLogController extends Controller
{
    //
    public function store(StoreStudyLogRequest $request): JsonResponse
    {
        $validated = $request->validated();
        
        $category = Category::where('id', $validated['category_id'])
            ->where(function ($q) { $q->where('user_id', Auth::id())->orWhereNull('user_id'); })
            ->firstOrFail();

        $studyLog = StudyLog::create([
            'user_id' => Auth::id(),
            'category_id' => $category->id,
            'duration_minutes' => $validated['duration_minutes'],
            'content' => $validated['content'],
            'study_date' => $validated['study_date'],
        ]);

        return response()->json([
            'message' => '学習記録を保存しました。',
            'data' => $studyLog
        ], 201);
    }
}
