<?php
include("../../conexion.php");
$stm=$conexion->prepare("SELECT * FROM categorias");
$stm->execute();
$categorias=$stm->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("DELETE FROM categorias WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    header("location:index.php");
}

?>

<?php include("../../template/header.php"); ?>
<title>Categorias</title>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">Nuevo</button>

<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Categorias</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria) {?>
                <tr>
                    <td scope="col"><?php echo $categoria['id'];?></td>
                    <td><?php echo $categoria['categoria'];?></td>
                    <td><?php echo $categoria['imagen'];?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $categoria['id'];?>" class="btn btn-success">Editar</a>
                        <a href="index.php?id=<?php echo $categoria['id'];?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
           <?php } ?>
        </tbody>

    </table>

</div>

<?php include("create.php");?>
<?php include("../../template/footer.php");?>