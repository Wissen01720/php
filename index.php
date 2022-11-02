<?php include("db.php") ?>

<?php include ("includes/header.php") ?>
<link rel="stylesheet" href="css/Styles.css">

<section id="container">
    <div class="card-body">
        <form action="search.php" method="POST" style="float:right;">
            <input type="submit" class="btn btn-dark" name="buscar" value="buscar" id="buscar">
        </form>
        <form action="new.php" method="POST">
            <input type="submit" class="btn btn-success" name="Nuevo +" value="Nuevo +" id="Nuevo +">
        </form>
    </div>
</section>



<div class="row">
    <div class="col-md-auto mx-auto">
        <table class="table table-dark table-hover">
            <div class="col--auto"> 
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> 
                    alert-dismissible fade show" role="alert">
                    <?= $_SESSION ['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 <?php session_unset(); } ?>
                    <tr>
                        <th>Code</th>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Metal Precioso</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Cantidad De Metal Vendido</th>
                        <th>Unidad De Medida</th>
                        <th>Numero De Rucom</th>
                        <th>Numero De Documento De Identidad</th>
                        <th>Actions</th>
                    </tr>
                <?php 
                /*---- Paginador ----*/
                    $sql_registe =mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM task WHERE estatus =1");
                    $result_register = mysqli_fetch_array($sql_registe);
                    $total_registro = $result_register['total_registro']; 

                    $por_pagina = 4;

                    if(empty($_GET['pagina']))
                    {
                        $pagina = 1;
                    }else{
                        $pagina = $_GET['pagina'];
                    }
                    $desde = ($pagina-1) * $por_pagina;
                    $total_paginas = ceil($total_registro/ $por_pagina);

                    $query = mysqli_query($conn, "SELECT t.id, t.FECHA, t.NOMBRE, t.APELLIDO, t.METALPRECIOSO, t.CEDULA,t.TELEFONO, t.CORREO, 
                    t.CANTIDADDEMETALVENDIDO, t.UNIDADDEMEDIDA, t.NUMERODERUCOM, t.NUMERODEDOCUMENTODEIDENTIDAD FROM task t WHERE estatus = 1 
                    ORDER BY t.id ASC LIMIT $desde,$por_pagina");

                    $result = mysqli_num_rows($query);
                    if($result > 0){
                        while ($data = mysqli_fetch_array($query)){

                ?>
                    <tr>
                        <td><?php echo $data["id"];?></td>
                        <td><?php echo $data["FECHA"];?></td>
                        <td><?php echo $data["NOMBRE"];?></td>
                        <td><?php echo $data["APELLIDO"];?></td>
                        <td><?php echo $data["METALPRECIOSO"];?></td>
                        <td><?php echo $data["CEDULA"];?></td>
                        <td><?php echo $data["TELEFONO"];?></td>
                        <td><?php echo $data["CORREO"];?></td>
                        <td><?php echo $data["CANTIDADDEMETALVENDIDO"];?></td>
                        <td><?php echo $data["UNIDADDEMEDIDA"];?></td>
                        <td><?php echo $data["NUMERODERUCOM"];?></td>
                        <td><?php echo $data["NUMERODEDOCUMENTODEIDENTIDAD"]?></td>
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
                <?php 
                    }
                }             
                ?>
            </div>
        </table>
    </div>
    <div class="container paginador">
            <ul>
            <?php 
                if($pagina !=1 )
                {
            ?>
                <li><a style="text-decoration:none" href="?pagina=<?php echo 1; ?>">│<</a></li>
                <li><a style="text-decoration:none" href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
            <?php 
                }
                for ($i=1; $i <= $total_paginas; $i++){
                    if($i == $pagina)
                    {
                        echo '<li class="pageSelected" >'.$i.'</li>';
                    }else{
                        echo '<li><a style="text-decoration:none" href="?pagina='.$i.'">'.$i.'</a></li>';
                    }
                }
                if($pagina != $total_paginas)
                {
            ?>
                <li><a style="text-decoration:none" href="?pagina=<?php echo $pagina +1; ?>">>></a></li>
                <li><a style="text-decoration:none" href="?pagina=<?php echo $total_paginas ?>">>>│</a></li>
                <?php }?>
            </ul>
    </div>
</div>

<?php include("includes/footer.php")?>
