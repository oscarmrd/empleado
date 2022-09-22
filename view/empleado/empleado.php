<h1 class="page-header">Lista de Empleados </h1>


    <a class="btn btn-primary pull-right" href="?c=empleado&a=Crud">Crear</a>
<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>            
            <th style="width:180px; background-color: #5DACCD; color:#fff" >Nombre</th>
            <th style="width:120px; background-color: #5DACCD; color:#fff">Email</th>
            <th style=" background-color: #5DACCD; color:#fff">Sexo</th>
            <th style=" background-color: #5DACCD; color:#fff">Area</th>
            <th style="width:120px; background-color: #5DACCD; color:#fff">Boletin</th>            
            <th style="width:60px; background-color: #5DACCD; color:#fff">Modificar</th>
            <th style="width:60px; background-color: #5DACCD; color:#fff">Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): 
        $bolet=$r->boletin; 
        if($bolet==1){
            $bolet="Si";
        } else {
            $bolet="No";
        } 

        $sex=$r->sexo; 
        if($sex=="M"){
            $sex="Masculino";
        } else {
            $sex="Femenino";
        } 

        foreach($this->model->areas() as $s): 
        
            if($r->area_id == $s->id){
                 $nombrearea=$s->nombre;    
             }
            
        endforeach;
        ?>
        <tr>        
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->email; ?></td>
            <td><?php echo $sex; ?></td>
            <td><?php echo $nombrearea; ?></td>
            <td><?php echo $bolet ?></td>
            <td>
                <a href="?c=empleado&a=Crud&id=<?php echo $r->id; ?>"><img src="view/img/editar.JPG" alt="Editar"  width="25" height="25"/></a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=empleado&a=Eliminar&id=<?php echo $r->id; ?>"><img src="view/img/eliminar.png" alt="Eliminar"  width="25" height="25"/></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

</body>
<script  src="assets/js/datatable.js">  

</script>


</html>
