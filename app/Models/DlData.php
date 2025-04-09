<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DlData extends Model
{
    use HasFactory;
    protected $table = 'dl_datas'; // explicitly define the table name

    protected $fillable = [
        'name',
        'dob',
        'address',
        'dependent_name',
        'document_type',
        'document_id',
        'pincode',
        'issue_date',
        'expiry_date',
        'state',
        'authority',
        'category',
        'as_per_category_authority',
        'token_id',
    ];
}
