<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otzyv extends Model
{
    use HasFactory;
    protected $table = 'otzyv';
    protected $fillable = ['name', 'kniga', 'sms'];
    public $timestamps = false;
}
