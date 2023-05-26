<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ec extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function memotoecs()
    {
        return $this->belongsToMany(MemoToEc::class);
    }

    public function officeorders()
    {
        return $this->belongsToMany(OfficeOrder::class);
    }

    public function advisories()
    {
        return $this->belongsToMany(Advisory::class);
    }
}
