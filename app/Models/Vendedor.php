<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Funcionario;
class Vendedor extends Model
{
    protected $table = 'VENDEDORES';
    protected $primaryKey = 'VD_FUNCIONARIO';
    public $timestamps = false;
    public $incrementing = false;   
    protected $guarded=[];
    

    public function funcionario(){
        return $this->belongsTo(Funcionario::class,'VD_FUNCIONARIO','FU_CODIGO');
    }
}
