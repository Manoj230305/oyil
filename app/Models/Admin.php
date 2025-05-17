<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    // Add your admin-specific logic here, such as custom properties, etc.

    protected $fillable = ['username', 'password'];  // Define any other fields for Admin
    protected $hidden = ['password', 'remember_token'];  // Hide sensitive fields
}