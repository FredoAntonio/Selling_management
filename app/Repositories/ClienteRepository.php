<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;
use DB;
class ClienteRepository extends BaseRepository
{
    public function __construct(Cliente $cliente)
    {
        parent::__construct($cliente);
    }

   
  
  /* public function all():object
  {


    $clientes = Cliente::select(
      'CL_CODIGO as id',
      'CL_CNPJ as cnpj',
      'CL_RAZAO_SOCIAL as rzsocial',
      'CL_NOME_FANTASIA as nome_fantasia',
      'CL_CIDADE as cidade_id',
      'CL_TELEFONE as telefone',
      'CL_CELULAR as celular'
    )->get();
   
    $collection = collect([]);
    foreach ($clientes as $cliente) {

      $collection->push([
        'id' =>utf8_encode($cliente->id),
        'cnpj' => utf8_encode($cliente->cnpj),
        'rzsocial' => utf8_encode($cliente->rzsocial),
        'nome_fantasia' => utf8_encode($cliente->nome_fantasia),
        'cidade' => utf8_encode($cliente->cidade_id),
        'telefone' => utf8_encode($cliente->telefone),
        'celular' => utf8_encode($cliente->celular)
      ]);
    }
    return $collection;
    
  } */

  /* public function save($cliente):object
  {
   
    $response=$this->cliente->create($cliente);
    return $response;

  } */

  public function gerarId(){
    $iGenerator = DB::connection('firebird')->select("select GEN_ID(GEN_CLIENTES,1) as ID from RDB\$DATABASE");
    $data = json_decode(json_encode($iGenerator),true);

      
    return $data;

}


}
