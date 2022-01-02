<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    use HasFactory;

    protected $guarded = false;

    const ELEMENT_PLANCHE = 1;
    const ELEMENT_BACK_LEVER = 2;
    const ELEMENT_MALTESE = 3;
    const ELEMENT_FRONT_LEVER = 4;
    const ELEMENT_VICTORIAN = 5;
    const ELEMENT_MANNA = 6;
    const ELEMENT_HANDSTAND = 7;
    const ELEMENT_INVERT = 8;
    const ELEMENT_HANDSTAND_CORNER = 9;

}
