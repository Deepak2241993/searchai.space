<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'token',
        'expires_at',
        'status',
        'api_status',
        'order_id '
    ];
    public function aadhaarData()
    {
        return $this->hasOne(AadhaarData::class, 'id_token', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
