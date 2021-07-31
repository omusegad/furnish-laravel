<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public $table = 'roles';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

}
