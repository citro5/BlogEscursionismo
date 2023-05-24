<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immagini extends Model
{
    use HasFactory;
    protected $table='immagini';
    protected $fillable=['path','escursione_id'];

    public $timestamps=false;


    #un immagine ha una sola escursione
    public function escursione(){
        return $this->hasOne(Escursione::class,'img_id','id');
    }
}
