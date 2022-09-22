<?php
class empleado
{
	private $pdo;
    
    public $id;   
    public $nombre;
    public $email;  
    public $sexo;
    public $area_id;
	public $boletin;
	public $descripcion;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM empleado");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function areas()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM areas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function roles($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT nombre, id, (select rol_id FROM empleado_rol WHERE empleado_id = ? and rol_id=a.id) as rolid from roles a order by nombre");
			        			          

			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM empleado WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM empleado WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE empleado SET 
						nombre          = ?, 
						email        = ?,
                        sexo        = ?,
						area_id        = ?,
						boletin        = ?,
						descripcion        = ?
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->nombre,                        
                        $data->email,
                        $data->sexo,
                        $data->area_id,
						$data->boletin,
						$data->descripcion, 
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(empleado $data)
	{
		try 
		{
		$sql = "INSERT INTO empleado (nombre,email,sexo,area_id,boletin,descripcion) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
			        $data->nombre,
                    $data->email, 
                    $data->sexo,
					$data->area_id,
					$data->boletin, 
                     $data->descripcion 
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
}