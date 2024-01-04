<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;    
    
    protected $guard = 'company';

    protected $table = 'companys';

    protected $fillable = [
        "company_name",
        "company_email",
        "company_mobile_number",
        "company_password",
        "company_state",
        "company_city",
        "company_pincode",
        "company_address",
        "company_document"
    ];

    protected $hidden = [
        'company_password'        
    ];
}
