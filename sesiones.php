<?php
    require 'conexion.php';

    $usuario = $_POST['usuario'];
    $clave = $_POST['contrasena'];
    $clave = hash('sha512', $clave);

    $usuarios = $mysqli->query("SELECT usuario FROM loguin WHERE usuario = '$usuario' AND clave = '$clave'");

    if(mysqli_num_rows($usuarios) == 1){
        session_start();
        $_SESSION['usuario'] = $usuarios;
        header('Location: admin/indexadmi.php');
    }else{
        echo "<script>alert('Datos Incorrectos'); 
				window.location='loguinVista.php';</script>";
    }

    mysqli_close($mysqli);
?>