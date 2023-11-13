<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtapellido'];
    $edad = $_POST['txtedad'];
    $telefono = $_POST['txttelefono'];
    $direccion = $_POST['txtdireccion'];
    $email = $_POST['txtemail'];
    $rfc = $_POST['txtrfc'];
    

    $sentencia = $bd->prepare("UPDATE empleado SET nombre = ?, apellido = ?, edad = ?, telefono= ?, direccion = ?, email = ?, rfc = ?  where id = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido, $edad, $telefono, $direccion, $email, $rfc, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>