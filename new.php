<?php 
include ("db.php");
include ("Invoice.php");
include ("includes/Cabeza.php");
include ("container.php")
?>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<section id="container">
    <div class="card-body">
        <form action="index.php" method="POST">
            <input type="submit" class="btn btn-danger" name="Atrás" value="Atrás" id="Atrás">
        </form>
    </div>
</section>
<?php 
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName']) {	
	$invoice->saveInvoice($_POST);
	header("Location:index.php");	
}
?>
<title>baulphp : Sistema facturación PHP & MySQL</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container content-invoice">
<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate> 
<div class="load-animate animated fadeInUp">
<div class="row">
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    <h2 class="title">Sistema de Facturación PHP</h2>	
</div>		    		
</div>
<input id="currency" type="hidden" value="$">
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <h3>De,</h3>
    <?php echo $_SESSION['user']; ?><br>	
    <?php echo $_SESSION['address']; ?><br>	
    <?php echo $_SESSION['mobile']; ?><br>
    <?php echo $_SESSION['email']; ?><br>	
</div>      		
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
    <h3>Para,</h3>
    <div class="form-group">
        <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Nombre" autocomplete="off">
    </div>
    <div class="form-group">
        <input class="form-control" rows="3" name="address" id="address" placeholder="Su dirección"></input>
    </div>
    
</div>
</div>
                <div class="container p-4">
                    <div class="row">
                        <div class="col--12">
                            <div class="col-md-12 mx-12"> 
                                <div class="card card-body">
                                        <table>
                                            <tr>
                                                <br>
                                                    <h6>DATOS DEL DECLARANTE</h6>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="APELLIDO" id="APELLIDO" class="form-control" placeholder="APELLIDO">
                                                    </div>
                                                </td><br>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="CEDULA" id="CEDULA" class="form-control" placeholder="CEDULA">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="int" name="ACTIVIDADECONOMICA" id="ACTIVIDADECONOMICA" class="form-control" placeholder="ACTIVIDAD ECONOMICA">
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="TELEFONO" id="TELEFONO" class="form-control" placeholder="TELEFONO">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="CORREO" id="CORREO" class="form-control" placeholder="CORREO">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="MUNICIPIO" id="MUNICIPIO" class="form-control" placeholder="MUNICIPIO">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="DEPARTAMENTO" id="DEPARTAMENTO" class="form-control" placeholder="DEPARTAMENTO">
                                                    </div>
                                                </th>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <br>
                                                <h6>DATOS DEL MINERAL</h6><br>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="METALPRECIOSO" id="METALPRECIOSO" class="form-control" placeholder="METAL PRECIOSO">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="CANTIDADDEMETALVENDIDO" id="CANTIDADDEMETALVENDIDO" class="form-control" placeholder="CANTIDAD DE METAL VENDIDO">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="UNIDADDEMEDIDA" id="UNIDADDEMEDIDA" class="form-control" placeholder="UNIDAD DE MEDIDA">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="DEPARTAMENTODEORIGEN" id="DEPARTAMENTODEORIGEN" class="form-control" placeholder="DEPARTAMENTO DE ORIGEN">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="MUNICIPIODEORIGEN" id="MUNICIPIODEORIGEN" class="form-control" placeholder="MUNICIPIO DE ORIGEN">
                                                    </div>
                                                </th>
                                            </tr>
                                        </table>
                                                <br>
                                                <h6>PERIODO DE PRODUCCIÓN DECLARADO</h6><br>
                                                <div class="form-group">
                                                    <input type="number" name="TRIMESTRE" id="TRIMESTRE" class="form-control" placeholder="TRIMESTRE">
                                                </div>
                                                <br>
                                        <table>
                                            <tr>
                                                <h6>INFORMACION DEL COMPRADOR DEL MINERAL</h6><br>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR" id="NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR" class="form-control" placeholder="NOMBRE O RAZON SOCIAL DEL COMERCIALIZADOR O CON SUMIDOR">
                                                    </div><br>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="NUMERODERUCOM" id="NUMERODERUCOM" class="form-control" placeholder="NUMERO DE RUCOM">
                                                    </div>
                                                    <br>
                                                </th>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <h6>INFORMACION DEL COMPRADOR DEL MINERAL</h6><br>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="NUMERODEDOCUMENTODEIDENTIDAD" id="NUMERODEDOCUMENTODEIDENTIDAD" class="form-control" placeholder="NUMERO DE DOCUMENTO DE IDENTIDAD">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="DEPARTAMENTO2" id="DEPARTAMENTO2" class="form-control" placeholder="DEPARTAMENTO">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="MUNICIPIO2" id="MUNICIPIO2" class="form-control" placeholder="MUNICIPIO">
                                                    </div>
                                                </th>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <h6>ADICIONALES</h6><br>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="TIPODECUENTA" id="TIPODECUENTA" class="form-control" placeholder="TIPO DE CUENTA">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="BANCO" id="BANCO" class="form-control" placeholder="BANCO">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="CUENTABANCARIA" id="CUENTABANCARIA" class="form-control" placeholder="CUENTA BANCARIA">
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="ARENAS" id="ARENAS" class="form-control" placeholder="ARENAS">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="LEY" id="LEY" class="form-control" placeholder="LEY">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="PIEDRASPRECIOSASYSEMIPRECIOSAS" id="PIEDRASPRECIOSASYSEMIPRECIOSAS" class="form-control" placeholder="PIEDRAS PRECIOSAS Y SEMIPRECIOSAS">
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="GRAVASDERIO" id="GRAVASDERIO" class="form-control" placeholder="GRAVAS DE RIO">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" name="ARCILLAS" id="ARCILLAS" class="form-control" placeholder="ARCILLAS">
                                                    </div>
                                                </th>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-bordered table-hover" id="invoiceItems">	
                                <tr>
                                    <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                    <th width="15%">Prod. No</th>
                                    <th width="38%">Nombre Producto</th>
                                    <th width="15%">Cantidad</th>
                                    <th width="15%">Precio</th>								
                                    <th width="15%">Total</th>
                                </tr>							
                                <tr>
                                    <td><input class="itemRow" type="checkbox"></td>
                                    <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                                    <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>			
                                    <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                                    <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                                    <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                                </tr>						
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button>
                            <button class="btn btn-success" id="addRows" type="button">+ Agregar Más</button>
                        </div>
                    </div>
                    <div class="row">	
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <h3>Notas: </h3>
                            <div class="form-group">
                                <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Notas"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
                                <input data-loading-text="Guardando factura..." type="submit" name="invoice_btn" value="Guardar Factura" class="btn btn-success submit_btn invoice-save-btm">						
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                            <span class="form-inline">
                                <div class="form-group">
                                    <label>Subtotal: &nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon currency">$</div>
                                        <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tasa Impuesto: &nbsp;</label>
                                    <div class="input-group">
                                        <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tasa de Impuestos">
                                        <div class="input-group-addon">%</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Monto Inpuesto: &nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon currency">$</div>
                                        <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Monto de Impuesto">
                                    </div>
                                </div>							
                                <div class="form-group">
                                    <label>Total: &nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon currency">$</div>
                                        <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Cantidad pagada: &nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon currency">$</div>
                                        <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Cantidad pagada">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Cantidad debida: &nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon currency">$</div>
                                        <input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Cantidad debida">
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                <div class="clearfix"></div>
	    </div>
    </form>    		
</div>	
<?php include('footer.php');?>