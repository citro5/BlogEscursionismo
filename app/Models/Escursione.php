<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escursione extends Model
{
    use HasFactory;
    protected $table = 'escursione';  #nome tabella
    public $timestamps=false;
    public $fillable=['titolo','data'];                   //attributi che possono essere popolati in maniera massiva
    #protected $primaryKey= 'key';                            per cambiare nome primarykey


    public function gruppoMontuoso(){
        return $this->belongsTo(GruppoMontuoso::class,'gruppo_id','id');
    }
    public function tipologia(){
        return $this->belongsTo(Tipologia::class,'tipologia_id','id');
    }
    public function immagini(){
        return $this-> hasMany(Immagini::class,'img_id','id');

    }
}
