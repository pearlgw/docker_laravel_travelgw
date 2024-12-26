<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageBooking extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function package_tour()
    {
        return $this->belongsTo(PackageTour::class, 'package_tour_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function package_bank()
    {
        return $this->belongsTo(PackageBank::class, 'package_bank_id');
    }

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}