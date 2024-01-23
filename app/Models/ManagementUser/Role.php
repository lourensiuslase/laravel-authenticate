<?php

namespace App\Models\ManagementUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role_code', 'role_name', 'role_description', 'role_level'];
}
