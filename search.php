<?php include("db.php");?>

<?php include ("includes/header.php") ?>
<link rel="stylesheet" href="css/Styles.css">

<section id="container">
    <div class="card-body">
        <form action="index.php" method="POST" style="float:right;">
            <input type="submit" class="btn btn-info" name="Atras" value="Atras" id="atras">
        </form>
        <form action="new.php" method="POST">
            <input type="submit" class="btn btn-success" name="Nuevo +" value="Nuevo +" id="confirmar">
        </form>
    </div>
</section>
<?php 
if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
if (!isset($_POST['buscaid'])){$_POST['buscaid'] = '';}
if (!isset($_POST['METALPRECIOSO'])){$_POST['METALPRECIOSO'] = '';}
if (!isset($_POST['buscaCEDULA'])){$_POST['buscaCEDULA'] = '';}
if (!isset($_POST['buscaTELEFONO'])){$_POST['buscaTELEFONO'] = '';}
if (!isset($_POST['buscaNUMERODERUCOM'])){$_POST['buscaNUMERODERUCOM'] = '';}
if (!isset($_POST["orden"])){$_POST["orden"] = '';}
?>

<div class="container mt-5">
    <div class="col-12">
 


    <div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">

        <h4 class="card-title">Buscador</h4>


<form id="form2" name="form2" method="POST" action="search.php">
        <div class="col-12 row">

            <div class="mb-3">
                    <label  class="form-label">Nombre a buscar</label>
                    <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
            </div>

            <h4 class="card-title">Filtro de búsqueda</h4>  
            
            <div class="col-11">

                        <table class="table">
                                <thead>
                                        <tr class="filters">
                                                <th>
                                                        Codigo:
                                                        <input type="number" id="buscaid" name="buscaid" class="form-control mt-2" value="<?php echo $_POST["buscaid"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Metal Precioso:
                                                        <input type="text" id="METALPRECIOSO" name="METALPRECIOSO" class="form-control" value="<?php echo $_POST["METALPRECIOSO"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Cedula:
                                                        <input type="number" id="buscaCEDULA" name="buscaCEDULA" class="form-control mt-2" value="<?php echo $_POST["buscaCEDULA"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Telefono:
                                                        <input type="number" id="buscaTELEFONO" name="buscaTELEFONO" class="form-control mt-2" value="<?php echo $_POST["buscaTELEFONO"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Numero de Rucom:
                                                        <input type="number" id="buscaNUMERODERUCOM" name="buscaNUMERODERUCOM" class="form-control mt-2" value="<?php echo $_POST["buscaNUMERODERUCOM"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                         
                                        </tr>
                                </thead>
                        </table>
                </div>

                <div class="col-1">
                        <input type="submit" class="btn " value="Ver" style="margin-top: 38px; background-color: purple; color: white;">
                </div>
        
        </div>


        <?php 
        if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
        $aKeyword = explode(" ", $_POST['buscar']);
        
       
        if ($_POST["buscar"] == '' AND $_POST['buscaid'] == '' AND $_POST['METALPRECIOSO'] == '' AND $_POST['buscaCEDULA'] == '' AND $_POST['buscaTELEFONO'] == ''AND $_POST['buscaNUMERODERUCOM'] == '' ){ 
                //$query ="SELECT * FROM task ";//
        }else{


                $query ="SELECT * FROM task ";

        if ($_POST["buscar"] != '' ){ 
                $query .= "WHERE (nombre LIKE LOWER('%".$aKeyword[0]."%') OR apellido LIKE LOWER('%".$aKeyword[0]."%')) ";
        
        for($i = 1; $i < count($aKeyword); $i++) {
           if(!empty($aKeyword[$i])) {
               $query .= " OR nombre LIKE '%" . $aKeyword[$i] . "%' OR apellido LIKE '%" . $aKeyword[$i] . "%'";
           }
         }

        }

         if ($_POST["buscaid"] != '' ){
                $query .= " AND id = '".$_POST['buscaid']."' ";
         }

         if ($_POST["METALPRECIOSO"] != '' ){
                $query .= " AND METALPRECIOSO = '".$_POST['METALPRECIOSO']."' ";
         }

         if ( $_POST['buscaCEDULA'] != '' ){
                $query .= " AND CEDULA = '".$_POST['buscaCEDULA']."' ";
         }

         if ( $_POST['buscaTELEFONO'] != '' ){
                $query .= " AND TELEFONO = '".$_POST['buscaTELEFONO']."' ";
         }
               
         if ($_POST["buscaNUMERODERUCOM"] != '' ){
                $query .= " AND NUMERODERUCOM = '".$_POST["buscaNUMERODERUCOM"]."' ";
         }
        
       
}


         $sql = $conn->query($query);

         $numeroSql = mysqli_num_rows($sql);

        ?>
        <p style="font-weight: bold; color:purple;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
