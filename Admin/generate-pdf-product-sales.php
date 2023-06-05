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
$pdf->Cell(190,10,"Product Sales Report",1,1,'C');
$pdf->Ln(10);

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->SetFont('Times','',12);

$html = <<<EOD
    <table>
        <tr>
            <th width="25px"></th>
            <th width="200px">Order Products</th>
            <th width="80px">Capacity/Size</th>
            <th width="80px">Color</th>
            <th width="80px">Price</th>
            <th width="30px">Qty</th>
            <th width="80px">TOTAL</th>
        </tr>
EOD;

$i = 1;
$total = 0;
$detail_res = mysqli_query($connect,"SELECT *, SUM(cart_item.quantity) AS qty FROM cart_item 
                                    INNER JOIN shipping ON cart_item.order_id = shipping.order_id 
                                    INNER JOIN product ON cart_item.prod_id = product.prod_id
                                    INNER JOIN product_detail ON cart_item.prod_detail_id = product_detail.prod_detail_id
                                    INNER JOIN product_color ON cart_item.prod_color_id = product_color.prod_color_id
                                    WHERE cart_item.cart_item_status = '0' AND shipping.ship_status = '3' AND cart_item.order_id IS NOT NULL
                                    GROUP BY cart_item.prod_color_id");

while ($detail_row = mysqli_fetch_assoc($detail_res)) {
    $html .= "
                <tr>
                    <td>".$i."</td>
                    <td>".$detail_row['prod_name']."</td>
                    <td>".$detail_row['prod_detail_name']."</td>
                    <td>".$detail_row['prod_color_name']."</td>
                    <td>RM ".$detail_row['prod_detail_price']."</td>
                    <td>".$detail_row['qty']."</td>
                    <td>RM ".$detail_row['cart_subtotal']."</td>
                </tr>
            ";
    $i++;
}

$html .= "
            </table>
			<style>
                table {
                    border-collapse:collapse; 
                    border:1px solid black;
                    border-right:1px solid black;
                }
                th, td {border:1px solid black;}
                table tr th {
                    background-color:white;
                    color:black;
                    font-weight:bold;
                    text-align:center;
                }
			</style>
        ";

$pdf->WriteHTMLCell(200,0,3,'',$html,0);

$pdfname = "Product Sales Report";
$pdf->Output();
?>

