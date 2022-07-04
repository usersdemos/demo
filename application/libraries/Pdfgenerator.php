<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once(dirname(__FILE__) . "/dompdf/dompdf_config.inc.php");

class Pdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    
    if ($stream) {
      $dompdf->stream($filename.".pdf", array("Attachment" => true));
    } else {
    $dompdf->render();

      $output = $dompdf->output();
      if (!file_exists('./upload/pdf/')) {
        mkdir('./upload/pdf/', 0777, true);
      }
      file_put_contents( './upload/pdf/'.$filename.".pdf", $output);
      return './upload/pdf/'.$filename.".pdf";
    }
  }
}