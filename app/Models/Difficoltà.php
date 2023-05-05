<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficoltà extends Model
{
    use HasFactory;
    protected $table = 'difficoltà';  #nome tabella
    public $timestamps=false;
    public $fillable=['grado_difficoltà'];                   //attributi che possono essere popolati in maniera massiva
    
    public function tipologia(){
        return $this->belongsTo(Tipologia::class,'tipologia_id','id');
    }
}
