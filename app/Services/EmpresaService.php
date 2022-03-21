<?php

namespace App\Services;
use App\Repositories\EmpresaRepository;
use App\Models\Imobiliaria;
class EmpresaService
{
  protected $empresaRepository;
  public function __construct(EmpresaRepository $empresaRepository)
  {
      $this->empresaRepository = $empresaRepository;
  }
  public function empresasAll()
  {
      $dados = $this->empresaRepository->all();
      
      $empresas= $dados->select('IMB_IMB_ID as id', 'IMB_IMB_NOME as nome', 'IMB_IMB_ENDERECO as endereco')->get();
      return $empresas;
     // $collection = collect([]);
      /* foreach ($empresas as $empresa) {
  
        $collection->push([
          'id' => utf8_encode($empresa->IMB_IMB_ID),
          'nome' => utf8_encode($empresa->IMB_IMB_NOME),
          'endereco' => utf8_encode($empresa->IMB_IMB_ENDERECO)
        ]);
      }
      return $collection; */
  }
}

