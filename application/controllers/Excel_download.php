<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_download extends AuthData{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('Common_mode','common');
        $this->load->model('Product_model','product');

    }  

    public function generatexls() {

        // create file name
        $fileName = 'data-'.time().'.xlsx';

        // load excel library
        $this->load->library('excel');
        $listInfo = $this->product->product_list();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Product Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Date');  
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list['product_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list['product_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list['price']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list['created_at']);
            $rowCount++;
        }
        $filename = "product_". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'xlsx');  
        $objWriter->save('php://output'); 
 
    }
              
    
}