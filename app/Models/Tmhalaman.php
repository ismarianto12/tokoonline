<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tmhalaman';
    public $incrementing = false;
    public $datetime = false;
    protected $guarded = [];
}
