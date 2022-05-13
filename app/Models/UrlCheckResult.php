<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlCheckResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'url_check_id',
        'response_code',
        'response_body'
    ];
}
