<?php

namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository extends BaseRepository
{
  protected $produto;
  public function __construct(Produto $produto)
  {
      parent::__construct($produto);
  }
}
