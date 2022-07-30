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

	public static function searchByIdReservaUsuario($cliente){
		$db=Db::getConnect();
		$listaReservasE=[];
		$select=$db->prepare('SELECT idreserva,usuario.usuario as cliente,evento.tema as evento,boletos FROM reservaevento , usuario , evento WHERE usuario.idusuario = reservaevento.cliente and evento.idevento = reservaevento.evento AND cliente=:cliente');
		$select->bindValue('cliente',$cliente);
		$select->execute();

		foreach($select->fetchAll() as $reserva){
			$listaReservasE[]=new reservaEvento($reserva['idreserva'],$reserva['cliente'],$reserva['evento'],$reserva['boletos']);
		}
			//var_dump($alumno);
		//die();
		return $listaReservasE;

	}

    public static function searchByIdReservaE($idreserva){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM reservaevento WHERE idreserva =:idreserva');
		$select->bindValue('idreserva',$idreserva);
		$select->execute();

		$reservaDb=$select->fetch();
		$reserva = new reservaEvento($reservaDb['idreserva'],$reservaDb['cliente'],$reservaDb['evento'],$reservaDb['boletos']);
		//var_dump($alumno);
		//die();
		return $reserva;

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

	public static function saveReservaE($reserva){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO reservaevento VALUES (null, :cliente,:evento,:boletos)');
		$insert->bindValue('cliente',$reserva->getCliente());
		$insert->bindValue('evento',$reserva->getEvento());
		$insert->bindValue('boletos',$reserva->getBoletos());
		$insert->execute();
	}

	public static function updateboletos($boletos,$idevento){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE evento SET capacidad_dis=:capacidad_dis WHERE idevento=:idevento');
		$update->bindValue('capacidad_dis',$boletos);
        $update->bindValue('idevento',$idevento);
		$update->execute();
	}
	
}