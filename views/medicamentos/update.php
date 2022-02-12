<?php include_once('views/templates/header.php'); ?>

<?php include_once('views/templates/nav.php'); ?>

<section class="">
    <div class="container">
        <div class="my-5">
            <h2 class="text-center">Editar Producto</h2>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                <div><a class="btn-cliente" href="?c=index">Registros</a></div>
                <div class="card">
                    <div class="card-body">
                        <form action="?c=updateMedicamento" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="hidden" value="<?php echo $dataMedicamento->id; ?>" name="txtid">
                                        <input type="file" class="form-control" name="file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Referencia</label>
                                        <input type="text" class="form-control" value="<?php echo $dataMedicamento->referecia; ?>" placeholder="cantidad" name="txtreferencia" readonly>
                                    </div>
                               

                                    <div class="form-group">
                                        <label for="">Laboratorio</label>
                                        <input type="text" class="form-control" value="<?php echo $dataMedicamento->laboratorio; ?>" placeholder="Laboratorio" name="txtlaboratorio" readonly>
                                    </div>

                            
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control" value="<?php echo $dataMedicamento->name_producto; ?>" placeholder="Nombre" name="txtname"readonly>
                                    </div>
                                <div class="form-group">
                                        <label for="">Cantidad</label>
                                        <input type="text" class="form-control" value="<?php echo $dataMedicamento->cantidad; ?>" placeholder="cantidad" name="txtcantidad">
                                    </div>
                                    <?php 
                                    $fechaActual = date('Y-m-d');

                                    if($dataMedicamento->fecha_vencimiento == $fechaActual){
                                    echo "Vence hoy";
                                    ?>
                                    <div class="form-group">
                                        <label for="">Fecha de Vencimiento</label>
                                        <input type="date" class="form-control" value="<?php echo $dataMedicamento->fecha_vencimiento; ?>" placeholder="" name="txtdate">
                                    </div>
                                    <?php 
                                       
                                    }else{
                                        if($dataMedicamento->fecha_vencimiento < $fechaActual){
                                            echo "Ya vencio";
                                            ?>
                                            <div class="form-group">
                                                <label for="">Fecha de Vencimiento</label>
                                                <input type="date" class="form-control" value="<?php echo $dataMedicamento->fecha_vencimiento; ?>" placeholder="" name="txtdate" readonly>
                                            </div>
                                            <?php 
                                        }
                                        else{
                                            echo "Puede editar";
                                            ?>
                                            <div class="form-group">
                                                <label for="">Fecha de Vencimiento</label>
                                                <input type="date" class="form-control" value="<?php echo $dataMedicamento->fecha_vencimiento; ?>" placeholder="" name="txtdate">
                                            </div>
                                            <?php 

    
                                        }
                                    }
                                    
                                  
                                    ?>
                             


                                    <div class="mt-2">
                                        <input type="submit" class="btn btn-success my-3" name="btnregistrar" value="Editar Producto">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="">Imagen Actual</label>
                                            <img src="<?php echo $dataMedicamento->foto; ?>" class="imagen__update" alt="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('views/templates/footer.php'); ?>