</form>


<div class="table-responsive">
        <table class="table table-dark table-hover">
                 <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> 
                    alert-dismissible fade show" role="alert">
                    <?= $_SESSION ['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 <?php session_unset(); } ?>
                <thead>
                        <tr>
                                <th style=" text-align: center;">Code</th>
                                <th style=" text-align: center;">Fecha</th>
                                <th style=" text-align: center;">Nombre</th>
                                <th style=" text-align: center;">Apellido</th>
                                <th style=" text-align: center;">Metal Precioso</th>
                                <th style=" text-align: center;">Cedula</th>
                                <th style=" text-align: center;">Telefono</th>
                                <th style=" text-align: center;">Correo</th>
                                <th style=" text-align: center;">Cantidad De Metal Vendido</th>
                                <th style=" text-align: center;">Unidad De Medida</th>
                                <th style=" text-align: center;">Numero De Rucom</th>
                                <th style=" text-align: center;">Numero De Documento De Identidad</th>
                                <th style=" text-align: center;">Actions</th>
                        </tr>
                </thead>
                <tbody>
                <?php While($data = $sql->fetch_assoc()) {   ?>
               
                        <tr>
                        <td style=" text-align: center;"><?php echo $data["id"];?></td>
                        <td style=" text-align: center;"><?php echo $data["FECHA"];?></td>
                        <td style=" text-align: center;"><?php echo $data["NOMBRE"];?></td>
                        <td style=" text-align: center;"><?php echo $data["APELLIDO"];?></td>
                        <td style=" text-align: center;"><?php echo $data["METALPRECIOSO"];?></td>
                        <td style=" text-align: center;"><?php echo $data["CEDULA"];?></td>
                        <td style=" text-align: center;"><?php echo $data["TELEFONO"];?></td>
                        <td style=" text-align: center;"><?php echo $data["CORREO"];?></td>
                        <td style=" text-align: center;"><?php echo $data["CANTIDADDEMETALVENDIDO"];?></td>
                        <td style=" text-align: center;"><?php echo $data["UNIDADDEMEDIDA"];?></td>
                        <td style=" text-align: center;"><?php echo $data["NUMERODERUCOM"];?></td>
                        <td style=" text-align: center;"><?php echo $data["NUMERODEDOCUMENTODEIDENTIDAD"]?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['id']?>" class="btn btn-secondary">
                                <i class="fas fa-pen-alt" _mstvisible="2"></i>
                            </a>
                            <a href="dalete_task.php?id=<?php echo $data['id']?>" class="btn btn-danger" >
                                <i class="fas fa-trash" _mstvisible="2"></i>
                            </a>
                            <a href="print.php?id=<?php echo $data['id']?>" class="btn btn-success">
                                <i class="fas fa-print" _mstvisible="2"></i>
                            </a>
                        </td>
                        </tr>
               
               <?php } ?>
                </tbody>
        </table>
</div>


</div>
</div>
</div>
</div>


    </div>
</div>
<?php include("includes/footer.php")?>