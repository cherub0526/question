<?php
//shell_exec("wkhtmltox\bin\wkhtmltopdf http://cx-media.com/survey/pdf.php pdf/survey.pdf");

/*
$file_name = "survey.pdf";
$file_path = "pdf/survey.pdf";
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
*/
?>
<?php
require 'pdfcrowd.php';

try
{   
	
    // create an API client instance
    $client = new Pdfcrowd("cherub0526", "78728d0047a744ecbf46d4e3e4548662");
	
	$client->setPageWidth("210mm");
	$client->setPageHeight("650mm");
    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertURI('http://cx-media.com/survey/three_result.php');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: no-cache");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"three_survey.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}

header("Location:admin.php");
?>