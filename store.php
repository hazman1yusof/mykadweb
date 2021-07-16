<?php
	$myfile = fopen("C:\cmas\mykad\mykadweb\mykad.txt", "w");


	$txt = $_POST['txtIDNum']."|".
	 		$_POST['txtBirthDate']."|".
	 		$_POST['txtKPTName']."|".
	 		$_POST['txtOldIDNum']."|".
	 		$_POST['txtReligion']."|".
	 		$_POST['txtGender']."|".
	 		$_POST['txtRace']."|".
	 		$_POST['txtAddress1']."|".
	 		$_POST['txtAddress2']."|".
	 		$_POST['txtAddress3']."|".
	 		$_POST['txtPostcode']."|".
	 		$_POST['txtCity']."|".
	 		$_POST['txtState']."|";


	fwrite($myfile, $txt);
	fclose($myfile);

	$data = base64_decode($_POST['base64']);

	file_put_contents('C:\cmas\mykad\mykadweb\myphotov1.jpg', $data);

?>