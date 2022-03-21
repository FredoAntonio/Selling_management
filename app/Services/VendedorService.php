<?php

namespace App\Services;
use App\Repositories\VendedorRepository;
class VendedorService
{

  protected $vendedorRepository;
    public function __construct(VendedorRepository $vendedorRepository)
    {
        $this->vendedorRepository = $vendedorRepository;
    }


    public function vendedorLogado()
    {
        $vendedor = $this->vendedorRepository->vendedorLogado();
         
        
        return $vendedor;
    }


  }


