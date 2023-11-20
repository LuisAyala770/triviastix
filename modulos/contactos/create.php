<?php 
if($_POST){
    $pregunta=(isset($_POST['pregunta'])?$_POST['pregunta']:"");
    $correcta=(isset($_POST['correcta'])?$_POST['correcta']:"");
    $prim_inco=(isset($_POST['prim_inco'])?$_POST['prim_inco']:"");
    $segu_inco=(isset($_POST['segu_inco'])?$_POST['segu_inco']:"");
    $terce_inco=(isset($_POST['terce_inco'])?$_POST['terce_inco']:"");


    $stm=$conexion->prepare("INSERT INTO contactos(id,pregunta,correcta,prim_inco,segu_inco,terce_inco)
    VALUES(null,:pregunta,:correcta,:prim_inco,:segu_inco,:terce_inco)");
    $stm->bindParam(":pregunta",$pregunta);
    $stm->bindParam(":correcta",$correcta);
    $stm->bindParam(":prim_inco",$prim_inco);
    $stm->bindParam(":segu_inco",$segu_inco);
    $stm->bindParam(":terce_inco",$terce_inco);
    $stm->execute();
    header("location:index.php");
}

?>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACREGAR Pregunta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">pregunta</label>
        <input type="text" class="form-control" name="pregunta" value="" placeholder="Ingresa pregunta">

        <label for="">correcta</label>
        <input type="text" class="form-control" name="correcta" value="" placeholder="Ingresa correcta">

        <label for="">1° Incorrecta</label>
        <input type="text" class="form-control" name="prim_inco" value="" placeholder="Ingresa Télefono">

        <label for="">2° Incorrecta</label>
        <input type="text" class="form-control" name="segu_inco" value="" placeholder="Ingresa Télefono">

        <label for="">3° Incorrecta</label>
        <input type="text" class="form-control" name="terce_inco" value="" placeholder="Ingresa Télefono">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>