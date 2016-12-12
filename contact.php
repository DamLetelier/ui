<?php

if(isset($_POST['email'])) {

    $email_to = "busmora@gmail.com";
 
    $email_subject = "Dudas";

 
    function died($error) {
 
        // your error code can go here
 
        echo "Falta información. ";
 
        echo "Están listados abajo.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Favor vuelva y corrija esos errores.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message'])) {
 
        died('Hay problemas con el formulario.');
 
    }
 
     
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
 
 
    $email_message = "Detalles Abajo.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";

 
	// create email headers
	 
	$headers = 'From: '.$email."\r\n".
	 
	'Reply-To: '.$email."\r\n" .
	 
	'X-Mailer: PHP/' . phpversion();
	 
	@mail($email_to, $email_subject, $email_message, $headers);  


?>
 
 
 
<!-- include your own success html here -->
 

Muchas Gracias por su comentario! Le responderemos a la brevedad.

 
<?php

}
 
?>