<h1 class="page-header">
    <?php echo $empleado->id != null ? $empleado->nombre : 'Nuevo Registro'; ?>

    <link href="view/img/estilo.css" rel="stylesheet" type="text/css" > 
    
</h1>

<ol class="breadcrumb">
  <li><a href="?c=empleado">Empleado</a></li>
  <li class="active"><?php echo $empleado->id != null ? $empleado->nombre : 'Nuevo Registro'; ?></li>
</ol>




<form id="frm-empleado" action="?c=empleado&a=Guardar" method="post" enctype="multipart/form-data">
    
   

    <div class="form-group">
        <label>Nombre Completo*</label>
        <input type="text" name="nombre" value="<?php echo $empleado->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
    </div>
   
    <input type="hidden" name="id" value="<?php echo $empleado->id; ?>" />
      <div class="form-group">
        <label>Correo Electrónico *</label>
        <input type="text" name="email" value="<?php echo $empleado->email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" required>
    </div>

    <input type="hidden" name="id" value="<?php echo $empleado->id; ?>" />
      <div class="form-group">
        <label>Sexo *</label>
        <?php $valid_check=$empleado->sexo; ?> 
        <?php if($valid_check=='M') {?>
           <input type="radio" name="sexo" value="M"  checked>Masculino
        <?php
        } else {?> 
           <input type="radio" name="sexo" value="M">Masculino
        <?php 
        }
        if($valid_check=='F') {?>
           <input type="radio" name="sexo" value="F" checked>Femenino
        <?php
        } else {?>
           <input type="radio" name="sexo" value="F">Femenino
           <?php
        }?>   

      
        
    </div>

    
  
    <input type="hidden" name="id" value="<?php echo $empleado->id; ?>" />
      <div class="form-group">
        <label>Area *</label>
        <?php 
            $area=$empleado->area_id;
        ?>            

        <select name="area_id">

        <?php 
            $area=$empleado->area_id;
            if(!$area){
            ?>               
               <option value="0" selected>--- Seleccionar Area ---</option>
            <?php
            }
           
           
            foreach($this->model->areas() as $r): 
        
               if($area == $r->id){
               ?> 
                   <option value="<?php echo $r->id; ?>" selected><?php echo $r->nombre; ?></option>
               <?php
               }
               else{
                ?> 
                    <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?></option>
                <?php
                }
               
            endforeach;
             
        ?>
        </select>    
      
    </div>

    <input type="hidden" name="id" value="<?php echo $empleado->id; ?>" />
      <div class="form-group">
        <label>Descripción *</label>
        <textarea name="descripcion" rows="3" cols="40" placeholder="Ingrese la descripción" required><?php echo $empleado->descripcion; ?></textarea> 
    </div>

    <input type="hidden" name="id" value="<?php echo $empleado->id; ?>" />
      <div class="form-group">
     
        
        <?php 
        $bolet=$empleado->boletin;
        if($bolet==1){
        ?>
           <input type="checkbox" class="form-check-input" id="conditions" name="boletin" value="1" checked>
        <?php
        } 
        else{
        ?>
           <input type="checkbox" class="form-check-input" id="conditions" name="boletin" value="1">
        <?php
        }
        ?>
           
        <label2 class="form-check-label" for="boletin">Deseo recibir boletin informativo</label2>

       
    </div>

    <input type="hidden" name="id" value="<?php echo $empleado->id; ?>" />
      <div class="form-group">
      <label3>Roles</label3>

      <?php
            echo "<br>";
            foreach($this->model->roles($empleado->id) as $s): 
        
                $nombr = $s->nombre;
                $idrol0 = $s->id;
                $idrol = $s->rolid;

                
                if($idrol>=1){
                ?>
                   
                   <input type="checkbox" class="form-check-input" id="conditions" name="roles[]" value="$idrol" checked>
                <?php
                } 
                else{
                ?>
                   <input type="checkbox" class="form-check-input" id="conditions" name="roles[]" value="$idrol0">
                <?php
                }
                echo $nombr."<br>";
        
        
            endforeach;
        ?>


      
       
    </div>

    
   
    
    <hr />
    
    <div class="text-left">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-empleado").submit(function(){
            return $(this).validate();
        });
    })
</script>