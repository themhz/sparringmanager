<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessions extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sessions';
    protected $fillable = ['name', 'created_at', 'user_id'];
}
