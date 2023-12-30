<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

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
