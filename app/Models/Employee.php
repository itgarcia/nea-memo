<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function officeorders()
    {
        return $this->belongsToMany(OfficeOrder::class);
    }
    public function officememos()
    {
        return $this->belongsToMany(OfficeMemo::class);
    }
}
