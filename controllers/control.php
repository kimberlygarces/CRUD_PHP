<?php

//IMPORTANDO MODELOS
include_once('./models/formulario.php');

//IMPORTANDO DATOS
include_once('./datos/formulario.php');


class Control
{

  public $MODEL;

  public function __construct()
  {
    $this->MODEL = new medicamento(); 
  }

  //VISTA POR DEFECTO
  public function index()
  {
    include_once('views/home.php');
  }

  public function lista()
  {
    include_once('views/medicamentos/lista.php');
  }


  public function listarCalendario()
  {
     $data= $this->MODEL->listCalendar();
    
    /* $array = array(

     ['id' => "ejemplo", 'title' => "ejemplo", 'start' => "2022-02-11"],
     ['id' => "ejemplo", 'title' => "ejemplo2", 'start' => "2022-02-01"]

    ); */
    echo json_encode($data, JSON_UNESCAPED_UNICODE);

    die();
  }


  public function calendario()
  {
    include_once('views/medicamentos/calendario.php');
  }


  public function nuevo()
  {
    include_once('views/medicamentos/save.php');
  }


  //GUARDAR ZAPATO
  public function guardar()
  {
    try {
      $directorio = "uploads/";
      $archivo = $directorio . basename($_FILES['file']['name']);
      $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

      //validando que es imagen true || o false
      $isImagen = getimagesize($_FILES["file"]["tmp_name"]);
      if ($isImagen && $_FILES['file']['name']) {
        $size = $_FILES["file"]["size"];
        if ($size > 3000000) {
          $msg = "la imagen debe ser menor a 3 megabytes";
          echo $this->MODEL->error($msg);
        } else {
          if ($tipoArchivo == 'jpg' || $tipoArchivo == 'jpeg' || $tipoArchivo == 'png') {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
              try {
                $alm = new FormularioClass();
                $alm->setFoto($archivo);    
                $alm->setName($_POST['txtname']);
                $alm->setLaboratorio($_POST['txtlaboratorio']);
                $alm->setCantidad($_POST['txtcantidad']);
                $alm->setReferencia($_POST['txtreferencia']);           
                $alm->setfecha_vencimiento($_POST['txtdate']);

                
                $resultado = $this->MODEL->registrarZapato($alm);
                if ($resultado) {
                  $msg = "Correctamente";
                  echo $this->MODEL->success($msg);
                  include_once('views/medicamentos/lista.php');
                }
              } catch (\Throwable $th) {
                throw $th;
              }
            } else {
              $msg = "No se guardo el archivo";
              echo $this->MODEL->error($msg);
              include_once('views/zapato/lista.php');
            }
          } else {
            $msg = "la imagen debe extencion Jpeg o jpg";
            echo $this->MODEL->error($msg);
            include_once('views/medicamentos/lista.php');
          }
        }
      } else {
        $msg = "el documento no es una imagen";
        echo $this->MODEL->error($msg);
        include_once('views/medicamentos/lista.php');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function editar()
  {
    try {
      $alm = new FormularioClass();
      $alm->setIdzapato($_REQUEST['id']);
      $dataMedicamento = $this->MODEL->editMedicamento($alm);
      include_once('views/medicamentos/update.php');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function updateMedicamento()
  {
    try {
      $archivo     =  basename($_FILES['file']['name']);
      $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

      if ($archivo == '') {
        $alm = new FormularioClass();
        $alm->setIdzapato($_POST['txtid']);
        $dataMedicamento = $this->MODEL->editMedicamento($alm);
        $alm->setFoto($dataMedicamento->foto);
        $alm->setName($_POST['txtname']);
        $alm->setLaboratorio($_POST['txtlaboratorio']);
        $alm->setfecha_vencimiento($_POST['txtdate']);

        $alm->setCantidad($_POST['txtcantidad']);

 
        
        if ($this->MODEL->updateMedicamento($alm)) {
          $msg = "Se actualizo Correctamente";
          echo $this->MODEL->success($msg);
          include_once('views/medicamentos/lista.php');
          // echo $_POST['txtcantidad'];
        }
      } else {
        if ($tipoArchivo == 'jpg' || $tipoArchivo == 'jpeg' || $tipoArchivo == 'png') {
          $directorio = "uploads/";
          $archivo = $directorio . basename($_FILES['file']['name']);
          if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
            try {
              $alm = new FormularioClass(); //INSTANCIA DE MI CLASE Zapato Class

              $alm->setIdzapato($_POST['txtid']);
              $dataMedicamento = $this->MODEL->editMedicamento($alm);
              $alm->setFoto($archivo);
              $alm->setName($_POST['txtname']);
              $alm->setLaboratorio($_POST['txtlaboratorio']);
              $alm->setfecha_vencimiento($_POST['txtdate']);
              $alm->setCantidad($_POST['txtcantidad']);

          

              $resultado = $this->MODEL->updateMedicamento($alm);
              if ($resultado) {
                unlink($dataMedicamento->foto);
                $msg = "Se actualizo Correctamente";
                echo $this->MODEL->success($msg);
            
                include_once('views/medicamentos/lista.php');
              } else {
                $msg = "InCorrectamente";
                echo $this->MODEL->error($msg);
                include_once('views/medicamentos/lista.php');
              }
            } catch (\Throwable $th) {
              throw $th;
            }
          } else {
            $msg = "No se guardo el archivo";
            echo $this->MODEL->error($msg);
            include_once('views/medicamentos/lista.php');
          }
        } else {
          $msg = "la imagen debe extencion Jpeg o jpg";
          echo $this->MODEL->error($msg);
          include_once('views/medicamentos/lista.php');
        }
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function eliminar()
  {
    try {
      $alm = new FormularioClass();
      $alm->setIdzapato($_REQUEST['id']);
      $dataMedicamento = $this->MODEL->editMedicamento($alm);
      if (unlink($dataMedicamento->foto)) {
        $resultado = $this->MODEL->deleteZapato($alm);
        if ($resultado) {
          $msg = "Eliminado Correctamente";
          echo $this->MODEL->success($msg);
          include_once('views/medicamentos/lista.php');
        }
      } else {
        $msg = "Archivo No Eliminado.....";
        echo $this->MODEL->error($msg);
        include_once('views/medicamentos/lista.php');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
