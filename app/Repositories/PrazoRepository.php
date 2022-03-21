<?php

namespace App\Repositories;
use App\Models\PrazoCompras;
class PrazoRepository extends BaseRepository
{
  protected $prazo;
  public function __construct(PrazoCompras $prazo)
  {
      parent::__construct($prazo);
  }
}