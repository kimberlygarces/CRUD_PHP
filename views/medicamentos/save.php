<?php include_once('views/templates/header.php'); ?>

<?php include_once('views/templates/nav.php'); ?>

<section class="">
    <div class="container">
        <div class="my-5">
            <h2 class="text-center">Registro de medicamentos</h2>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                <div><a class="btn-cliente" href="?c=lista">Registros</a></div>
                <div class="card">
                    <div class="card-body">
                        <form action="?c=guardar" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" class="form-control" name="file">
                                        <!-- SELECCIONAR FOTO DEL MEDICAMENTO -->
                                    </div>

                                    <div class="form-group">
                                        <label for="">Referencia</label>
                                        <input type="text" class="form-control" placeholder="Ingresar la referencia" name="txtreferencia">
                                </div>

                                    <div class="form-group">
                                        <label for="">Nombre del producto</label>
                                        <input type="text" class="form-control" placeholder="Ingresar el nombre del producto" name="txtname">
                                    </div>

                                  
                                   
                                    </div>


                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="">laboratorio</label>
                                        <input type="text" class="form-control" placeholder="Ingresar el nombre del laboratorio" name="txtlaboratorio">
                                    </div>


                                <div class="form-group">
                                        <label for="">Cantidad</label>
                                        <input type="number" class="form-control" placeholder="Ingresar cantidad recibida" name="txtcantidad">
                                </div>

                                <div class="form-group">
                                        <label for="">fecha de vencimiento</label>
                                        <input type="date" class="form-control" name="txtdate">
                                    </div>
                                </div>
                                </div>
                                  

                                    <div class="mt-2">
                                        <input type="submit" class="btn btn-success my-3" name="btnregistrar" value="Registrar Producto">
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