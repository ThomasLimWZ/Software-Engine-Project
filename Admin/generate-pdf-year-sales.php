<?php 
include("connection.php"); 
ob_end_clean();
require('../TCPDF/tcpdf.php');

$pdf = new TCPDF('P','mm','A4');
  
$pdf->setPrintHeader(false);
    class MYPDF extends TCPDF {
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

$pdf->AddPage();

$pdf->Image('img/Black logo - no background.png',15,10,33);
$pdf->Cell(40);

$pdf->SetFont('Times','B',25);
$pdf->Cell(120,20,"4PEOPLE TELCO",0,1,'C');
$pdf->Ln(20);

$pdf->SetFont('Times','',18);
$pdf->Cell(190,10,"Yearly Sales Report",1,1,'C');
$pdf->Ln(10);

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->SetFont('Times','',12);

$html = <<<EOD
<table>
	<tr>
		<th>Year</th>
		<th>Total Sales</th>
	</tr>
EOD;

$result = mysqli_query($connect, "SELECT SUM(`order`.order_grandtotal) AS total, YEAR(`order`.order_datetime) AS year FROM `order`
                                    INNER JOIN shipping ON `order`.order_id = shipping.order_id 
					                WHERE shipping.ship_status = '3' 
                                    GROUP BY YEAR(`order`.order_datetime)
                                    ORDER BY YEAR(`order`.order_datetime)");

while ($row = mysqli_fetch_assoc($result)) {
	$html .= "
                <tr>
                    <td>".$row['year']."</td>
                    <td>RM ".$row['total']."</td>
			    </tr>";
	
}

$html .= "
            </table>
			<style>
                table {
                    border-collapse:collapse; 
                    border:1px solid black;
                    border-right:1px solid black;
                }
                th, td {
                    border:1px solid black; 
                    text-align:center;
                }
                table tr th {
                    background-color:white;
                    color:black;
                    font-weight:bold;
                    text-align:center;
                }
			</style>
        ";

$pdf->WriteHTMLCell(205,0,3,'',$html,0);

$pdfname = "Yearly Sales Report";
$pdf->Output();
?>

