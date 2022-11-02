<?php include ("db.php") ?>
<?php include ("includes/header.php")?>
<link rel="stylesheet" href="css/Styles.css">
<section id="botones">
    <div class="card-body">
        <form action="index.php" method="POST">
            <input type="submit" class="btn btn-info" name="Atras" value="Atras" id="atras">
        </form>
    </div>
</section>
<?php    
$item_arr = array();
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task, factura_orden_producto WHERE order_id = id;";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $FECHA = $row['FECHA'];
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
            $item_name = $row['item_name'];
            $order_item_quantity = $row['order_item_quantity'];
            $order_item_price = $row['order_item_price'];
            $order_item_final_amount = $row['order_item_final_amount'];

        }
    }
    if(isset($_POST['update'])) {
        $id = $_GET['id'];
        $FECHA = $_POST['FECHA'];
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
        $item_name = $_POST['item_name'];
        $order_item_quantity = $_POST['order_item_quantity'];
        $order_item_price = $_POST['order_item_price'];
        $order_item_final_amount = $_POST['order_item_final_amount'];
 }?>

<div class="container" id="container">
        <table class="table table-border" id="table">
        <link rel="stylesheet" href="css/Styles.css" type="text/css" >
            <tr>
                <td><img src="imagenes/logo-anm_0.jpg" class="img-thumbnail" style="padding: 5px;width: 250px;"></td>
                <td colspan="4">DECLARACION DE PRODUCCIÓN MINEROS DE SUBSISTENCIA</td>
                <td colspan="2" bgcolor="#578E4D">No.Consecutivo</td>
                <td colspan=""></td>
            </tr>
            <tr>
                <th colspan="10" bgcolor="#80B077" >DATOS DEL DECLARANTE</th>
            </tr>
                <td rowspan="2" bgcolor="#578E4D" >NOMBRE</td>
                <td rowspan="2"><?php echo $NOMBRE ?></td>
                <td rowspan="2" bgcolor="#578E4D">APELLIDO</td>
                <td rowspan="2"><?php echo $APELLIDO ?></td>
                <td rowspan="2" bgcolor="#578E4D">C.C</td>
                <td rowspan="2"><?php echo $CEDULA?></td>
                <td bgcolor="#578E4D">RUT</td>
                <td></td>
            </tr>
            <tr>
                <td bgcolor="#578E4D">Actividad Económica</td>
                <td><?php echo $ACTIVIDADECONOMICA?></td>
            </tr>
            <tr>
                <td bgcolor="#578E4D">DIRECCION</td>
                <td colspan="2" bgcolor="#578E4D">TELEFONO</td>
                <td colspan="2" bgcolor="#578E4D">CORREO ELECTRONICO</td>
                <td colspan="2" bgcolor="#578E4D">MUNICIPIO</td>
                <td colspan="2" bgcolor="#578E4D">DEPARTAMENTO</td>
            </tr>

            <tr>
                <td><?php echo $DIRECCION?></td>
                <td colspan="2"><?php echo $TELEFONO?></td>
                <td colspan="2"><?php echo $CORREO?></td>
                <td colspan="2"><?php echo $MUNICIPIO?></td>
                <td colspan="2"><?php echo $DEPARTAMENTO?></td>
            </tr>
            <tr><th colspan="10" bgcolor="#80B077">DATOS DEL MINERAL</th></tr>
            <tr>
                <td bgcolor="#578E4D">Metales Precioso</td>
                <td colspan="2" bgcolor="#578E4D">Piedras Preciosas y Semipreciosas</td>
                <td colspan="2" bgcolor="#578E4D">Arenas</td>
                <td colspan="2" bgcolor="#578E4D">Gravas de rio</td>
                <td colspan="2" bgcolor="#578E4D">Arcilla</td>
            </tr>
            <tr>
                <td><?php echo $METALPRECIOSO?></td>
                <td colspan="2"><?php echo $PIEDRASPRECIOSASYSEMIPRECIOSAS?></td>
                <td colspan="2"><?php echo $ARENAS?></td>
                <td colspan="2"><?php echo $GRAVASDERIO?></td>
                <td colspan="2"><?php echo $ARCILLAS?></td>
            </tr>
            <tr>
                <td bgcolor="#578E4D">CANTIDAD DE MINERAL VENDIDO</td>
                <td><?php echo $CANTIDADDEMETALVENDIDO?></td>
                <td bgcolor="#578E4D">UNIDAD DE MEDIDA</td>
                <td><?php echo $UNIDADDEMEDIDA?></td>
                <td bgcolor="#578E4D">MUNICIPIO DE ORIGEN DEL MINERAL</td>
                <td><?php echo $MUNICIPIO2?></td>
                <td bgcolor="#578E4D">DEPTO. ORIGEN DEL MINERAL</td>
                <td><?php echo $DEPARTAMENTO2?></td>
            </tr>
            <tr><th colspan="10" bgcolor="#80B077">PERIODO DE PRODUCCION DECLARADO</th></tr>
            <tr>
                <td bgcolor="#578E4D">TRIMESTRE</td>
                <td><?php echo $TRIMESTRE?></td>
                <td bgcolor="#578E4D">Mes</td>
                <td colspan="2"><?php echo date("m")?></td>
                <td colspan="2" bgcolor="#578E4D">Año</td>
                <td colspan="2"><?php echo date("Y")?></td>
            </tr>
            <tr><th colspan="10" bgcolor="#80B077">INFORMACION DEL COMPRADOR DEL MINERAL</th></tr>
            <tr>
                <td bgcolor="#578E4D">NOMBRE O RAZON SOCIAL DEL COMERCIALIZADOR/CONSUMIDOR</td>
                <td colspan="2" bgcolor="#578E4D">NUMERO DE RUCOM</td>
                <td colspan="2" bgcolor="#578E4D">NUMERO DE DOCUMENTO IDENTIFICACION</td>
                <td colspan="2" bgcolor="#578E4D">MUNICIPIO</td>
                <td colspan="2" bgcolor="#578E4D">DEPARTAMENTO</td>
            </tr>
            <tr>
                <td><?php echo $NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR?></td>
                <td colspan="2"><?php echo $NUMERODERUCOM?></td>
                <td colspan="2"><?php echo $NUMERODEDOCUMENTODEIDENTIDAD?></td>
                <td colspan="2"><?php echo $MUNICIPIO?></td>
                <td colspan="2"><?php echo $DEPARTAMENTO?></td>
            <tr>
                <td bgcolor="#80B077">FIRMA DEL DECLARANTE (minero de subsistencia)</td>
                <td colspan="3"></td>
                <td colspan="3" bgcolor="#80B077">FECHA DE LA VENTA</td>
                <td colspan="3"><?php echo $FECHA?></td>
            </tr>
                
            <tr>
                <td colspan="10"><h5>Para la declaración de producción de minería de subsistencia, se deben tener en cuenta los volúmenes máximos establecidos en la Resolución 40103 del 9 de febrero de
                    2017 expedida por el Ministerio de Minas y Energía.</h5></td>
            </tr>
            <tr>
                <td colspan="10"><h5>Con la firma de la presente declaración de producción, el declarante manifiesta bajo gravedad de juramento que los datos consignados en el
                    presente formulario son veraces.</h5></td>
            </tr>
        </table>
