<?php
exec("wkhtmltopdf\bin\wkhtmltopdf.exe http://cx-media.com/survey/pdf.php survey.pdf");

$file_name = "survey.pdf";
$file_path = "survey.pdf";
$file_size = filesize($file_path);
header('Pragma: public');
header('Expires: 0');
header('Last-Modified: ' . gmdate('D, d M Y H:i ') . ' GMT');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/octet-stream');
header('Content-Length: ' . $file_size);
header('Content-Disposition: attachment; filename="' . $file_name . '";');
header('Content-Transfer-Encoding: binary');
readfile($file_path);
?>