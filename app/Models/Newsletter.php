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
    protected $casts = [
        'email' => 'string',
        'name' => 'string',
        'phone' => 'string',
        'send_status' => 'string', // assuming it's an enum
        'status' => 'boolean',     // correct if used as true/false
        'ip_address' => 'string',
        'country' => 'string',
        'city' => 'string',
        'postal_code' => 'string',
        'state' => 'string',
        'address' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'timezone' => 'string',
    ];
    protected $attributes = [
        'status' => true,
    ];
    public function getRouteKeyName()
    {
        return 'email';
    }
    public function getStatusAttribute($value)
    {
        return (bool) $value;
    }
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = (bool) $value;
    }
    public function getEmailAttribute($value)
    {
        return (string) $value;
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = (string) $value;
    }
    public function getNameAttribute($value)
    {
        return (string) $value;
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = (string) $value;
    }
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function scopeInactive($query)
    {
        return $query->where('status', false);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('email', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%");
        });
    }
    public function scopeFilter($query, $filters)
    {
        if ($filters['search'] ?? false) {
            $query->search($filters['search']);
        }
        if ($filters['status'] ?? false) {
            $query->where('status', $filters['status']);
        }
        return $query;
    }
    public function scopeSort($query, $sort)
    {
        if ($sort === 'email') {
            return $query->orderBy('email');
        } elseif ($sort === 'name') {
            return $query->orderBy('name');
        } elseif ($sort === 'status') {
            return $query->orderBy('status');
        }
        return $query->orderBy('created_at', 'desc');
    }
    public function scopePaginate($query, $perPage = 15)
    {
        return $query->paginate($perPage);
    }
}
