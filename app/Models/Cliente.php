<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;


   
    protected $table = 'CLIENTES';
    protected $primaryKey = 'CL_CODIGO';
    public $timestamps = false;
	public $incrementing = false;	
    protected $sequence = 'GEN_CLIENTES'; 

    protected $fillable = [
		'CL_CODIGO',
        'CL_CNPJ',
        'CL_RAZAO_SOCIAL',
        'CL_NOME_FANTASIA',
        'CL_INSCRICAO_ESTADUAL',
        'CL_CEP',
        'CL_CIDADE',
		'CL_STATUS',
        'CL_TIPO_CLIENTE',
		'CL_EMAIL',
		'CL_OBSERVACOES',
		'CL_DATA_CADASTRO',
		'CL_RAMO_ATIVIDADE',
		'CL_NUM_FUNCIONARIOS',
		'CL_COTACOES',
		'CL_FORMA_PAGAMENTO',
		'CL_VENDEDOR',
		'CL_SUFRAMA',
		'CL_TIPO_FORNECEDOR',
		'CL_TIPO_TRANSPORTADOR',
		'CL_TIPO_TERCEIROS',
		'CL_TRANSPORTADORA',
		'CL_LIMITE_CREDITO',
		'CL_ENDERECO',
		'CL_ENDERECO_COMPL',
		'CL_ENDERECO_NUMERO',
		'CL_CEP',
		'CL_ENDERECO_BAIRRO',
		'CL_TELEFONE',
		'CL_TELEFONEFAX',
		'CL_INSCRICAO_MUNICIPAL',
		'CL_CRT',
		'CL_TABELA',
		'CL_CONTATO',
		'CL_TRA_TABELA',
		'CL_PRAZO_PGTO',
		'CL_TIPO_CADASTRO',
		'CL_TIPO',
		'CL_DATA_ANIVERSARIO',
		'CL_CREDITO_CONSULTAR',
		'CL_CREDITO_FINANCEIRO',
		'CL_ANALISE_CREDITO',
		'CL_FORMAPRAZO_FIXA',
		'CL_RNTRC',
		'CL_CNAE',
		'CL_CNH',
		'CL_FOTO_01',
		'CL_FATOR_FINANCEIRO',
		'CL_CELULAR'
	];

    public function cidade(){
		return $this->belongsTo(Cidade::class, 'CL_CIDADE','CD_CODIGO')->select(['CD_CODIGO','CD_NOME as cidade_nome']); // codigo da tabela relacionada e a seguir o codigo da chave estrangeira
	}
}
