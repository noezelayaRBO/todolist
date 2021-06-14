<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTasks extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = [];

    public function tasks(){
        return $this->hasMany(Task::class);
      }
    
    public function weekly()
    {
      return $this->hasMany(Weekly::class);
    }
}
