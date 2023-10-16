<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    use HasFactory;
    protected $fillable = [
        'name', 'city','customer_id', 'type', 'email'
    ];
}
