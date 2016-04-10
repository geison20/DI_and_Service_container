<?php 

require_once 'vendor/autoload.php';

use App\Conexao\ConexaoDNS; 
use App\Conexao\ConexaoPDR; 
use App\Clientes\Cliente; 
use Pimple\Container;

$container = new Container();

/**
 * declarando servicos
 */
$container['dotenv'] = function(){
	return new Dotenv\Dotenv(__DIR__);
};
$container['conexaoDNS'] = function(){
	return new ConexaoDNS(getenv("HOST"), getenv("DBNAME"), getenv("ROOTNAME"), getenv("PASSWORD"));
};
$container['conexaoPDR'] = function(){
	return new ConexaoPDR(getenv("HOST"), getenv("DBNAME"), getenv("ROOTNAME"), getenv("PASSWORD"));
};

$dotenv = $container['dotenv'];
$dotenv->load();


$connDNS = $container['conexaoDNS'];
$connPDR = $container['conexaoPDR'];

$clientes = new Cliente($connDNS);
var_dump($clientes);

// echo "<ul>";
// 	foreach ($clientes->getAllClients() as $client) 
// 	{
// 		// var_dump($client);
// 		echo "<li>". $client->name ."<li>";
// 	}
// echo "</ul>";



