<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("select * from empleado where id = ?;");
    $sentencia->execute([$id]);
    $empleado = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($empleado);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $empleado->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">apellido: </label>
                        <input type="text" class="form-control" name="txtapellido" autofocus required
                        value="<?php echo $empleado->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $empleado->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">telefono: </label>
                        <input type="text" class="form-control" name="txttelefono" autofocus required
                        value="<?php echo $empleado->telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">direccion: </label>
                        <input type="text" class="form-control" name="txtdireccion" autofocus required
                        value="<?php echo $empleado->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">email: </label>
                        <input type="text" class="form-control" name="txtemail" autofocus required
                        value="<?php echo $empleado->email; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">rfc: </label>
                        <input type="text" class="form-control" name="txtrfc" autofocus required
                        value="<?php echo $empleado->rfc; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $empleado->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>