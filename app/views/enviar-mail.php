<?php

	$nombre=$POST["nombre"];

	$texto_mail=$POST["mensaje"];

	$destinatario=$_POST["mail"];

	$heaaders="MIME-Version: 1.0\r\n";

	$headers.="Content-type: text/html; charset=iso-8859-1\r\n";

	$headers.="From: <a href="/publicacion/Ver?id={{user.mail}}"></a> \r\n";

	$exitio=mail($destinatario,$nombre,$texto_mail,$headers);


	if($exito){

		echo "Mensaje enviado con éxito";
	}else{

		echo "Ha habido un error";
	}
?>