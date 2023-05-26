<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeMemo extends Model
{
    use HasFactory;
    protected $fillable = ['date_memo', 'title', 'signatory','dept','date_posted','upload'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

}
