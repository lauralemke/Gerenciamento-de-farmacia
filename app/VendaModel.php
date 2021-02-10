<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaModel extends Model
{
    protected $table = "venda_models";
    protected $fillable = ['nome','cliente_id',  'remedio_models_id', 'data_venda', 'hora_venda','funcionario_models_id'];

    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class,'cliente_id','id');
    }
    public function remedio_models()
    {
        return $this->belongsTo(RemedioModel::class,'remedio_models_id','id');
    }
    public function funcionario_models()
    {
        return $this->belongsTo(FuncionarioModel::class,'funcionario_models_id','id');
    }

}
