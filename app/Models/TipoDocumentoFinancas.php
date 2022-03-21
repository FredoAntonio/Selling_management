<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumentoFinancas extends Model
{
    protected $table = 'FIN_TIPODOCUMENTO';
    protected $primaryKey = 'FIN_TPD_ID';

    protected $guarded=['FIN_TPD_ID'];
}
