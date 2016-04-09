<?php 

namespace App\Conexao;

use App\Interfaces\DatabaseInterface;

class ConexaoPDR implements DatabaseInterface
{
	private $host;
	private $dbname;
	private $root;
	private $password;


	function __construct($host, $dbname, $root, $pass)
	{
		$this->host 	= $host;
		$this->dbname 	= $dbname;
		$this->root 	= $root;
		$this->password = $pass;
	}

	public function conn()
	{
		return new \PDO("mysql:host=".$this->host.";dbname=".$this->dbname."", $this->root, $this->password);
	}
}