<?php include("db.php"); ?>
<?php    
$item_arr = array();
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
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
        if(is_array($DEPARTAMENTO)){ 
            foreach($DEPARTAMENTO as $DEPARTAMENTO){
                echo $DEPARTAMENTO;
            } 
        }
        $CANTIDADDEMETALVENDIDO = $_POST['CANTIDADDEMETALVENDIDO'];
        $UNIDADDEMEDIDA = $_POST['UNIDADDEMEDIDA'];
        if(is_array($UNIDADDEMEDIDA)){ 
            foreach($UNIDADDEMEDIDA as $UNIDADDEMEDIDA){
                echo $UNIDADDEMEDIDA;
            } 
        }
        $MUNICIPIODEORIGEN = $_POST['MUNICIPIODEORIGEN'];
        $DEPARTAMENTODEORIGEN = $_POST['DEPARTAMENTODEORIGEN'];
        if(is_array($DEPARTAMENTODEORIGEN)){ 
            foreach($DEPARTAMENTODEORIGEN as $DEPARTAMENTODEORIGEN){
                echo $DEPARTAMENTODEORIGEN;
            } 
        }
        $TRIMESTRE = $_POST['TRIMESTRE'];
        if(is_array($TRIMESTRE)){ 
            foreach($TRIMESTRE as $TRIMESTRE){
                echo $TRIMESTRE;
            } 
        }
        $NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR = $_POST['NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR'];
        $NUMERODERUCOM = $_POST['NUMERODERUCOM'];
        $NUMERODEDOCUMENTODEIDENTIDAD =$_POST['NUMERODEDOCUMENTODEIDENTIDAD'];
        $MUNICIPIO2 = $_POST['MUNICIPIO2'];
        $DEPARTAMENTO2 = $_POST['DEPARTAMENTO2'];
        if(is_array($DEPARTAMENTO2)){ 
            foreach($DEPARTAMENTO2 as $DEPARTAMENTO2){
                echo $DEPARTAMENTO2;
            } 
        }
        $TIPODECUENTA = $_POST['TIPODECUENTA'];
        if(is_array($TIPODECUENTA)){ 
            foreach($TIPODECUENTA as $TIPODECUENTA){
                echo $TIPODECUENTA;
            } 
        }
        $BANCO = $_POST['BANCO'];
        if(is_array($BANCO)){ 
            foreach($BANCO as $BANCO){
                echo $BANCO;
            } 
        }
        $CUENTABANCARIA = $_POST['CUENTABANCARIA'];
 }?>
<link rel="stylesheet" href="css/funciona.css">

    <header class="clearfix">
      <div id="logo">
        <img src="imagenes/logo-anm_0.jpg">
      </div>
      <h1>INVOICE 3-2-1</h1>
      <div id="company" class="clearfix">
        <div>AGENCIA NACIONAL DE MINERIA</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>CLIENT</span></div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span><a href="mailto:john@example.com"></a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span><?php echo date("d"), date("M"), date("Y") ?></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">CONCEPTO</th>
            <th class="desc">GRAMOS BRUTOS</th>
            <th>LEY </th>
            <th>VALOR POR GRAMO</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"></td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