</div>
<link rel="stylesheet" href="css/estilos.css" type="text/css" >
<div class="container" id="oculto-impresion">
        <table class="table" id="table" >
            <tr>
                <td colspan="2"></td>
                <td colspan="4">DOCUMENTO SOPORTE EN <br>
                    ADQUISICIONES EFECTUADAS A NO <br>
                    OBLIGADOS A FACTURARISTMINA-CHOCO</td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td><?php echo $FECHA?></td>
                <td>Nro.Q-</td>
                <td colspan="3"><?php echo $id?></td>
            </tr>
            <tr>
                <td>Proveedor</td>
                <td></td>
                <td>Teléfono</td>
                <td colspan="3"><?php echo $TELEFONO?></td>
            </tr>
            <tr>
                <td>C.C. y/o Nit</td>
                <td><?php echo $CEDULA?></td>
                <td>Dirección</td>
                <td colspan="3"><?php echo $DIRECCION?></td>
            </tr>
            <tr>
                <td>Tipo de cuenta</td>
                <td><?php echo $TIPODECUENTA?></td>
                <td>Cuenta Bancaria</td>
                <td><?php echo $CUENTABANCARIA?></td>
                <td>Banco</td>
                <td><?php echo $BANCO?></td>
            </tr>
            <tr>
                <th>CONCEPTO</th>
                <th>GRAMOS BRUTOS</th>
                <th>LEY</th>
                <th>VALOR POR GRAMO</th>
                <th colspan="2">VALOR TOTAL</th>
            </tr>
            <tfoot>
            <?php
                $sql_registe =mysqli_query($conn,"SELECT COUNT(*) as total_registro From task, factura_orden_producto WHERE item_name = METALPRECIOSO");      

                $query = mysqli_query($conn, "SELECT t.LEY, t.order_total_after_tax, f.item_name, f.order_item_quantity, f.order_item_price FROM task t, factura_orden_producto f WHERE order_id =id");
                $result = mysqli_num_rows($query);

                while ($data = mysqli_fetch_array($query)){?>
                <tr>
                    <td><?php echo $data['item_name']?></td>
                    <td><?php echo $data['order_item_quantity']?></td>
                    <td><?php echo $LEY?></td>
                    <td><?php echo $data['order_item_price'] ?></td>
                    <td colspan="2"><?php echo $data['order_total_after_tax']?></td>
                <tr>
            <?php 
                    }          
                ?>
            </tr>
            <tr>
                <td colspan="4">SUBTOTAL</td>
                <td colspan="2" class="total"><?php echo $order_total_before_tax?></td>
            </tr>
            <tr>
                <td colspan="4">TAX</td>
                <td colspan="2" class="total"><?php echo $order_tax_per?></td>
            </tr>
            <tr>
                <td colspan="4" class="grand total">GRAND TOTAL</td>
                <td colspan="2" class="grand total"><?php echo $order_total_after_tax?></td>
            </tr>
            </tfoot>
            </table>
<link rel="stylesheet" href="css/funciona.css">
</div>             
<div class="container p-4 auto">
    <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card card-body">
                    <br>
                    <h6>Generar Factura</h6>
                    <br>
                    <button id="btnImprimirFactura">Imprimir</button>
                    <br><br>
                    <h6>Generar Delaracion de Producción</h6>
                    <br>
                    <button id="btnImprimirDiv">Imprimir</button>
                    <br>
                    <script src="js/script.js"></script>
                </div>
            </div>
    </div>
</div>



