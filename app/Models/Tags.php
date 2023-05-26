<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable = ['title','name', 'signatory'];

    public function OfficeOrders()
    {
        return $this->belongsToMany(OfficeOrder::class);
    }

}
