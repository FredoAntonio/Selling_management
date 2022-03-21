<?php

namespace App\Services;
use App\Repositories\DocumentoRepository;
class DocumentoService
{
  
  protected $documentoRepository;
  public function __construct(DocumentoRepository $documentoRepository)
  {
      $this->documentoRepository = $documentoRepository;
  } 
  public function tiposAll()
  {
      $dados = $this->documentoRepository->all();
      $tipos = $dados->select(
        'FIN_TPD_ID as id',
        'FIN_TPD_DESCRICAO as descricao'
      )->get();
  
     
      return $tipos;
    
     
  }
  
  
  
}