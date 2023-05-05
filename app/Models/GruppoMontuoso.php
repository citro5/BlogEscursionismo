<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruppoMontuoso extends Model
{
    use HasFactory;
    protected $table = 'gruppoMontuoso';  #nome tabella
    public $timestamps=false;
    public $fillable=['nome'];

    public function escursione(){
        return $this->hasMany(Escursione::class,'gruppo_id','id');
    }
}
