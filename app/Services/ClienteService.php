<?php

namespace App\Services;

use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use DB;

class ClienteService
{

  protected $clienteRepository;

  public function __construct(ClienteRepository $clienteRepository)
  {
    $this->clienteRepository = $clienteRepository;
  }


  public function clienteAll()
  {
    $dados = $this->clienteRepository->all();
    
    $clientes = $dados->with('cidade')->select('CL_CODIGO as id', 'CL_CNPJ as cnpj',
     'CL_RAZAO_SOCIAL as rzsocial', 'CL_NOME_FANTASIA as nome_fantasia','CL_TELEFONE as telefone',
     'CL_CELULAR as celular','CL_CIDADE','CL_ENDERECO as endereco'
     ,'CL_INSCRICAO_ESTADUAL as inscricao_estadual','CL_CEP as cep','CL_ENDERECO_BAIRRO as bairro')->orderBy('CL_CODIGO','desc')->get();
     
     
     
    
     
     
     
    /* $collection = collect([]);
    foreach ($clientes as $cliente) {
      
      $collection->push([
        'id' => utf8_encode($cliente->CL_CODIGO),
        'cnpj' => utf8_encode($cliente->CL_CNPJ),
        'rzsocial' => utf8_encode($cliente->CL_RAZAO_SOCIAL),
        'nome_fantasia' => utf8_encode($cliente->CL_NOME_FANTASIA),
        'cidade_nome' => utf8_encode($cliente->cidad?$cliente->cidade->CD_NOME:''),
        'telefone' => utf8_encode($cliente->CL_TELEFONE),
        'celular' => utf8_encode($cliente->CL_CELULAR)
      ]);
    } */
    return $clientes;
  }
  public function cadastrar($cliente)
  {

    $data['CL_CODIGO']  = $this->gerarId();
    $data['CL_CNPJ'] = strtoupper($cliente['cnpj']);
    $data['CL_RAZAO_SOCIAL'] = strtoupper($cliente['rz_social']);
    $data['CL_NOME_FANTASIA'] = strtoupper($cliente['nome_fantasia']);
    $data['CL_CEP'] = strtoupper($cliente['cep']);
    $data['CL_INSCRICAO_ESTADUAL'] = strtoupper($cliente['inscricao_estadual']);
    $data['CL_ENDERECO'] = strtoupper($cliente['endereco']);
    $data['CL_ENDERECO_NUMERO'] = strtoupper($cliente['endereco_numero']);
    $data['CL_ENDERECO_COMPL'] = strtoupper($cliente['endereco_compl']);
    $data['CL_EMAIL'] = strtoupper($cliente['email']);
    $data['CL_ENDERECO_BAIRRO'] = strtoupper($cliente['endereco_bairro']);
    $data['CL_CIDADE'] = strtoupper($cliente['cidade']);
    $data['CL_CONTATO'] = strtoupper($cliente['contato']);
    $data['CL_OBSERVACOES'] = strtoupper($cliente['obs']);



    $cliente = $this->clienteRepository->save($data);

    return $cliente;
  }





  protected function gerarId()
  {
    $data = $this->clienteRepository->gerarId();

    foreach ($data as $valor) {
      $id = $valor["ID"];
      return $id;
    }
  }
}
