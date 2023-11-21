<?php
include("../../conexion.php");

if(isset($_GET['id'])){
    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("SELECT * FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    //$stm->bindParam(":txtid",$txtid);
    $stm->execute();
    //header("location:index.php");
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $pregunta=$registro['pregunta'];
    $correcta=$registro['correcta'];
    $prim_inco=$registro['prim_inco'];
    $segu_inco=$registro['segu_inco'];
    $terce_inco=$registro['terce_inco'];
}
if($_POST){
    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
    $pregunta=(isset($_POST['pregunta'])?$_POST['pregunta']:"");
    $correcta=(isset($_POST['correcta'])?$_POST['correcta']:"");
    $prim_inco=(isset($_POST['prim_inco'])?$_POST['prim_inco']:"");
    $segu_inco=(isset($_POST['segu_inco'])?$_POST['segu_inco']:"");
    $terce_inco=(isset($_POST['terce_inco'])?$_POST['terce_inco']:"");

    $stm=$conexion->prepare("UPDATE contactos SET pregunta=:pregunta,correcta=:correcta,prim_inco=:prim_inco,segu_inco=:segu_inco,terce_inco=:terce_inco WHERE id=:txtid");
    $stm->bindParam(":pregunta",$pregunta);
    $stm->bindParam(":correcta",$correcta);
    $stm->bindParam(":prim_inco",$prim_inco);
    $stm->bindParam(":segu_inco",$segu_inco);
    $stm->bindParam(":terce_inco",$terce_inco);
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();

    header("location:index.php");
}

?>

<?php include("../../template/header.php"); ?>

<form action="" method="post">
      <div class="modal-body">

        <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>">
        <label for="">Pregunta</label>
        <input type="text" class="form-control" name="pregunta" value="<?php echo $pregunta; ?>" placeholder="Ingresa Pregunta">

        <label for="">Correcta</label>
        <input type="text" class="form-control" name="correcta" value="<?php echo $correcta; ?>" placeholder="Ingresa Correcta">

        <label for="">1° Incorrecta</label>
        <input type="text" class="form-control" name="prim_inco" value="<?php echo $prim_inco; ?>" placeholder="Ingresa 1° Incorrecta">

        <label for="">2° Incorrecta</label>
        <input type="text" class="form-control" name="segu_inco" value="<?php echo $segu_inco; ?>" placeholder="Ingresa 2° Incorrecta">

        <label for="">3° Incorrecta</label>
        <input type="text" class="form-control" name="terce_inco" value="<?php echo $terce_inco; ?>" placeholder="Ingresa 3° Incorrecta">

      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>

<?php include("../../template/footer.php"); ?>