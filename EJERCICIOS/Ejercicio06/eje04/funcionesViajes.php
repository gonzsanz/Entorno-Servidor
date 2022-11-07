<?php
//cookie que almacena el codigo del viaje asignado
function codigoViaje(){
    $codigo=random_int(1,100);
    $_COOKIE["codigoViaje"]=$codigo;
    setcookie("codigoViaje",$codigo,time()+3600);
}

//Session de nombre de cliente
function sesionNombre(){
    if(isset($_GET["nombre"])){
    $nombre=$_GET["nombre"];
    $nombre=trim($nombre);
    $nombre=htmlspecialchars($nombre);
    $nombre=stripslashes($nombre);
    $_SESSION["nombre"]=$nombre;
}
}

function sesionApellidos(){
    //Session de apellidos
    if(isset($_GET["apellidos"])){
    $apellidos=$_GET["apellidos"];
    $apellidos=trim($apellidos);
    $apellidos=htmlspecialchars($apellidos);
    $apellidos=stripslashes($apellidos);
    $_SESSION["apellidos"]=$apellidos;
}
}

function cookieFidelidad(){
    //cookie de fidelidad de cliente
    if(isset($_GET["fidelidad"])){
    $fidelidad=$_GET["fidelidad"];
    $_COOKIE["fidelidad"]=$fidelidad;
    setcookie("fidelidad",$fidelidad,time()+3600);
    
    }
}
//Cookie de correo, limpieza y validación
function correo(){
    if(isset($_GET["correo"])){
        $correo=$_GET["correo"];
        $correo=trim($correo);
        $correo=strip_tags($correo);
        $correo=htmlspecialchars(($correo));
        if(filter_var($correo,FILTER_VALIDATE_EMAIL)){
            
            $_COOKIE["correo"]=$correo;
            setcookie("correo",$correo,time()+3600);
        }else{
            $_COOKIE["correo"]="Correo, no válido. Debe de escribir un formato de correo correcto";
            
            setcookie("correo",$correo,time()+3600);
            setcookie("correo",$correo,time()-3600);
            session_destroy();
            header("Refresh:2,url=agenciaViajes.php");
        }
    }
}

function cookieViajes(){
    //cookie de viajes reservados
    if(isset($_GET["viajes"])){
    $viajes=$_GET["viajes"];
    $viajesReservados=implode(",",$viajes);
    $_COOKIE["viajes"]=$viajesReservados;
    setcookie("viajes",$viajesReservados,time()+3600);
    
    }   
}
//cookie de newsletter
function newsletter(){
    if(isset($_GET["informacion"])){
        $informacion=$_GET["informacion"];
        $_COOKIE["informacion"]=$informacion;
        setcookie("informacion",$informacion,time()+3600);
    }
}
//session de sitios de interés
function sesionSitios(){
    if(isset($_GET["sitios"])){
        $sitios=$_GET["sitios"];
        $_SESSION["sitios"]=$sitios;
    }
}
sesionNombre();
sesionApellidos();
cookieFidelidad();
cookieViajes();
newsletter();
sesionSitios();
correo();
