<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, HasUuids;
    public $incrementing = false;
    protected $keyType = 'string';
    //テーブル指定
    protected $table = 'categories';
    //割り当て許可対象カラム
    protected $fillable = [
        'user_id',
        'name',
        'color_code',
    ];
    //categoriesはusersテーブルと多対１のリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
}
