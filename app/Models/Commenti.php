<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commenti extends Model
{
    use HasFactory;
    protected $table='commenti';
    protected $fillable=['contenuto','data'];

    public $timestamps=false;

    #un commento ha una sola escursione
    public function escursione(){
        return $this->hasOne(Escursione::class,'comment_id','id');
    }
}
