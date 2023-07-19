<?php

namespace App\Models\administration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemRole extends Model{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $table="roles";
}
