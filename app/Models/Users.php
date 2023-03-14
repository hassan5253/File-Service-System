<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable {
    protected $table = 'users';
    protected $fillable = ['acc_type','name','username','email','password', 'remember_token', 'password_resets', 'password_status', 'status', 'created_at', 'updated_at'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}