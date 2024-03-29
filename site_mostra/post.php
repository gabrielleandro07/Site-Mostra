<?php
  if(isset($_POST['email'])) {
   
      // EDIT THE 1 LINE BELOW AS REQUIRED
      $email_to = "ide.projetosocialitinerante@gmail.com";
   
      function died($error) {
          // your error code can go here
          echo "We are very sorry, but there were error(s) found with the form you submitted. ";
          echo "These errors appear below.<br /><br />";
          echo $error."<br /><br />";
          echo "Please go back and fix these errors.<br /><br />";
          die();
      }
   
   
      // validation expected data exists
      if(!isset($_POST['nome']) ||
          !isset($_POST['email']) ||
          !isset($_POST['tipoAssunto']) ||
          !isset($_POST['assunto']) ||
          !isset($_POST['mensagem'])) {
          died('We are sorry, but there appears to be a problem with the form you submitted.');       
      }
   
       
   
      $nome = $_POST['nome']; // required
      $email = $_POST['email']; // required
      $tipoAssunto = $_POST['tipoAssunto']; // required
      $assunto = $_POST['assunto']; // not required
      $mensagem = $_POST['mensagem']; // required
   
      $error_message = "";
      $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
   
    if(!preg_match($email_exp,$email_from)) {
      $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
   
      $string_exp = "/^[A-Za-z .'-]+$/";
   
    if(!preg_match($string_exp,$first_name)) {
      $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    }
   
    if(!preg_match($string_exp,$last_name)) {
      $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    }
   
    if(strlen($comments) < 2) {
      $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
   
      $email_message = "Form details below.\n\n";
   
       
      function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
      }
   
       
   
      $email_message .= "Nome: ".clean_string($nome)."\n";
      $email_message .= "E-mail: ".clean_string($email)."\n";
      $email_message .= "Tipo do assunto: ".clean_string($tipoAssunto)."\n";
      $email_message .= "Assunto: ".clean_string($assunto)."\n";
      $email_message .= "Mensagem: ".clean_string($mensagem)."\n";
   
  // create email headers
  $headers = 'From: '.$email_from."\r\n".
  'Reply-To: '.$email_from."\r\n" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Obrigado por nos escrever. Retornarem em breve.
 
<?php
 
}
?>