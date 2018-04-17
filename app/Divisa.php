<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisa extends Model
{
    protected $table 	= 'camdivis';
    protected $primaryKey = 'id_divisa';
    protected $fillable = ['fecha', 'm1', 'm2', 'm3', 'm4', 'm5', 'm6','m7','m8'];
    public $timestamps = false;
     
}
