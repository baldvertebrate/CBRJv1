<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'civil_status',
        'email',
        'contact_no',
        'sitio',
        'barangay',
        'address_id',
    ];

    public function employee():HasOne
    {
        return $this-hasOne(Employee::class);
    }
}
