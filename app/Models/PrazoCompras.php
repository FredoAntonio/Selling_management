<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrazoCompras extends Model
{
    protected $table = 'PRAZOS_COMPRAS';
	protected $primaryKey = 'PZC_CODIGO';
	public $timestamps = false;
	public $incrementing = false;	
    //protected $sequence = 'GEN_PEDIDOS_VENDA'; 
    protected $guarded=[];
}
