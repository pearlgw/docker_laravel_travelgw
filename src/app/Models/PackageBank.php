<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageBank extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function package_booking()
    {
        return $this->belongsTo(PackageBooking::class);
    }
}