<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'game',
        'body',
        ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順，limitで件数制限
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

