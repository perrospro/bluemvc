<?php
class reservaNormal
{
	private $id;
	private $fecha;
	private $hora;
	private $cliente;
    private $sucursal;
    private $totalhoras;
    private $lugares;


	function __construct($id, $fecha, $hora, $cliente , $sucursal , $totalhoras , $lugares)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setHora($hora);
		$this->setCliente($cliente);	
        $this->setSucursal($sucursal);
		$this->setTotalhoras($totalhoras);
		$this->setLugares($lugares);		
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}
    public function getHora(){
		return $this->hora;
	}

	public function setHora($hora){
		$this->hora = $hora;
	}

	public function getCliente(){
		return $this->cliente;
	}

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function getSucursal(){
		return $this->sucursal;
	}

	public function setSucursal($sucursal){
		$this->sucursal = $sucursal;
	}

	public function getTotalhoras(){
		return $this->totalhoras;
	}
	public function setTotalhoras($totalhoras){
		$this->totalhoras = $totalhoras;
		}

        public function getLugares(){
            return $this->lugares;
        }
        public function setLugares($lugares){
            $this->lugares = $lugares;
            }

			public static function clientes(){
				$db=Db::getConnect();
				$listaClientes=[];
		
				$select=$db->query('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, reconpensa FROM usuario WHERE  estatus=1');
		
				foreach($select->fetchAll() as $cliente){
					$listaClientes[]=new persona($cliente['idusuario'],$cliente['nombre'],$cliente['correo'],$cliente['usuario'],$cliente['clave'],$cliente['rol'] ,$cliente['estatus'],$cliente['telefono'],$cliente['reconpensa']);
				}
				return $listaClientes;
			}
	
		


		public static function allReservasN(){
            $db=Db::getConnect();
            $listaReservasN=[];
    
            $select=$db->query('SELECT reservanormal.id,fecha,hora,usuario as cliente ,sucursal.nombre as sucursal ,totalhora,lugares FROM reservanormal , usuario , sucursal where usuario.idusuario = reservanormal.cliente AND sucursal.id = reservanormal.sucursal');
    
            foreach($select->fetchAll() as $reservaN){
                $listaReservasN[]= new reservaNormal($reservaN['id'],$reservaN['fecha'],$reservaN['hora'],$reservaN['cliente'],$reservaN['sucursal'] ,$reservaN['totalhora'],$reservaN['lugares']);
        }
        return $listaReservasN;
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



    public static function searchByIdReservaN($id){
		$db=Db::getConnect();
		
		$select=$db->prepare('SELECT reservanormal.id,fecha,hora,usuario as cliente ,sucursal.nombre as sucursal ,totalhora,lugares FROM reservanormal , usuario , sucursal where usuario.idusuario = reservanormal.cliente AND sucursal.id = reservanormal.sucursal And reservanormal.id =:id');
		$select->bindValue('id',$id);
		$select->execute();

		$reservaDb=$select->fetch();
		$reserva = new reservaNormal($reservaDb['id'],$reservaDb['fecha'],$reservaDb['hora'],$reservaDb['cliente'],$reservaDb['sucursal'],$reservaDb['totalhora'],$reservaDb['lugares']);
		return $reserva;

	}
    public static function searchBynombreCliente($cliente){
		$db=Db::getConnect();
		$listaReservasN=[];
		$select=$db->prepare('SELECT reservanormal.id,fecha,hora,usuario as cliente ,sucursal.nombre as sucursal ,totalhora,lugares FROM reservanormal , usuario , sucursal where usuario.idusuario = reservanormal.cliente AND sucursal.id = reservanormal.sucursal AND cliente =:cliente');
		$select->bindValue('cliente',$cliente);
		$select->execute();
	

		foreach($select->fetchAll() as $reservaDb){
			$listaReservasN = new reservaNormal($reservaDb['id'],$reservaDb['fecha'],$reservaDb['hora'],$reservaDb['cliente'],$reservaDb['sucursal'],$reservaDb['totalhora'],$reservaDb['lugares']);
		}
		
			return $listaReservasN;
	}

    public static function updateReservaN($sucursal){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE reservanormal SET  fecha=:fecha,hora=:hora,sucursal=:sucursal,totalhora=:totalhora, lugares=:lugares WHERE id=:id');
		$update->bindValue('fecha',$sucursal->getFecha());
		$update->bindValue('hora',$sucursal->getHora());
		$update->bindValue('sucursal',$sucursal->getSucursal());
		$update->bindValue('totalhora',$sucursal->getTotalhoras());
		$update->bindValue('lugares',$sucursal->getLugares());
        $update->bindValue('id',$sucursal->getId());
		$update->execute();
	}
	public static function deleteReservaN($id){
		$db=Db::getConnect();
		$delete=$db->prepare(' DELETE FROM reservanormal WHERE id=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}

	public static function saveReservaN($reserva){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO reservanormal VALUES (null, :fecha,:hora,:cliente,:sucursal,:totalhora:lugares)');
		$insert->bindValue('fecha',$reserva->getFecha());
		$insert->bindValue('hora',$reserva->getHora());
		$insert->bindValue('cliente',$reserva->getCliente());
		$insert->bindValue('sucursal',$reserva->getSucursal());
		$insert->bindValue('totalhora',$reserva->getTotalhoras());
		$insert->bindValue('lugares',$reserva->getLugares());
		$insert->execute();
	}
	public static function searchByIdReservaUsuarioN($cliente){
		$db=Db::getConnect();
		$listaReservasN=[];
		$select=$db->prepare('SELECT reservanormal.id,fecha,hora,usuario as cliente ,sucursal.nombre as sucursal ,totalhora,lugares FROM reservanormal , usuario , sucursal where usuario.idusuario = reservanormal.cliente AND sucursal.id = reservanormal.sucursal AND cliente=:cliente');
		$select->bindValue('cliente',$cliente);
		$select->execute();

		foreach($select->fetchAll() as $reserva){
			$listaReservasN[]=new reservaNormal($reserva['id'],$reserva['fecha'],$reserva['hora'],$reserva['cliente'],$reserva['sucursal'],$reserva['totalhora'],$reserva['lugares']);
		}
			//var_dump($alumno);
		//die();
		return $listaReservasN;

	}
	
}