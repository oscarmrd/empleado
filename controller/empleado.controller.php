<?php
require_once 'model/empleado.php';

class empleadoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new empleado();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/empleado/empleado.php';
       
    }
    
    public function Crud(){
        $empleado = new empleado();
        
        if(isset($_REQUEST['id'])){
            $empleado = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/empleado/empleado-editar.php';
        
    }
    
    public function Guardar(){
        $empleado = new empleado();
        
        $empleado->id = $_REQUEST['id'];
        $empleado->nombre = $_REQUEST['nombre'];
        $empleado->sexo = $_REQUEST['sexo'];
        $empleado->email = $_REQUEST['email'];
        $empleado->area_id = $_REQUEST['area_id'];
        $empleado->boletin = $_REQUEST['boletin'];
        $empleado->descripcion = $_REQUEST['descripcion'];  

        $error=0;
        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            $error=1;
        }

        if($error==0){
            $empleado->id > 0 
                ? $this->model->Actualizar($empleado)
                : $this->model->Registrar($empleado);

                
                    
        }   
        header('Location: index.php');        

        
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}