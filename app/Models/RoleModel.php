<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="roles";
    protected $fillable = [
        'id',
        'title',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
