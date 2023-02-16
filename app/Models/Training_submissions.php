<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training_submissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'civility',
        'first_name',
        'last_name',
        'dob',
        'email',
        'personal_email',
        'address',
        'street',
        'additional_address',
        'city',
        'postal_code',
        'country',
        'phone_number',
        'professional_situation',
        'charge_person_phone',
        'charge_person_email',
        'received_code',
        'price_of_training_project',
        'training_city',
        'remote_class',
        'desired_start_date',
        'how_find_us',
        'how_find_us_other',
        'project_detail',
        'cover_letter',
        'photo',
        'cv',
        'status',
        'created_at',
        'updated_at',
    ];
}
