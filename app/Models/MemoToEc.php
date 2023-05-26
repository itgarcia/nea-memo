<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoToEc extends Model
{
    use HasFactory;
    protected $fillable = ['date_memo','no_memo', 'title', 'signatory','dept','date_posted','upload'];

    public function ecs()
    {
        return $this->belongsToMany(Ec::class);
    }

}
