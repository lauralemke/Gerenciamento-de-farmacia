<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
  protected $table = "cliente";
  public function municipio()
  {
      return $this->belongsTo(MunicipioModel::class,'municipio_id','id');
  }
}

