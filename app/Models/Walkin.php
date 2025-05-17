<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walkin extends Model
{
    use HasFactory;

    // Define the table name if it's not plural (Laravel automatically assumes the table name is the plural form of the model)
    protected $table = 'walkins';

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'message',
        'type',
    ];

    // Optional: If you want to disable timestamps (if not using created_at and updated_at)
    public $timestamps = true;
}
