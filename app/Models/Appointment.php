<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_date',
        'status',
        'doctor_desc',
        'doctor_comment',
        'user_id',
        'staff_id',
        'clinic_id'
    ];
}
