<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configs extends Model
{

    protected $fillable = [
        'site_title', 'site_phone', 'site_mail', 'site_extra', 'site_online', 'meta_title',
        'meta_keywords', 'meta_description', 'ga_analitycs', 'smtp_host', 'smtp_user', 'smtp_pass',
        'smtp_port', 'smtp_security', 'smtp_auth',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
