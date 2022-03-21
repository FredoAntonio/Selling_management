<?php

namespace App\Services;

use App\Repositories\VendaRepository;

class VendaService
{
    public $vendaRepository;
    public function __construct(VendaRepository $vendaRepository)
    {
        $this->vendaRepository =  $vendaRepository;
    }
    public function vendasPorData($pesquisa)
    {
        $collection = collect([]);
        $pesquisa = json_decode($pesquisa, true);
        $data_inicio = $data_fim = date('d-m-Y');
        $condicoes = [];

        if ($pesquisa['cliente_id'] != 0) {

            array_push($condicoes, ['PV_CLIENTE', '=', $pesquisa['cliente_id']]);
        }

        if ($pesquisa['filial'] != "") {

            array_push($condicoes, ['PV_FILIAL', '=', $pesquisa['filial']]);
        }
        if ($pesquisa['pedido'] != "") {

            array_push($condicoes, ['PV_CODIGO', '=', $pesquisa['pedido']]);
            $pesquisa['data_inicio'] = date('01-01-1970');
            $pesquisa['data_fim'] = date('d-m-Y');
        }

        if ($pesquisa['data_inicio']) {
            $data_inicio = $pesquisa['data_inicio'];
            //$data['data_inicio']='';
        }
        if ($pesquisa['data_fim']) {

            $data_fim = $pesquisa['data_fim'];
            //$data['data_fim']='';
        }


        $pedidos = $this->vendaRepository->vendasPorData($condicoes, $data_inicio, $data_fim);


        /* foreach ($pedidos as $key => $value) {

        $collection->push(['pedido_codigo'=>utf8_encode($value->PV_CODIGO),'pedido_filial'=>utf8_encode($value->pedido_filial),'total_pagamento'=>utf8_encode(number_format($value->total_pagamento, 2, ",", ".")),'razao_social'=>utf8_encode($value->cliente?$value->cliente->razao_social:''),'forma_pagamento'=>utf8_encode($value->forma_pagamento?$value->forma_pagamento->descricao:''),'data_pagamento'=>utf8_encode($value->data_pagamento),'faturamento'=>utf8_encode($value->faturamento),'vendedor'=>utf8_encode($value->vendedor?$value->vendedor->nome:'')]);
        


    } */

        return $pedidos;
    }


    public function ultimaVendaId()
    {
        $pedido = $this->vendaRepository->ultimaVendaId();

        return $pedido;
    }

    
    /* protected function gerarIdVenda(){

        $data = $this->vendaRepository->gerarIdVenda();

        foreach ($data as $valor) {
            $id = $valor["ID"];
            return $id;
          }
    }
      protected function gerarIdVendaItem(){

        $data = $this->vendaRepository->gerarIdVendaItem();
     
        foreach ($data as $valor) {
            $id = $valor["ID"];
            return $id;
          }

    }
 */
     
    public function cadastrar($venda){


				
        $venda = $this->vendaRepository->cadastrar($venda);

      return $venda;

    }




}
