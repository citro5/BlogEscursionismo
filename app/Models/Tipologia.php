<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    use HasFactory;
    protected $table = 'tipologia';  #nome tabella
    public $timestamps=false;
    public $fillable=['nome'];                   //attributi che possono essere popolati in maniera massiva
    
    public function difficoltà(){
        return $this->hasMany(Difficoltà::class,'tipologia_id','id');
    }
    public function escursione(){
        return $this->hasMany(Escursione::class,'tipologia_id','id');
    }
}
