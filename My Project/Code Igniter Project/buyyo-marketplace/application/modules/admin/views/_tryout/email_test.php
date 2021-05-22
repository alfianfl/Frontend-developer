<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email test</title>
</head>
<body>
    <?php 
         echo $this->session->flashdata('email_sent'); 
         echo form_open('/admin/tryout/mail'); 
      ?> 
      <input type = "submit" value = "SEND MAIL"> 	
      <p><?php echo $message; ?></p>
      <?php 
         echo form_close(); 
      ?> 
</body>
</html>