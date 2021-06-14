<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekly extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'weeklytask';

    public function getDayAttribute($attribute){
        return [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday',
        ][$attribute];
    }

    public function scopeMonday($query)
    {
        return $query->where('day',1);
    }
    public function scopeTuesday($query)
    {
        return $query->where('day',2);
    }
    public function scopeWednesday($query)
    {
        return $query->where('day',3);
    }
    public function scopeTrusday($query)
    {
        return $query->where('day',4);
    }
    public function scopeFriday($query)
    {
        return $query->where('day',5);
    }
    public function scopeSaturday($query)
    {
        return $query->where('day',6);
    }
    public function scopeSunday($query)
    {
        return $query->where('day',7);
    }

    public function usertasks(){
        return $this->belongsTo(UserTasks::class);
    }
}
