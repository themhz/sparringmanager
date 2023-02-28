<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usermartialarts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'usermartialarts';
    protected $fillable = ['user_id', 'martialarts_id'];
}
