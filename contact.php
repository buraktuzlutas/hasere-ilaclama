<?php
header('Content-Type: application/json');

// Form verilerini al
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$message = $_POST['message'] ?? '';

// E-posta gönderimi için gerekli bilgiler
$to = "info@hasereilaclama.com"; // Buraya kendi e-posta adresinizi yazın
$subject = "Yeni İletişim Formu Mesajı";
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// E-posta içeriği
$email_content = "
<html>
<head>
    <title>Yeni İletişim Formu Mesajı</title>
</head>
<body>
    <h2>Yeni İletişim Formu Mesajı</h2>
    <p><strong>Ad Soyad:</strong> {$name}</p>
    <p><strong>E-posta:</strong> {$email}</p>
    <p><strong>Telefon:</strong> {$phone}</p>
    <p><strong>Mesaj:</strong></p>
    <p>{$message}</p>
</body>
</html>
";

// E-posta gönderimi
$mail_sent = mail($to, $subject, $email_content, $headers);

// JSON yanıtı
if ($mail_sent) {
    echo json_encode(['success' => true, 'message' => 'Mesajınız başarıyla gönderildi.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Mesaj gönderilirken bir hata oluştu.']);
}
?> 