<?php

namespace App\Models;

use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','slug'];
    
    public function questions()
    {
        return $this->hasMany(Question::class, 'survey_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
