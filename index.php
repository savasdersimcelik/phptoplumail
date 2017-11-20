<?php

  require_once "mail/PHPMailerAutoload.php";

	$oku = fopen("list.txt",'r'); 
	while(!feof($oku)){  
		$veri = fgets($oku); 

		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 1; 
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'mail.webinyo.com'; // Hostunuzun Mail ( SMTP ) Adresi
		$mail->Port = 25; // SMTP Port Numaranız
		$mail->IsHTML(true);
		$mail->SetLanguage("tr", "phpmailer/language");
		$mail->CharSet ="utf-8";
		$mail->Username = "ePosta Adresi"; // Kendi Alan Adınıza Kayıtlı Mail Adresi
		$mail->Password = "Mail Password"; // Mail Adresi Şifreniz
		$mail->SetFrom("admin@webinyo.com", "Savaş Dersim ÇELİK"); // Mail attigimizda yazacak isim
		$mail->AddAddress($veri); // Maili gonderecegimiz kisi/ alici
		$mail->Subject = "Toplu Mail Denemesi"; // Konu basligi
		$mail->Body = "Bu Mail Deneme Amacı İle Atılmıştır."; // Mailin icerigi
		$mail->Send();

	} 
	fclose($oku);  

  

?>