<?php

//IMPORTAMOS LA CONEXION
include_once('./config/Conexion.php');

//OPCIONAL YA QUE TU CONTROLLADOR TIENE A LOS DATOS
include_once('./datos/formulario.php');

class medicamento
{

  public $PDO;

  public function __construct()
  {
    try {  //inializamos la clase conexion
      $this->PDO = new Conexion();
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function listarMedicamentos()
  {
    try {
      $query = "SELECT * FROM dbozapato";
      $stm   = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function listarCalendario()
  {
    try {
      $query = "SELECT * FROM dbozapato";
      $stm   = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function listCalendar()
  {
    try {
      $query = "SELECT COUNT(DISTINCT(id)) as title,created_at as start FROM dbozapato GROUP by created_at";
      $stm   = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function registrarZapato(FormularioClass $data)
  {
    try {
      $query = "INSERT INTO dbozapato(foto,name_producto,laboratorio,cantidad,fecha_vencimiento,referecia) VALUES(?,?,?,?,?,?)";
      $stm = $this->PDO->ConectarBD()->prepare($query)->execute(
        array(
          $data->getFoto(),
          $data->getName(),
          $data->getLaboratorio(),
          $data->getCantidad(),
          $data->getfecha_vencimiento(),
          $data->getReferecia()

        )
      );
      return $stm;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function updateMedicamento(FormularioClass $data)
  {
    try {
      $query = "UPDATE dbozapato SET foto=? , name_producto=? , laboratorio=?, fecha_vencimiento=?,
                    cantidad=? WHERE id=?";
      $stm = $this->PDO->ConectarBD()->prepare($query)->execute(
        array(
          $data->getFoto(),
          $data->getName(),
          $data->getLaboratorio(),
          $data->getfecha_vencimiento(),
          $data->getCantidad(),
          $data->getIdzapato()
        )
      );
      return $stm;
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function editMedicamento(FormularioClass $data)
  {
    try {
      $query = "SELECT * FROM dbozapato WHERE id= ?";
      $stm = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute(array($data->getIdzapato()));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function deleteZapato(FormularioClass $data)
  {
    try {
      $query = "DELETE FROM dbozapato WHERE id =?";
      $stm = $this->PDO->ConectarBD()->prepare($query)->execute(
        array($data->getIdzapato())
      );
      return $stm;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function success($message ="") {
    $resultado = '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Message!</strong> '.$message.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    echo $resultado;
  }

  public function error($message='') {
    $resultado = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Message!</strong> '.$message.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    echo $resultado;
  }
}
