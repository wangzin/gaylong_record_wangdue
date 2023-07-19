<?php

namespace App\Models\administration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $table="role_user";
}
