<?php
class sucursal
{
	private $id;
	private $nombre;
	private $ubicacion;
	private $extecionT;
	private $estado;
	private $capacidad;

	function __construct($id, $nombre, $ubicacion, $extecionT, $estado, $capacidad)
	{
		$this->setId($id);
		$this->setNombre($nombre);
		$this->setUbicacion($ubicacion);
		$this->setExtencionT($extecionT);		
		$this->setEstado($estado);
		$this->setCapacidad($capacidad);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getUbicacion(){
		return $this->ubicacion;
	}

	public function setUbicacion($ubicacion){
		$this->ubicacion = $ubicacion;
	}

	public function getExtencionT(){
		return $this->extecionT;
	}
	public function setExtencionT($extecionT){
		$this->extecionT = $extecionT;
		}
		public function getEstado(){
			return $this->estado;
		}
	
		public function setEstado($estado){
			$this->estado = $estado;
		}
		public function getCapacidad(){
			return $this->capacidad;
		}
	
		public function setCapacidad($capacidad){
			$this->capacidad = $capacidad;
		}
		
        public static function allSucursales(){
            $db=Db::getConnect();
            $listaSucursales=[];
    
            $select=$db->query('SELECT * FROM sucursal WHERE estado = 1');
    
            foreach($select->fetchAll() as $sucursal){
                $listaSucursales[]=new sucursal($sucursal['id'],$sucursal['nombre'],$sucursal['ubicacion'],$sucursal['extencionT'],$sucursal['estado'] ,$sucursal['capacidad']);
        }
        return $listaSucursales;
    }

    public static function searchByIdSucursal($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM sucursal WHERE id =:id');
		$select->bindValue('id',$id);
		$select->execute();

		$sucursalDb=$select->fetch();
		$sucursal = new sucursal($sucursalDb['id'],$sucursalDb['nombre'],$sucursalDb['ubicacion'],$sucursalDb['extencionT'],$sucursalDb['estado'],$sucursalDb['capacidad']);
		//var_dump($alumno);
		//die();
		return $sucursal;

	}
    public static function searchByubicacionSucursal($ubicacion){
		
		$db=Db::getConnect();
		$listaSucursales=[];
		$select=$db->prepare('SELECT * FROM sucursal WHERE  estado=1 AND ubicacion=:ubicacion');
		$select->bindValue('ubicacion',$ubicacion);
		$select->execute();
	

		foreach($select->fetchAll() as $sucursal){
			$listaSucursales[]=new sucursal($sucursal['id'],$sucursal['nombre'],$sucursal['ubicacion'],$sucursal['extencionT'],$sucursal['estado'],$sucursal['capacidad']);
		}
		return $listaSucursales;

	}

    public static function updateSucursal($sucursal){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE sucursal SET  nombre=:nombre,ubicacion=:ubicacion,extencionT=:extencionT,estado=:estado,capacidad=:capacidad WHERE id=:id');
		$update->bindValue('nombre',$sucursal->getNombre());
		$update->bindValue('ubicacion',$sucursal->getUbicacion());
		$update->bindValue('extencionT',$sucursal->getExtencionT());
		$update->bindValue('estado',$sucursal->getEstado());
		$update->bindValue('capacidad',$sucursal->getCapacidad());
        $update->bindValue('id',$sucursal->getId());
		$update->execute();
	}
	public static function deleteSucursal($id){
		$db=Db::getConnect();
		$delete=$db->prepare(' UPDATE sucursal SET estado = 0 WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}

	public static function saveSucursal($sucursal){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO sucursal VALUES (null, :nombre,:ubicacion,:extencionT,:estado,:capacidad)');
		$insert->bindValue('nombre',$sucursal->getNombre());
		$insert->bindValue('ubicacion',$sucursal->getUbicacion());
		$insert->bindValue('extencionT',$sucursal->getExtencionT());
		$insert->bindValue('estado',$sucursal->getEstado());
		$insert->bindValue('capacidad',$sucursal->getCapacidad());
		$insert->execute();
	}
	
}