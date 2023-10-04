<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = 'attendees';
    protected $guarded = [];
    protected $appends = ["full_name"];

    public function getFullNameAttribute()
    {
        return "{$this->Last_Name}, {$this->First_Name} {$this->Middle_Name}";
    }
}
