<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalTracking extends Model
{
   
     protected $table = 'modal_trackings';

      protected $fillable = [
        'last_shown_date',
        
    ];
}
