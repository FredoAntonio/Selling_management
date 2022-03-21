<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'CIDADES';
    protected $primaryKey = 'CD_CODIGO';
    public $timestamps = false;
	public $incrementing = false;	
    protected $sequence = 'GEN_CIDADES'; 
}
