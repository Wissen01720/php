<?php 
    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $NOMBRE = $row['NOMBRE'];
            $APELLIDO = $row['APELLIDO'];
            $METALPRECIOSO = $row['METALPRECIOSO'];
            $CEDULA = $row['CEDULA'];
            $ACTIVIDADECONOMICA = $row['ACTIVIDADECONOMICA'];
            $DIRECCION = $row['DIRECCION'];
            $TELEFONO = $row['TELEFONO'];
            $CORREO = $row['CORREO'];
            $MUNICIPIO = $row['MUNICIPIO'];
            $DEPARTAMENTO = $row['DEPARTAMENTO'];
            $CANTIDADDEMETALVENDIDO = $row['CANTIDADDEMETALVENDIDO'];
            $UNIDADDEMEDIDA = $row['UNIDADDEMEDIDA'];
            $MUNICIPIODEORIGEN = $row['MUNICIPIODEORIGEN'];
            $DEPARTAMENTODEORIGEN = $row['DEPARTAMENTODEORIGEN'];
            $TRIMESTRE = $row['TRIMESTRE'];
            $NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR = $row['NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR'];
            $NUMERODERUCOM = $row['NUMERODERUCOM'];
            $NUMERODEDOCUMENTODEIDENTIDAD = $row['NUMERODEDOCUMENTODEIDENTIDAD'];
            $MUNICIPIO2 = $row['MUNICIPIO2'];
            $DEPARTAMENTO2 = $row['DEPARTAMENTO2'];
            $TIPODECUENTA = $row['TIPODECUENTA'];
            $BANCO = $row['BANCO'];
            $CUENTABANCARIA = $row['CUENTABANCARIA'];
            $ARENAS = $row['ARENAS'];
            $LEY = $row['LEY']; 
            $PIEDRASPRECIOSASYSEMIPRECIOSAS = $row['PIEDRASPRECIOSASYSEMIPRECIOSAS'];
            $GRAVASDERIO = $row['GRAVASDERIO'];
            $ARCILLAS = $row['ARCILLAS'];
            $order_total_before_tax = $row['order_total_before_tax'];
            $order_total_tax = $row['order_total_tax'];
            $order_tax_per = $row['order_tax_per']; 
            $order_total_after_tax = $row['order_total_after_tax']; 
            $order_amount_paid = $row['order_amount_paid']; 
            $order_total_amount_due = $row['order_total_amount_due']; 
            $note = $row['note'];

        }
    }

    if(isset($_POST['update'])) {
        $id = $_GET['id'];
        $NOMBRE = $_POST['NOMBRE'];
        $APELLIDO = $_POST['APELLIDO'];
        $METALPRECIOSO = $_POST['METALPRECIOSO'];
        $CEDULA = $_POST['CEDULA'];
        $ACTIVIDADECONOMICA = $_POST['ACTIVIDADECONOMICA'];
        $DIRECCION = $_POST['DIRECCION'];
        $TELEFONO = $_POST['TELEFONO'];
        $CORREO = $_POST['CORREO'];
        $MUNICIPIO = $_POST['MUNICIPIO'];
        $DEPARTAMENTO = $_POST['DEPARTAMENTO'];
        $CANTIDADDEMETALVENDIDO = $_POST['CANTIDADDEMETALVENDIDO'];
        $UNIDADDEMEDIDA = $_POST['UNIDADDEMEDIDA'];
        $MUNICIPIODEORIGEN = $_POST['MUNICIPIODEORIGEN'];
        $DEPARTAMENTODEORIGEN = $_POST['DEPARTAMENTODEORIGEN'];
        $TRIMESTRE = $_POST['TRIMESTRE'];
        $NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR = $_POST['NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR'];
        $NUMERODERUCOM = $_POST['NUMERODERUCOM'];
        $NUMERODEDOCUMENTODEIDENTIDAD =$_POST['NUMERODEDOCUMENTODEIDENTIDAD'];
        $MUNICIPIO2 = $_POST['MUNICIPIO2'];
        $DEPARTAMENTO2 = $_POST['DEPARTAMENTO2'];
        $TIPODECUENTA = $_POST['TIPODECUENTA'];
        $BANCO = $_POST['BANCO'];
        $CUENTABANCARIA = $_POST['CUENTABANCARIA'];
        $ARENAS = $_POST['ARENAS'];
        $LEY = $_POST['LEY']; 
        $PIEDRASPRECIOSASYSEMIPRECIOSAS = $_POST['PIEDRASPRECIOSASYSEMIPRECIOSAS'];
        $GRAVASDERIO = $_POST['GRAVASDERIO'];
        $ARCILLAS = $_POST['ARCILLAS'];
        $order_total_before_tax = $_POST['order_total_before_tax'];
        $order_total_tax = $_POST['order_total_tax'];
        $order_tax_per = $_POST['order_tax_per']; 
        $order_total_after_tax = $_POST['order_total_after_tax']; 
        $order_amount_paid = $_POST['order_amount_paid']; 
        $order_total_amount_due = $_POST['order_total_amount_due']; 
        $note = $_POST['note'];

        $query = "UPDATE task set NOMBRE ='$NOMBRE', APELLIDO = '$APELLIDO', METALPRECIOSO ='$METALPRECIOSO', CEDULA ='$CEDULA',
        ACTIVIDADECONOMICA ='$ACTIVIDADECONOMICA', DIRECCION ='$DIRECCION', TELEFONO ='$TELEFONO', CORREO ='$CORREO',
        MUNICIPIO ='$MUNICIPIO', DEPARTAMENTO ='$DEPARTAMENTO', CANTIDADDEMETALVENDIDO ='$CANTIDADDEMETALVENDIDO', UNIDADDEMEDIDA ='$UNIDADDEMEDIDA', 
        MUNICIPIODEORIGEN ='$MUNICIPIODEORIGEN', DEPARTAMENTODEORIGEN ='$DEPARTAMENTODEORIGEN', TRIMESTRE ='$TRIMESTRE', 
        NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR ='$NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR', NUMERODERUCOM ='$NUMERODERUCOM', 
        NUMERODEDOCUMENTODEIDENTIDAD ='$NUMERODEDOCUMENTODEIDENTIDAD', MUNICIPIO2 ='$MUNICIPIO2', DEPARTAMENTO2='$DEPARTAMENTO2', TIPODECUENTA='$TIPODECUENTA', 
        BANCO='$BANCO', CUENTABANCARIA ='$CUENTABANCARIA', lEY ='$LEY', PIEDRASPRECIOSASYSEMIPRECIOSAS ='$PIEDRASPRECIOSASYSEMIPRECIOSAS', GRAVASDERIO ='$GRAVASDERIO' 
        ARCILLAS ='$ARCILLAS', order_total_before_tax ='$order_total_before_tax', order_total_tax ='$order_total_tax', order_tax_per ='$order_tax_per' 
        order_total_after_tax ='$order_total_after_tax', order_amount_paid='$order_amount_paid', order_total_amount_due ='$order_total_amount_due' 
        note ='$note' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'warning';
        header("location: index.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4 auto">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <br>
                    <h6>DATOS DEL DECLARANTE</h6><br>
                    <div class="from-group">
                        <input type="text" name="NOMBRE" value="<?php echo $NOMBRE; ?>" class="form-control" placeholder="Nombre" autofocus>
                    </div>
                    <div class="From group">
                        <input type="text" name="APELLIDO" value="<?php echo $APELLIDO; ?>" class="form-control" placeholder="Apellido" >
                    </div>
                    <div class="From group">
                        <input type="text" name="CEDULA" value="<?php echo $CEDULA; ?>" class="form-control" placeholder="Cedula" >
                    </div>
                    <div class="From group">
                        <input type="text" name="ACTIVIDADECONOMICA" value="<?php echo $ACTIVIDADECONOMICA; ?>" class="form-control" placeholder="Actividad Economica" >
                    </div>
                    <div class="From group">
                        <input type="text" name="DIRECCION" value="<?php echo $DIRECCION; ?>" class="form-control" placeholder="Dirección" >
                    </div>
                    <div class="From group">
                        <input type="text" name="TELEFONO" value="<?php echo $TELEFONO; ?>" class="form-control" placeholder="Teléfono" >
                    </div>
                    <div class="From group">
                        <input type="text" name="CORREO" value="<?php echo $CORREO; ?>" class="form-control" placeholder="Correo" >
                    </div>
                    <div class="From group">
                        <div class="form-group">
                            <input type="text" name="DEPARTAMENTO" id="DEPARTAMENTO" value="<?php echo $DEPARTAMENTO; ?>" class="form-control" placeholder="DEPARTAMENTO">
                        </div>
                    </div>
                    <div class="From group">
                        <input type="text" name="MUNICIPIO" value="<?php echo $MUNICIPIO; ?>" class="form-control" placeholder="Municipio" >
                    </div>
                    <br>
                    <h6>DATOS DEL MINERAL</h6><br>
                    <div class="from-group">
                        <input type="text" name="METALPRECIOSO" rows="3" class="form-control" placeholder="Metal Precioso" value="<?php echo $METALPRECIOSO; ?>">
                    </div>            
                    <div class="From group">
                        <input type="text" name="CANTIDADDEMETALVENDIDO" value="<?php echo $CANTIDADDEMETALVENDIDO; ?>" class="form-control" placeholder="Type CANTIDAD DE METAL VENDIDO" >
                    </div>
                    <div class="From group">
                    <div class="form-group">
                            <input type="text" name="UNIDADDEMEDIDA" id="UNIDADDEMEDIDA" value="<?php echo $UNIDADDEMEDIDA; ?>" class="form-control" placeholder="UNIDAD DE MEDIDA">
                        </div>
                    </div>
                    <div class="From group">
                    <div class="form-group">
                            <input type="text" name="DEPARTAMENTODEORIGEN" id="DEPARTAMENTODEORIGEN" value="<?php echo $DEPARTAMENTODEORIGEN; ?>" class="form-control" placeholder="DEPARTAMENTODEORIGEN">
                        </div>
                    </div>
                    <div class="From group">
                        <input type="text" name="MUNICIPIODEORIGEN" value="<?php echo $MUNICIPIODEORIGEN; ?>" class="form-control" placeholder="MUNICIPIO DE ORIGEN" >
                    </div>
                    <br>
                    <h6>PERIODO DE PRODUCCIÓN DECLARADO</h6><br>
                    <div class="From group">
                        <input type="number" name="TRIMESTRE" value="<?php echo $TRIMESTRE; ?>" id="TRIMESTRE" class="form-control" placeholder="TRIMESTRE">
                    </div>
                    <br>
                    <h6>INFORMACION DEL COMPRADOR DEL MINERAL</h6><br>
                    <div class="From group">
                        <input type="text" name="NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR" value="<?php echo $NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR; ?>" class="form-control" placeholder="Nombre o Razon Social del Comercializador o Consumidor " >
                    </div>
                    <div class="From group">
                        <input type="text" name="NUMERODERUCOM" value="<?php echo $NUMERODERUCOM; ?>" class="form-control" placeholder="Numero de Rucom" >
                    </div>
                    <br>
                    <h6>INFORMACION DEL COMPRADOR DEL MINERAL</h6><br>
                    <div class="From group">
                        <input type="text" name="NUMERODEDOCUMENTODEIDENTIDAD" value="<?php echo $NUMERODEDOCUMENTODEIDENTIDAD; ?>" class="form-control" placeholder="Numero de Documento de Identidad" >
                    </div>
                    <div class="From group">
                        <input type="text" name="DEPARTAMENTO2" value="<?php echo $DEPARTAMENTO2; ?>" id="DEPARTAMENTO2" class="form-control" placeholder="DEPARTAMENTO">
                    </div>
                    <div class="From group">
                        <input type="text" name="MUNICIPIO2" value="<?php echo $MUNICIPIO2; ?>" class="form-control" placeholder="Municipio " >
                    </div>
                    <br>
                    <h6>ADICIONALES</h6><br>
                    <th>
                    <div class="form-group">
                        <input type="text" name="TIPODECUENTA" id="TIPODECUENTA" value="<?php echo $TIPODECUENTA; ?>" class="form-control" placeholder="TIPO DE CUENTA">
                    </div>
                    <div class="form-group">
                        <input type="text" name="BANCO" id="BANCO" value="<?php echo $BANCO; ?>" class="form-control" placeholder="BANCO">
                    </div>
                    <div class="form-group">
                        <input type="text" name="CUENTABANCARIA" id="CUENTABANCARIA" value="<?php echo $CUENTABANCARIA; ?>" class="form-control" placeholder="CUENTA BANCARIA">
                    </div>
                    <div class="form-group">
                        <input type="text" name="ARENAS" id="ARENAS" value="<?php echo $ARENAS; ?>" class="form-control" placeholder="ARENAS">
                    </div>
                    <div class="form-group">
                        <input type="text" name="LEY" id="LEY" value="<?php echo $LEY; ?>" class="form-control" placeholder="LEY">
                    </div>
                    <div class="form-group">
                        <input type="text" name="PIEDRASPRECIOSASYSEMIPRECIOSAS" id="PIEDRASPRECIOSASYSEMIPRECIOSAS" value="<?php echo $PIEDRASPRECIOSASYSEMIPRECIOSAS; ?>" class="form-control" placeholder="PIEDRAS PRECIOSAS Y SEMIPRECIOSAS">
                    </div>
                    <div class="form-group">
                        <input type="text" name="GRAVASDERIO" id="GRAVASDERIO" value="<?php echo $GRAVASDERIO; ?>" class="form-control" placeholder="GRAVAS DE RIO">
                    </div>
                    <div class="form-group">
                        <input type="text" name="ARCILLAS" id="ARCILLAS" value="<?php echo $ARCILLAS; ?>" class="form-control" placeholder="ARCILLAS">
                    </div>
                    <div class="col-md-5 mx-auto " >
                        <form action="index.php" method="POST" >
                            <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar" >
                        </form>
                    </div>
                </form>
                <div class="vstack gap-2 col-md-5 mx-auto " >
                    <form action="index.php" method="POST">
                        <input type="submit" class="btn btn-danger btn-block" name="behind" value="Atras" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>