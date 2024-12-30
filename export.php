<?php    include('header.php'); 

require 'sheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

 	$statement = $pdo->prepare(" SELECT  * from products LEFT JOIN category on products.cat=category.id  LEFT JOIN groups on products.pro_group=groups.id");						 
												 
		  $statement->execute();
		  $result = $statement->fetchAll(PDO::FETCH_ASSOC);															 
		  $total = $statement->rowCount();

			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();


				// Set the header row in the Excel file
				$sheet->setCellValue('A1', 'ID');
				$sheet->setCellValue('B1', 'Name');
				$sheet->setCellValue('C1', 'Description');
				$sheet->setCellValue('D1', 'Price');
				$sheet->setCellValue('E1', 'Stock Quantity');

				// Start writing data from the second row
				$row = 2;


      if($total>0){
	   foreach ($result as $data) {  
					$sheet->setCellValue('A' . $row, $data['pid']);
					$sheet->setCellValue('B' . $row, $data['pname']);
					$sheet->setCellValue('C' . $row, $data['cat']);
					$sheet->setCellValue('D' . $row, $data['pro_group']);
					$sheet->setCellValue('E' . $row,'sdgg');
					$row++;
				  echo $data['kind'];
			  } 
		  
		  
				 

				// Create a writer to save the spreadsheet as a file
				$writer = new Xlsx($spreadsheet);
	 
				// Set the filename for the Excel file
				$filename = 'products_export.xlsx';

				// Set headers to force download of the Excel file
		 ///	 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		///	 	header('Content-Disposition: attachment;filename="' . $filename . '"');
		///  header('Cache-Control: max-age=0');

		 
		  
				// Save the file to the output buffer
	////	 $writer->save('php://output');
		 
		  
			} else {
				echo "No records found in the products table.";
			}



 ?>
 
 
 