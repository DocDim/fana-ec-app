<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zipcode'
    ];

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function charges() {
        return $this->hasMany(Charge::class);
    }
}
