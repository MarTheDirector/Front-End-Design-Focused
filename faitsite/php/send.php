
<?php

function sendMail($rec){
 	$to = $rec;
   	$subject = "We knew your Fait would lead to us. ;)";
   	$message = "
                <!DOCTYPE html>
                <head></head>
                <body>
                        <div style='color:#6BB9C6'>
                                <br>Your FAIT is coming soon. 
<br> We'll 
keep you posted.
                        </div>
                </body>
                </html>";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' ."\r\n";
	$headers .= 'To: '. $rec . "\r\n";
	$headers .= 'cc: FAIT<adventuresoffait@gmail.com>' . "\r\n";
	$headers .= 'From: FAIT<adventuresoffait@gmail.com>' . "\r\n";


   	$retval = mail ($to,$subject,$message,$headers, '-fadventuresoffait@gmail.com');

	if( $retval == true ){
      		
   	}
   	else{
      		
   	}
}
?>
