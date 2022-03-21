<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Produto;

class PedidoVendaItem extends Model
{
    protected $table = 'PEDIDOS_VENDA_ITENS';
    protected $primaryKey = 'PVI_CODIGO';
    public $timestamps = false;
    public $incrementing = false; 
    protected $sequence = 'GEN_PEDIDOS_VENDA_ITENS';  
    protected $guarded=[];


 public function produto(){
        return $this->belongsTo(Produto::class, 'PVI_PRODUTO','PD_CODIGO')->select(['PD_CODIGO', 'PD_DESCRICAO as descricao']);
    }
   
   
 
 

    
}
