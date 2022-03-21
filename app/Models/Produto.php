<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unidade;
class Produto extends Model
{
   protected $table = 'PRODUTOS';
    protected $primaryKey = 'PD_CODIGO';
    public $timestamps = false;
    public $incrementing = false;   
   
    protected $guarded=[];




     public function unidade(){
        return $this->hasOne(Unidade::class, 'UN_PRODUTO','PD_CODIGO')->select(['UN_CODIGO', 'UN_SIGLA as sigla','UN_PRODUTO']);
    } 
}
