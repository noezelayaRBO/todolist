<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tasks';

    public function scopeIncomplete($query)
    {
        return $query->where('complete',0);
    }
    public function scopeCompleted($query)
    {
        return $query->where('complete',1);
    }
    public function user(){
        return $this->belongsTo(UserTask::class);
    }
    public function getCompleteAttribute($attribute){
        return [
            0 => 'incomplete',
            1 => 'completed',
        ][$attribute];
    }
    
}
