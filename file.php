<?php
   // request variables // important
   $Nombre = $_REQUEST["inputNombre"];
   $tel = $_REQUEST["inputTelefono"];
   $emaila = $_REQUEST["inputEmail"];
   $Asunto = $_REQUEST["inputAsunto"];
   $mensaje = $_REQUEST["inputMensaje"];
   
   if ($emaila) {
      function mail_attachment ($Nombre, $from, $Asunto, $mensaje){
        //  $fileatt = $attachment; // Path to the file
        //  $fileatt_type = "application/octet-stream"; // File Type 
         
        //  $start = strrpos($attachment, '/') == -1 ? 
            // strrpos($attachment, '//') : strrpos($attachment, '/')+1;
				
        //  $fileatt_name = substr($attachment, $start, 
        //     strlen($attachment)); // Filename that will be used for the 
        //     file as the attachment 
         
         $email_from = $Nombre; // Who the email is from
        //  $subject = $Asunto;
         
         $email_subject = $from . " - " . $Asunto; // The Subject of the email 
         $email_txt = $mensaje; // Message that the email has in it 
         $email_to = "contact@go-pharma.mx"; // Who the email is to

         $header = "From:contact@go-pharma.mx \r\n";
        //  $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
        //  $file = fopen($fileatt,'rb'); 
        //  $data = fread($file,filesize($fileatt)); 
        //  fclose($file); 
         
        $msg_txt="\n\n Has recibido un nuevo correo de " . $Nombre;
        //  $semi_rand = md5(time()); 
        //  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
         
        $email_txt .= $msg_txt;
			
        $email_message .= $email_txt . "\n\n";
				
        //  $data = chunk_split(base64_encode($data));
         
        //  $email_message .= "--{$mime_boundary}\n" . "Content-Type: {$fileatt_type};\n" .
        //     " name = \"{$fileatt_name}\"\n" . //"Content-Disposition: attachment;\n" . 
        //     //" filename = \"{$fileatt_name}\"\n" . "Content-Transfer-Encoding: 
        //     base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
				
         $ok = mail($email_to, $email_subject, $email_message, $header);
         
         if($ok) {
            echo "Tu mensaje ha sido enviado exitosamente.";
            // unlink($attachment); // delete a file after attachment sent.
         } else {
          echo "Lo sentimos, algo salió mal buscando contactar a" . $email_to . ". Intentalo de nuevo más tarde.";
         }
      }


      // move_uploaded_file($_FILES["filea"]["tmp_name"], 'temp/'.basename($_FILES['filea']['name']));
			
      mail_attachment($Nombre, $emaila, $Asunto, $mensaje);
   }
?>