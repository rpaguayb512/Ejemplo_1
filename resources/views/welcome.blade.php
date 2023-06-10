<!DOCTYPE html>
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
        <!-- Modal -->
  <div class="modal fade" id="mostrarmodal" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static">
    <div  class="modal-dialog modal-lg" role="document">
    
      <!-- Modal content-->
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
   



