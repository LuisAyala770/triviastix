<?php
include("../../conexion.php");
$stm=$conexion->prepare("SELECT * FROM contactos");
$stm->execute();
$contactos=$stm->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("DELETE FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    header("location:index.php");
}

?>

<?php include("../../template/header.php"); ?>
<title>BANCO DE PREGUNTAS</title>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
  Nuevo
</button>

<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Pregunta</th>
                <th scope="col">Respuesta Correcta</th> <!--telefono-->
                <th scope="col">1° Pregunta Incorrecto</th>
                <th scope="col">2° Pregunta Incorrecto</th>
                <th scope="col">3° Pregunta Incorrecto</th>            
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contactos as $contacto) {?>
            <tr class="">
                <td scope="row"><?php echo $contacto['id'];?></td>
                <td><?php echo $contacto['pregunta'];?></td>
                <td><?php echo $contacto['correcta'];?></td>
                <td><?php echo $contacto['prim_inco'];?></td>
                <td><?php echo $contacto['segu_inco'];?></td>
                <td><?php echo $contacto['terce_inco'];?></td>
                <td>
                <a href="edit.php?id=<?php echo $contacto['id'];?>" class="btn btn-success">Editar</a>
                    <a href="index.php?id=<?php echo $contacto['id'];?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("create.php"); ?>
<?php include("../../template/footer.php"); ?>