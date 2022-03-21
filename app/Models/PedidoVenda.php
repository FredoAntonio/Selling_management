<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\PedidoVendaStatusCad;
use App\Models\Funcionario;
use App\Models\PedidoVendaItem;
use App\Models\Cliente;
use App\Models\TipoDocumentoFinancas;
use App\Models\Vendedor;

class PedidoVenda extends Model
{
    protected $table = 'PEDIDOS_VENDA';
	protected $primaryKey = 'PV_CODIGO';
	public $timestamps = false;
	public $incrementing = false;	
    protected $sequence = 'GEN_PEDIDOS_VENDA'; 
    protected $guarded=[];



  
	public function funcionario(){
		return $this->belongsTo(Funcionario::class, 'PV_VENDEDOR');
	}

	public function pedido_item(){
        return $this->hasMany(PedidoVendaItem::class,'PVI_PEDIDO','PV_CODIGO')->select(['PVI_CODIGO as codigo_pedido_item', 'PVI_QUANTIDADE as qtd_produto','PVI_VALOR_UNITARIO as valor_un_produto','PVI_VALOR_TOTAL as valor_total_produto','PVI_PEDIDO','PVI_PRODUTO']);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class,'PV_CLIENTE','CL_CODIGO')->select(['CL_CODIGO','CL_RAZAO_SOCIAL as razao_social']);
    }

    public function vendedor(){
        return $this->belongsTo(Vendedor::class,'PV_VENDEDOR','VD_FUNCIONARIO')->select(['VD_FUNCIONARIO','VD_NOME as nome']);
    }
    
    
      public function forma_pagamento(){
    return $this->belongsTo(TipoDocumentoFinancas::class,'PV_FORMA_PAGAMENTO','FIN_TPD_ID')->select(['FIN_TPD_ID','FIN_TPD_DESCRICAO as descricao']);
}
}
