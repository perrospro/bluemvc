<?php
class evento
{
	private $idevento;
	private $tema;
	private $fecha;
	private $ubi;
	private $capacidad_total;
	private $capacidad_dis;
    private $descripcion;
    private $estatus;
    private $horaini;
    private $img;

	function __construct($idevento, $tema, $fecha, $ubi, $capacidad_total, $capacidad_dis, $descripcion,  $estatus ,$horaini ,$img)
	{
		$this->setIdevento($idevento);
		$this->setTema($tema);
		$this->setFecha($fecha);
		$this->setubi($ubi);		
		$this->setCapacidad_total($capacidad_total);
		$this->setCapacidad_dis($capacidad_dis);
        $this->setDescripcion($descripcion);
		$this->setEstatus($estatus);
		$this->setHoraini($horaini);		
		$this->setImg($img);
	}

	public function getIdevento(){
		return $this->idevento;
	}

	public function setIdevento($idevento){
		$this->idevento = $idevento;
	}

	public function getTema(){
		return $this->tema;
	}

	public function setTema($tema){
		$this->tema = $tema;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getUbi(){
		return $this->ubi;
	}
	public function setUbi($ubi){
		$this->ubi = $ubi;
		}
		public function getCapacidad_total(){
			return $this->capacidad_total;
		}
	
		public function setCapacidad_total($capacidad_total){
			$this->capacidad_total = $capacidad_total;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
	
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}


        public function getCapacidad_dis(){
			return $this->capacidad_dis;
		}
	
		public function setCapacidad_dis($capacidad_dis){
			$this->capacidad_dis = $capacidad_dis;
		}


        public function getEstatus(){
			return $this->estatus;
		}
	
		public function setEstatus($estatus){
			$this->estatus = $estatus;
		}

        public function getHoraini(){
			return $this->horaini;
		}
	
		public function setHoraini($horaini){
			$this->horaini = $horaini;
		}

        public function getImg(){
			return $this->img;
		}
	
		public function setImg($img){
			$this->img = $img;
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

        public static function allEventos(){
            $db=Db::getConnect();
            $listaEventos=[];
    
            $select=$db->query('SELECT idevento ,tema,fecha,sucursal.nombre as ubi,capacidad_total,capacidad_dis,descripcion,estatus,horaini,img  FROM evento,sucursal WHERE sucursal.id = evento.ubi AND estatus = 1');
    
            foreach($select->fetchAll() as $evento){
                $listaEventos[]= new evento($evento['idevento'],$evento['tema'],$evento['fecha'],$evento['ubi'],$evento['capacidad_total'] ,$evento['capacidad_dis'],$evento['descripcion'],$evento['estatus'],$evento['horaini'],$evento['img']);
        }
        return $listaEventos;
    }






    public static function searchByIdEvento($idevento){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT idevento ,tema,fecha,sucursal.nombre as ubi,capacidad_total,capacidad_dis,descripcion,estatus,horaini,img  FROM evento,sucursal WHERE sucursal.id = evento.ubi AND estatus = 1 AND idevento=:idevento');
		$select->bindValue('idevento',$idevento);
		$select->execute();

		$eventoDb=$select->fetch();
		$evento = new evento($eventoDb['idevento'],$eventoDb['tema'],$eventoDb['fecha'],$eventoDb['ubi'],$eventoDb['capacidad_total'] ,$eventoDb['capacidad_dis'],$eventoDb['descripcion'],$eventoDb['estatus'],$eventoDb['horaini'],$eventoDb['img']);
		//var_dump($alumno);
		//die();
		return $evento;

	}
    public static function searchByfechaEvento($fecha){
		
		$db=Db::getConnect();
		$listaEventos=[];
		$select=$db->prepare('SELECT idevento ,tema,fecha,sucursal.nombre as ubi,capacidad_total,capacidad_dis,descripcion,estatus,horaini,img  FROM evento,sucursal WHERE sucursal.id = evento.ubi AND estatus = 1 AND fecha=:fecha');
		$select->bindValue('fecha',$fecha);
		$select->execute();
	

		foreach($select->fetchAll() as $evento){
			$listaEventos[]=new evento($evento['idevento'],$evento['tema'],$evento['fecha'],$evento['ubi'],$evento['capacidad_total'] ,$evento['capacidad_dis'],$evento['descripcion'],$evento['estatus'],$evento['horaini'],$evento['img']);
		}
		return $listaEventos;

	}

    public static function updateEvento($evento){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE evento SET  tema=:tema,fecha=:fecha,ubi=:ubi,capacidad_total=:capacidad_total,capacidad_dis=:capacidad_dis ,descripcion=:descripcion,estatus=:estatus,horaini=:horaini,img=:img WHERE idevento=:idevento');
		$update->bindValue('tema',$evento->getTema());
		$update->bindValue('fecha',$evento->getFecha());
		$update->bindValue('ubi',$evento->getUbi());
		$update->bindValue('capacidad_total',$evento->getCapacidad_total());
		$update->bindValue('capacidad_dis',$evento->getCapacidad_dis());
		$update->bindValue('descripcion',$evento->getDescripcion());
		$update->bindValue('estatus',$evento->getEstatus());
		$update->bindValue('horaini',$evento->getHoraini());
		$update->bindValue('img',$evento->getImg());
        $update->bindValue('idevento',$evento->getIdevento());
		$update->execute();
	}
	public static function deleteEvento($idevento){
		$db=Db::getConnect();
		$delete=$db->prepare(' UPDATE evento SET estatus = 0 WHERE idevento=:idevento');
		$delete->bindValue('idevento',$idevento);
		$delete->execute();		
	}

	public static function saveEvento($evento){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO evento VALUES (null, :tema,:fecha,:ubi,:capacidad_total,:capacidad_dis,:descripcion,:estatus,:horaini,:img)');
		$insert->bindValue('tema',$evento->getTema());
		$insert->bindValue('fecha',$evento->getFecha());
		$insert->bindValue('ubi',$evento->getUbi());
		$insert->bindValue('capacidad_total',$evento->getCapacidad_total());
        $insert->bindValue('capacidad_dis',$evento->getCapacidad_dis());
		$insert->bindValue('descripcion',$evento->getDescripcion());
        $insert->bindValue('estatus',$evento->getEstatus());
        $insert->bindValue('horaini',$evento->getHoraini());
        $insert->bindValue('img',$evento->getImg());
		$insert->execute();
	}
	
}