<?php

namespace App\Repositories;

use App\Models\Imobiliaria;

class EmpresaRepository extends BaseRepository
{
   


  public function __construct(Imobiliaria $empresa)
  {
      parent::__construct($empresa);
  }
/* 
  public function pegaEmpresas()
  {
    $empresas = Imobiliaria::select('IMB_IMB_ID as id', 'IMB_IMB_NOME as nome', 'IMB_IMB_ENDERECO as endereco')->get();

    return $empresas;
  }
 */
 
}
