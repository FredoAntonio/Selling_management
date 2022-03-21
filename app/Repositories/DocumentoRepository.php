<?php

namespace App\Repositories;
use App\Models\TipoDocumentoFinancas;
class DocumentoRepository extends BaseRepository
{
  protected $tipoDocumento;
  public function __construct(TipoDocumentoFinancas $tipoDocumento)
  {
      parent::__construct($tipoDocumento);
  }
}