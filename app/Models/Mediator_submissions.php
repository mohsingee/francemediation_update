<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediator_submissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
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
        'profile',
        'professional_situation',
        'charge_person_phone',
        'charge_person_email',
        'professional_expereince',
        'work_force',
        'mediator_expereince',
        'conventional_mediation',
        'judicial_mediation',
        'name_of_insurer',
        'policy_number',
        'member_of_mediation',
        'appeal_court',
        'appeal_region',
        'status',
        'paid_status',
        'created_at',
        'updated_at',
    ];
}
