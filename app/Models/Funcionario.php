<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PedidoVenda;
use App\Models\User;
class Funcionario extends Model
{
	protected $table = 'FUNCIONARIOS';
	protected $primaryKey = 'FU_CODIGO';
	public $timestamps = false;
	public $incrementing = false;	
     protected $sequence = 'GEN_FUNCIONARIOS'; 
	protected $fillable = [
		'FU_CODIGO           ',                  
		'FU_NOME             ',        
		'FU_LOGRADOURO       ',        
		'FU_NUMERO           ',        
		'FU_COMPLEMENTO      ',        
		'FU_BAIRRO           ',        
		'FU_CIDADE           ' ,      
		'FU_CEP              ',       
		'FU_TELEFONE         ' ,
		'FU_EMAIL         ', 
		'FU_ADMISSAO         ',        
		'FU_DEMISSAO         ',        
		'FU_FUNCAO           ',        
		'FU_SUPERVISOR       ',                
		'FU_ADMINISTRADOR    ',        
		'FU_LOGIN            ',        
		'FU_SENHA            ',      
		'FU_EMPRESA          ',                
		'FU_LIB_DESCONTO     '        
		
	]; 


	public function vendas(){
		return $this->hasMany(PedidoVenda::class, 'PV_VENDEDOR');
	}

	public function user(){
        return $this->belongsTo(User::class,'FU_CODIGO_USER','id');
    }
}
