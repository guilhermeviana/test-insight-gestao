<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $primaryKey  = 'id';
    protected $table = 'funcionarios';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = ['nome', 'cargo', 'salario'];
}
