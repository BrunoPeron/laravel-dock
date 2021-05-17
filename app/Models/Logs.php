<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = array(
        'string_request',
        'data_consulta',
        'id_user'
    );
}
