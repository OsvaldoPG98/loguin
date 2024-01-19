<?php
    require 'conexion.php';

    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $clave = $_POST['contrasena'];
    $clave2 = $_POST['contrasena2'];

    $clave = hash('sha512', $clave);
    $clave2 = hash('sha512', $clave2);
    
    if($clave != $clave2){
        echo "<script>alert('Las contraseñas no coinciden');
                        window.location='registro.php';</script>";
    }else{
        $verificar = $mysqli->query("SELECT * FROM loguin WHERE usuario = '$usuario'");

        if($verificar->num_rows == 1){
            echo "<script>alert('Este usuario ya existe'); 
				window.location='registro.php';</script>";
        }else{
            $registro = $mysqli->query("INSERT INTO loguin (correo, usuario, clave) VALUES('$correo', '$usuario', '$clave')");
            if($registro){
                echo "<script>alert('Registro exitoso'); 
					window.location='loguinVista.php';</script>";
            }else{
                echo "<script>alert('Error al registrar los datos'); 
					window.location='registro.php';</script>";
            }
        }

    }
    mysqli_close($mysqli);
?>