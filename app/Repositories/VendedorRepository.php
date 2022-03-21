<?php

namespace App\Repositories;

use App\Models\Vendedor;

class VendedorRepository
{



  public function vendedorLogado()

  {


    $vendedor = Vendedor::select('VD_FUNCIONARIO as id', 'VD_NOME as nome', 'VD_REPRESENTANTE as representante', 'VD_ATUALIZACAO as atualizacao')->whereHas('funcionario.user', function ($q) {
    
      $q->where('id', auth()->user()->id);
    })->first();

    
    return $vendedor;
  }
}
