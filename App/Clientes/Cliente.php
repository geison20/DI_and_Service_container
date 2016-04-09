<?php 

namespace App\Clientes;

use App\Interfaces\DatabaseInterface;

class Cliente {
	
	private $connect;

	public  $clientes;

	public function __construct(DatabaseInterface $conectar)
	{
		// var_dump($conectar->conn());die;

		$this->connect = $conectar->conn();

		$rs = $this->connect->query('select * from users');
		$rs->execute();
		$this->clientes = $rs->fetchAll(\PDO::FETCH_OBJ);
	}

	public function getAllClients()
	{
		
		return $this->clientes;
	}
}