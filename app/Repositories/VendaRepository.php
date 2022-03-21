<?php

namespace App\Repositories;

use DB;
use App\Models\PedidoVenda;
use App\Models\PedidoVendaItem;

class VendaRepository
{
     protected $pedidoVenda; 
	 protected $pedidoVendaItem;
     public function __construct(PedidoVenda $pedidoVenda, PedidoVendaItem $pedidoVendaItem)
	 {
		
		 $this->pedidoVenda = $pedidoVenda;
		 $this->pedidoVendaItem = $pedidoVendaItem;
	 }
	public function vendasPorData($condicoes, $data_inicio, $data_fim)
	{

		$collection = collect([]);
		

		$pedidos =  $this->pedidoVenda->with(/*'pedido_item.produto',*/'cliente', 'forma_pagamento', 'vendedor')
		->select('PV_CODIGO', 'PV_DATA as data_pagamento', 
		'PV_VALOR_TOTAL as total_pagamento', 
		'PV_FATURAMENTO as faturamento', 
		'PV_CLIENTE', 'PV_FILIAL as pedido_filial', 
		'PV_FORMA_PAGAMENTO', 'PV_VENDEDOR')->where($condicoes)->whereBetween('PV_DATA', [$data_inicio, $data_fim])->get();

	

		return $pedidos;
	}

	public function ultimaVendaId(){
     
		$pedido=$this->pedidoVenda->select(DB::raw('max(PV_CODIGO) as id'))->first();
	 
		return $pedido;
   
	   } 

	   protected function gerarIdVenda(){
		$iGenerator = DB::connection('firebird')->select("select GEN_ID(GEN_PEDIDOS_VENDA,1) as ID from RDB\$DATABASE");
		$data = json_decode(json_encode($iGenerator),true);
        
		foreach ($data as $valor) {
            $id = $valor["ID"];
            return $id;
          }
	}
	protected function gerarIdVendaItem(){
		$iGenerator = DB::connection('firebird')->select("select GEN_ID(GEN_PEDIDOS_VENDA_ITENS,1) as ID from RDB\$DATABASE");
		$data = json_decode(json_encode($iGenerator),true);
	    
		foreach ($data as $valor) {
            $id = $valor["ID"];
            return $id;
          }
		
			
		
	}


	public function cadastrar($venda){


		//DB::beginTransaction();
		try{
                $data['PV_CODIGO'] = $this->gerarIdVenda();
				$data['PV_FILIAL' ]= $venda['empresa_id'];
				$data['PV_CLIENTE']= $venda['cliente_id'];
				$data['PV_VENDEDOR'] = $venda['vendedor_id'];
				$data['PV_DATA'] = date('Y-m-d');
				$data['PV_VALOR_TOTAL'] = $venda['total']+$venda['descontoTotal'];
				$data['PV_PRAZO_PAGAMENTO'] = $venda['prazo_pagamento'];
				$data['PV_STATUS'] = 1;
				$data['PV_FORMA_PAGAMENTO'] = $venda['forma_pagamento'];
				$data['PV_OBSERVACAO'] = $venda['obs'];
				$data['PV_DESCONTO'] = $venda['descontoTotal'];
				$data['PV_FLAG'] = $venda['flag'];
				$data['PV_TOTAL_GERAL'] = $venda['total'];
			$pedidoVenda=$this->pedidoVenda->create($data);
		}catch (\Illuminate\Database\QueryException $e) {

			DB::rollback();
			//return $e->getMessage();
			return 'Não foi possível realizar a operação.01!';
		}
		
      try{
		  
		foreach ($venda['produtos'] as $key => $value) {
			    $dataItem['PVI_CODIGO'] = $this->gerarIdVendaItem();
                $dataItem['PVI_FILIAL'] = $venda['empresa_id'];
				$dataItem['PVI_PEDIDO'] = $pedidoVenda->PV_CODIGO;
                $dataItem['PVI_PRODUTO'] = $value['id'];
                $dataItem['PVI_UNIDADE'] = $value['unidade_id'];
                $dataItem['PVI_QUANTIDADE'] = $value['quantidade'];
                $dataItem['PVI_ENTREGA'] = 0;
                $dataItem['PVI_VALOR_UNITARIO'] = $value['preco'];
				$dataItem['PVI_VALOR_TOTAL'] = $value['preco']*$value['quantidade'];
                $dataItem['PVI_STATUS'] = 1;
                $dataItem['PVI_LOCAL'] = 0;
                $dataItem['PVI_PRODUTO_DESCR'] = $value['descricao'];
                $dataItem['PVI_DESCONTO'] = $value['desconto'];
                $dataItem['PVI_TOTAL_GERAL'] = $value['total'];
		
		$pedidoVendaItem=$this->pedidoVendaItem->create($dataItem);
		}
	   }
		catch (\Illuminate\Database\QueryException $e) {

			DB::rollback();
			return $e->getMessage();
			return 'Não foi possível realizar a operação.02!';
		}


		DB::commit();

		return 'Pedido de venda feito com sucesso!'; 
	}
	
}
