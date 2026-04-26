<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyLog extends Model
{
    /** @use HasFactory<\Database\Factories\StudyLogFactory> */
    use HasFactory, HasUuids, SoftDeletes;
    public $incrementing = false;
    protected $keyType = 'string'; 
    //学習記録を追加する処理
    protected $table = 'study_logs';
    protected $fillable = [
        'user_id',
        'category_id',
        'content',
        'duration_minutes',
        'study_date',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
