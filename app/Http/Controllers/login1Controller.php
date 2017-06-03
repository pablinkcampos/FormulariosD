<?php
    /*error_reporting(E_ALL ^ E_DEPRECATED); //remove after update mysql to mysqli or pdo to fix this error
    $connect = mysql_connect('localhost','login_name', 'login_password');
    $queryStr = 'SELECT * FROM final_formularios_schema.usuario WHERE idusuario = 2';
    $query = mysql_query($queryStr);
    $resultado = mysql_fetch_row($query);
    mysql_close($connect);

    print_r($resultado);
*/
namespace FormulariosD\Http\Controllers;

use Illuminate\Http\Request;

class login1Controller extends Controller
{


 

    public function postCrearLogin(Request $req)
    {
		error_reporting(E_ALL ^ E_DEPRECATED); //remove after update mysql to mysqli or pdo to fix this error
		
    	$usernameTyped = $req->input('username');
    	$passwordTyped = $req->input('password');
    	//echo $usernameTyped,"::",$passwordTyped;
    	
    	$queryStr = 'SELECT * FROM final_formularios_schema.usuario WHERE rut = ';
    	$queryStr = $queryStr.$usernameTyped;
    	//echo $queryStr;
    	
    	$query = mysql_query($queryStr);
    	$resultado = mysql_fetch_row($query);
    	//Storing data form DB
    	$idUsuarioDB = $resultado[0];
        $usernameDB = $resultado[1];
    	$nombreUsuarioDB = $resultado[2];
        $passwordDB = $resultado[3];
    	//echo $usernameDB,"::",$passwordDB;
    	
        mysql_close($connect);
        
    	if(strcmp($usernameTyped,$usernameDB) ==0 && strcmp($passwordTyped,$passwordDB) == 0)
    	{
            session_start();
            //seding data from page 1
            $_SESSION['idUsuarioAuthenticated'] = $resultado;
            
            //receiving data from page 1 on page 2.
            //$idUsuarioDB = $_SESSION['idUsuarioAuthenticated'];
            //echo $idUsuarioDB,"<-- id usuario";
            return redirect()->intended('/dashboard');
    	}
    	else
    	{
    		echo "Login fallido.";
    	}
    }
}
