<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    protected $fillable = ['name', 'upazila_id'];

    public function upazila()
    {
        return $this->belongsTo(Upazilas::class);
    }
}
