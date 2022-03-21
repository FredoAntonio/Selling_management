<?php

namespace App\Services;
use App\Repositories\ProdutoRepository;
use DB;
use App\Models\Unidade;
class ProdutoService
{
  protected $produtoRepository;
  public function __construct(ProdutoRepository $produtoRepository, Unidade $unidade)

  {
      $this->produtoRepository = $produtoRepository;
      $this->unidade = $unidade;
  } 

  public function produtosAll()
  {


     $collection= collect([]);
     $dados = $this->produtoRepository->all();
      $produtos = $dados->select(
        'PD_CODIGO as id',
        'PD_DESCRICAO as descricao',
        'PD_REFERENCIA as referencia',
        'PD_PRECO_VISTA as preco'
        //'PD_MARCA as unidade'
      )->get(); 
      
      foreach ($produtos as $produto) {
     
         $unidade =$this->unidade->where('UN_PRODUTO',$produto->id)->first();
       
         if($unidade ){ // por alguma razao estranha nao funciona com o relacionamento
          $produto->unidade_id = $unidade->UN_CODIGO;
          $produto->unidade = $unidade->UN_SIGLA;
        }else{
          $produto->unidade_id = '';
          $produto->unidade = '';
        }
          $collection->push($produto);
       } 
    

      return $produtos;
    
     
  }



}