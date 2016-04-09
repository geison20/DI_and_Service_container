<?php 

require_once 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();




$connDNS = new App\Conexao\ConexaoDNS(getenv("HOST"), getenv("DBNAME"), getenv("ROOTNAME"), getenv("PASSWORD"));

$connPDR = new App\Conexao\ConexaoPDR(getenv("HOST"), getenv("DBNAME"), getenv("ROOTNAME"), getenv("PASSWORD"));

$clientes = new App\Clientes\Cliente($connPDR);

echo "<ul>";
	foreach ($clientes->getAllClients() as $client) 
	{
		// var_dump($client);
		echo "<li>". $client->name ."<li>";
	}
echo "</ul>";

