<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModalTracking;

class ModalController extends Controller
{
    public function showModal(Request $request)
    {
        $today = date('Y-m-d');

        // Verificar si ya se mostró el modal hoy
        $modalTracking = ModalTracking::where('last_shown_date', $today)->first();
        if ($modalTracking) {
            echo json_encode(false);   
        }else{
        // Si no se mostró el modal hoy, almacenar la fecha actual y mostrar el modal
           echo json_encode(true);
           }
      }


     public function registroModal(Request $request)
       {
        $today = date('Y-m-d');
        $modalTracking = ModalTracking::where('last_shown_date', $today)->first();
        if ($modalTracking) {
               return redirect('/');
        }else{
           ModalTracking::create(['last_shown_date' => $today]);
           return redirect('/');
           }

    }
}
