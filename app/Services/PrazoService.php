<?php

namespace App\Services;
use App\Repositories\PrazoRepository;
class PrazoService
{
  protected $prazoRepository;
  public function __construct(PrazoRepository $prazoRepository)
  {
      $this->prazoRepository = $prazoRepository;
  } 
  public function prazosAll()
  {
      $dados = $this->prazoRepository->all();
      $prazos = $dados->select(
        'PZC_CODIGO as id',
        'PZC_DESCRICAO as descricao'
      )->get();
  
     
      return $prazos;
    
     
  }
}