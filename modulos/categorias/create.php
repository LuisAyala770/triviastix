<?php
if (isset($_POST['guardar'])) {
  $categoria=$_POST['categoria'];
  $cargarimagen=($_FILES['imagen']['tmp_name']);//Carga archivo
  $imagen=fopen($cargarimagen, 'rb');//leer el archivo como binario

  $insertar=$conexion->prepare("INSERT INTO categorias(categoria,imagen) VALUES (:categoria,:imagen)");
  $insertar->bindParam(':categoria', $categoria, PDO::PARAM_STR);
  $insertar->bindParam(':imagen', $imagen, PDO::PARAM_LOB);
  $insertar->execute();

  if ($insertar) {
    $mensaje="Bien";
    header("location:index.php");
  }else {
    $mensaje="mal";
  }
}
?>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACREGAR Categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <label for="my_input">Categoria</label>
        <input id="my_input" type="text" class="form-control" name="categoria" placeholder="Ingresa Categoría">

        <label for="my_input">Imagen</label>
        <input id="my-imput" type="file" name="imagen">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>