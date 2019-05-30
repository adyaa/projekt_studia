<?php
include_once('config.php'); /*dolaczyc config.php, aby połączyć się z bazą danych*/
$email=mysqli_real_escape_string($con, $_POST['em1']); /*sprawdzanie przeslanych danych pod katem poprawnosci*/
$emailclean = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
$sub=mysqli_real_escape_string($con, $_POST['sub1']);
$subclean = filter_var($sub, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$com=mysqli_real_escape_string($con, $_POST['com1']);
$comclean = filter_var($com, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
//wrzucenie danych do bazy
mysqli_query($con,"INSERT INTO contact(`email`, `subject`, `comments`)VALUES('$emailclean','$subclean','$comclean')");
//powiadomienie na specjalnie utworzonego maila o otrzymaniu wiadomosci, formatowanie aby przyszly w formie tabelki:
$to='kontodoprojektu@o2.pl';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <you@yourwebsite.com>' . "\r\n";
$headers .= 'Cc: another@email.com' . "\r\n";
$message='<table width="100%" border="1" cellspacing="1" cellpadding="2"> 
<tr><td colspan="2">Ktoś napisał do Ciebie wiadomość</td></tr>
<tr><td>Subject</td><td>'.$subclean.'</td></tr>
<tr><td>Message</td><td>'.$comclean.'</td></tr>
<tr><td colspan="2"></td></tr>
</table>';
mail($to,$subclean,$message,$headers);
//wysyła wiadomość zwrotną do AJAX
echo '<div class="alert alert-success">Dziękujemy za skontaktowanie się z nami.</div>';
$con->close(); /*zamkniecie polaczenia z baza danych*/

?>