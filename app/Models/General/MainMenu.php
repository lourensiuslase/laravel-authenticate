<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    protected $fillable = [
        'main_menu_name',
        'main_menu_role',
        'main_menu_route'
    ];
}
