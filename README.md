<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Para mostrar un modal con Laravel y hacer que se ejecute una vez al día, puedes seguir los siguientes pasos:

Para mostrar un modal con Laravel y hacer que se ejecute una vez al día, puedes seguir los siguientes pasos:

1. Crea una migración en Laravel para crear una tabla en la base de datos donde se almacenará la información del modal mostrado:

```bash
php artisan make:migration create_modal_trackings_table --create=modal_trackings
```

2. Abre el archivo de migración generado (`database/migrations/<timestamp>_create_modal_trackings_table.php`) y define los campos de la tabla, incluyendo uno para almacenar la fecha del último modal mostrado. Por ejemplo:

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalTrackingsTable extends Migration
{
    public function up()
    {
        Schema::create('modal_trackings', function (Blueprint $table) {
            $table->id();
            $table->date('last_shown_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modal_trackings');
    }
}
```

3. Ejecuta la migración para crear la tabla en la base de datos:

```bash
php artisan migrate
```

4. Crea un controlador en Laravel para manejar la lógica del modal:

```bash
php artisan make:controller ModalController
```

5. Abre el archivo del controlador generado (`app/Http/Controllers/ModalController.php`) y agrega un método para mostrar el modal:

```php

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

```

6. Crea una vista para el contenido del modal. Por ejemplo, crea un archivo `modal.blade.php` en la carpeta `resources/views` con el siguiente contenido:

<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <title>How To Add Bootstrap 5 Modal Popup In Laravel 9 - Websolutionstuff</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
      
  <div class="modal fade" id="mostrarmodal" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static">
    <div  class="modal-dialog modal-lg" role="document">
    
     
      <div class="modal-content">
         {!!Form::open(['route'=>['registro'],'method'=>'GET'])!!}
        <div class="modal-header">
         <p>
           <strong>ACUERDO DE CONFIDENCIALIDAD Y USO DE HERRAMIENTAS TECNOLOGICAS Y SISTEMAS DE INFORMACION DEL </strong> 
         <p>
        </div>

        <div class="modal-body">  
            El presente Acuerdo de Confidencialidad es un instrumento que lo suscriben los servidores/as del xxxxxxxxxxxxx del MSP,  (bajo cualquier modalidad de prestación de servicios), y tiene como fin afianzar el compromiso del servidor/a con la institución, respecto del uso de los recursos informáticos que la institución dispone y que entrega a cada uno de sus servidores/as, para el cumplimiento de sus funciones; en consecuencia, quienes forman parte de esta entidad, al acceder al mismo,  aceptan las limitaciones y restricciones de acceso a la información y a la divulgación de la misma.
            
            
            </div>
           
       
       <div class="modal-footer">

        {!!Form::submit('Aceptar',['class'=>'btn btn-success'])!!}

       </div>
      </div>
    </div>
  </div>


    </body>
</html>

<script type="text/javascript">

$(document).ready(function(){
              $.ajax({
                    url: "<?php echo route('modal') ?>",
                    method:'GET',
                    data:{},
                    dataType:'json',
                    success:function(data)
                      {      
                       if (data=== true) { 
                        $("#mostrarmodal").modal("show");
                        } else { 
                           alert("ACUERDO DE CONFIDENCIALIDAD Y USO DE HERRAMIENTAS TECNOLOGICAS Y SISTEMAS DE INFORMACION YA FUE ACEPTADO EL DIA DE HOY");
                           //alert(data.last_shown_date)
                        }   
                       }   
                    });

            });
</script>
-->




7. Define una ruta en el archivo `web.php` para acceder al controlador y mostrar el modal:

```php
use App\Http\Controllers\ModalController;

Route::get('/modal', [ModalController::class, 'showModal'])->name('modal');

Route::get('/registro', [ModalController::class, 'registroModal'])->name('registro');
```



Con estos pasos, cuando el usuario haga clic en el enlace o botón para mostrar el modal, Laravel verificará si el modal ya se mostró hoy consultando la tabla `modal_trackings`. Si ya se mostró, no se mostrará nuevamente. Si no se mostró hoy, se almacenará la fecha actual en la tabla y se mostrará el modal.