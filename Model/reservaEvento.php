<?php
class reservaEvento
{
	private $idreserva;
	private $cliente;
	private $evento;
	private $boletos;


	function __construct($idreserva, $cliente, $evento, $boletos)
	{
		$this->setIdreserva($idreserva);
		$this->setCliente($cliente);
		$this->setEvento($evento);
		$this->setBoletos($boletos);		
	}

	public function getIdreserva(){
		return $this->idreserva;
	}

	public function setIdreserva($idreserva){
		$this->idreserva = $idreserva;
	}

	public function getCliente(){
		return $this->cliente;
	}

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function getEvento(){
		return $this->evento;
	}

	public function setEvento($evento){
		$this->evento = $evento;
	}

	public function getBoletos(){
		return $this->boletos;
	}
	public function setBoletos($boletos){
		$this->boletos = $boletos;
		}

		public static function allEventosR(){
            $db=Db::getConnect();
            $listaEventos=[];
    
            $select=$db->query('SELECT idevento ,tema,fecha,sucursal.nombre as ubi,capacidad_total,capacidad_dis,descripcion,estatus,horaini,img  FROM evento,sucursal WHERE sucursal.id = evento.ubi AND estatus = 1');
    
            foreach($select->fetchAll() as $evento){
                $listaEventos[]= new evento($evento['idevento'],$evento['tema'],$evento['fecha'],$evento['ubi'],$evento['capacidad_total'] ,$evento['capacidad_dis'],$evento['descripcion'],$evento['estatus'],$evento['horaini'],$evento['img']);
        }
        return $listaEventos;
    }


        public static function allreservasE(){
            $db=Db::getConnect();
            $listaReservasE=[];
    
            $select=$db->query('SELECT idreserva,usuario.usuario as cliente,evento.tema as evento,boletos FROM reservaevento , usuario , evento WHERE usuario.idusuario = reservaevento.cliente and evento.idevento = reservaevento.evento');
    
            foreach($select->fetchAll() as $reserva){
                $listaReservasE[]=new reservaEvento($reserva['idreserva'],$reserva['cliente'],$reserva['evento'],$reserva['boletos']);
        }
        return $listaReservasE;
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
    public static function searchBynombreEvento($evento){
		
		$db=Db::getConnect();
		$listaReservasE=[];
		$select=$db->prepare('SELECT idreserva,usuario.usuario as cliente,evento.tema as evento,boletos FROM reservaevento , usuario , evento WHERE usuario.idusuario = reservaevento.cliente and reservaevento.evento = evento.idevento AND reservaevento.evento=:evento' );
		$select->bindValue('evento',$evento);
		$select->execute();
	

		foreach($select->fetchAll() as $reserva){
			$listaReservasE[]=new reservaEvento($reserva['idreserva'],$reserva['cliente'],$reserva['evento'],$reserva['boletos']);
		}
		return $listaReservasE;

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
	public static function deleteReservaE($idreserva){
		$db=Db::getConnect();
		$delete=$db->prepare(' DELETE FROM reservaevento WHERE idreserva=:idreserva ');
		$delete->bindValue('idreserva',$idreserva);
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