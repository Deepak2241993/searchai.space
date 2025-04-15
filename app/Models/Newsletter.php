<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $fillable = [
      'email', 'name', 'phone', 'send_status', 'status', 'ip_address', 'country', 'city', 'postal_code', 'state', 'address', 'latitude', 'longitude', 'timezone', 'created_at', 'updated_at'
    ];
    
   
}
