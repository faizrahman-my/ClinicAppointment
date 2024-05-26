<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_reason',
        'reservation_date',
        'reservation_time',
        'reservation_status',
        'status',
        'room_no',
        'appointment_time',
        'doctor_desc',
        'doctor_comment',
        'user_id',
        'staff_id',
        'clinic_id'
    ];
}
