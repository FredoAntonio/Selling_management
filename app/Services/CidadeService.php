<?php

namespace App\Services;
use App\Repositories\CidadeRepository;
class CidadeService
{
    protected $cidadeRepository;
    public function __construct(CidadeRepository $cidadeRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
    }
    public function cidadesAll()
    {
        $dados = $this->cidadeRepository->all();
        $cidades = $dados->select('CD_CODIGO as id', 'CD_NOME as nome')->orderBy('CD_NOME','asc')->get();
        /* $collection = collect([]);
        foreach ($cidades as $cidade) {
    
          $collection->push([
            'id' => utf8_encode($cidade->CD_CODIGO),
            'nome' => utf8_encode($cidade->CD_NOME)
          ]);
        } */
        return $cidades;
    }
  
}