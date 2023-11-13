<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtapellido"]) || empty($_POST["txtedad"]) || empty($_POST["txttelefono"]) || empty($_POST["txtdireccion"]) || empty($_POST["txtemail"]) || empty($_POST["txtrfc"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtapellido"];
    $edad = $_POST["txtedad"];
    $telefono = $_POST["txttelefono"];
    $direccion = $_POST["txtdireccion"];
    $email = $_POST["txtemail"];
    $rfc = $_POST["txtrfc"];

    $sentencia = $bd->prepare("INSERT INTO empleado(nombre,apellido,edad,telefono,direccion,email,rfc) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$edad,$telefono,$direccion,$email,$rfc]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
   
?>