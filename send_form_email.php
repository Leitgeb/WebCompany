<?php
 
if(isset($_POST['email'])) {
 
     
 
    $email_to = "richard@leitgeb-web-dev.com";
 
    $email_subject = "Email from form";
 
     
 
     
 
    function died($error) {
 
        // error code
        ?>
        
        <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="css/main.css">
                <title>Error</title>
            </head>
            <body>
                <header class="main-header">
                    <ul class="main-nav">
                        <li class="item brand"><a href="index.html#top"><img src="img/logo.png" alt="SRL2 Logo"></a></li> <span class="pipe nav">|</span>
                        <li class="item nav"><a href="index.html#about">Our Values</a></li> <span class="pipe nav">|</span> 
                        <li class="item nav"><a href="index.html#services">Services</a></li> <span class="pipe nav">|</span>
                        <li class="item nav"><a href="index.html#pricing">Pricing</a></li> <span class="pipe nav">|</span>
                        <li class="item nav"><a href="index.html#contact">Contact</a></li>
                    </ul>
                </header><!--/.main-header-->
                
                <div class="email-failure">
                    
                        <?php
                            echo "<span>We are very sorry, but there were error(s) found with the form you submitted.</span> <br />";
 
                            echo "These errors appear below.<br /><br />";
                    
                            echo $error."<br /><br />";
                    
                            echo "Please go back and fix these errors.<br /><br />";
                    
                            die();
                        ?>
                    
                </div>
            </body>
        </html>
 
 <?php 
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
 
    $email_from = $_POST['email']; // required
 
    $message = $_POST['message']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'The Message you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/main.css">
            <title>Success</title>
        </head>
        <body>
            <header class="main-header">
                <ul class="main-nav">
                    <li class="item brand"><a href="index.html#top"><img src="img/logo.png" alt="SRL2 Logo"></a></li> <span class="pipe nav">|</span>
                    <li class="item nav"><a href="index.html#about">Our Values</a></li> <span class="pipe nav">|</span> 
                    <li class="item nav"><a href="index.html#services">Services</a></li> <span class="pipe nav">|</span>
                    <li class="item nav"><a href="index.html#pricing">Pricing</a></li> <span class="pipe nav">|</span>
                    <li class="item nav"><a href="index.html#contact">Contact</a></li>
                </ul>
            </header><!--/.main-header-->
            
            <div class="email-success">
                Thank you for contacting us. We will be in touch with you very soon.
            </div>
        </body>
    </html>
 
 
 
<?php

    }
    
?>
 
