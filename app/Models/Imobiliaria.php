<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imobiliaria extends Model
{
   protected $table = 'IMB_IMOBILIARIA';
   protected $primaryKey = 'IMB_IMB_ID';
   public $timestamps = false;
   public $incrementing = false;
   protected $sequence = 'GEN_IMB_IMOBILIARIA';
 
   protected $guarded = [];
}
