<?php

use LDAP\Result;

class Invoice{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "php_myswl_crud";
	private $invoiceUserTable = 'factura_usuarios';	
	private $invoiceOrderTable = 'task';   
	private $invoiceOrderItemTable = 'factura_orden_producto';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function loginUsers($email, $password){
		$sqlQuery = "
			SELECT id, email, first_name, last_name, address, mobile 
			FROM ".$this->invoiceUserTable." 
			WHERE email='".$email."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}	
	public function checkLoggedIn(){
		if(!$_SESSION['userid']) {
			header("Location:home.php");
		}
	}

	public function saveInvoice($POST) {		
		$sqlInsert = "
		INSERT INTO ".$this->invoiceOrderTable."(user_id, NOMBRE, DIRECCION, APELLIDO,METALPRECIOSO, CEDULA, ACTIVIDADECONOMICA, TELEFONO, CORREO, MUNICIPIO, DEPARTAMENTO, CANTIDADDEMETALVENDIDO, UNIDADDEMEDIDA, MUNICIPIODEORIGEN, TRIMESTRE, NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR, NUMERODERUCOM, NUMERODEDOCUMENTODEIDENTIDAD, MUNICIPIO2, DEPARTAMENTO2, TIPODECUENTA, BANCO, CUENTABANCARIA, ARENAS, LEY, PIEDRASPRECIOSASYSEMIPRECIOSAS, GRAVASDERIO, ARCILLAS, order_total_before_tax, order_total_tax, order_tax_per, order_total_after_tax, order_amount_paid, order_total_amount_due, note) 
			VALUES ('".$POST['userId']."', '".$POST['companyName']."', '".$POST['address']."', '".$POST['APELLIDO']."', '".$POST['METALPRECIOSO']."', '".$POST['CEDULA']."','".$POST['ACTIVIDADECONOMICA']."', '".$POST['TELEFONO']."','".$POST['CORREO']."','".$POST['MUNICIPIO']."','".$POST['DEPARTAMENTO']."', '".$POST['CANTIDADDEMETALVENDIDO']."', '".$POST['UNIDADDEMEDIDA']."','".$POST['MUNICIPIODEORIGEN']."','".$POST['TRIMESTRE']."','".$POST['NOMBREORAZONSOCIALDELCOMERCIALIZADOOCONSUMIDOR']."','".$POST['NUMERODERUCOM']."','".$POST['NUMERODEDOCUMENTODEIDENTIDAD']."','".$POST['MUNICIPIO2']."',
			'".$POST['DEPARTAMENTO2']."', '".$POST['TIPODECUENTA']."', '".$POST['BANCO']."', '".$POST['CUENTABANCARIA']."', '".$POST['ARENAS']."', '".$POST['LEY']."', '".$POST['PIEDRASPRECIOSASYSEMIPRECIOSAS']."', '".$POST['GRAVASDERIO']."',  '".$POST['ARCILLAS']."', '".$POST['subTotal']."', '".$POST['taxAmount']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."', '".$POST['amountPaid']."', '".$POST['amountDue']."', '".$POST['notes']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "
			INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
			VALUES ('".$lastInsertId."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}       	
	}	
	public function updateInvoice($POST) {
		if($POST['invoiceId']) {	
			$sqlInsert = "
				UPDATE ".$this->invoiceOrderTable." 
				SET order_total_before_tax = '".$POST['subTotal']."', order_total_tax = '".$POST['taxAmount']."', order_tax_per = '".$POST['taxRate']."', order_total_after_tax = '".$POST['totalAftertax']."', order_amount_paid = '".$POST['amountPaid']."', order_total_amount_due = '".$POST['amountDue']."', note = '".$POST['notes']."' 
				WHERE user_id = '".$POST['userId']."' AND id = '".$POST['invoiceId']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		$this->deleteInvoiceItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['productCode']); $i++) {			
			$sqlInsertItem = "
				INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
				VALUES ('".$POST['invoiceId']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);			
		}       	
	}	
	public function getInvoiceList(){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user_id = '".$_SESSION['userid']."'";
		return  $this->getData($sqlQuery);
	}	
	public function getInvoice($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user_id = '".$_SESSION['userid']."' AND id = '$invoiceId'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_assoc($result);
		return $row;
	}	
	public function getInvoiceItems($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderItemTable." 
			WHERE order_id = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}
	public function deleteInvoiceItems($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderItemTable." 
			WHERE order_id = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteInvoice($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderTable." 
			WHERE id = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteInvoiceItems($invoiceId);	
		return 1;
	}
}
?>