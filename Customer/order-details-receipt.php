<?php 
include("../Admin/connection.php"); 
ob_end_clean();
require('../TCPDF/tcpdf.php');


if (isset($_GET['code']) && is_numeric($_GET['code']) ) {

    $orderId = $_GET['code'];

    $pdf = new TCPDF('P','mm','A4');

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

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

    $pdf->Image('../Customer/assets/images/Logo/Black logo - no background.png',15,10,33);
    $pdf->Cell(40);

    $pdf->SetFont('Times','B',25);
    $pdf->Cell(120,30,"4PEOPLE TELCO",0,1,'C');
    $pdf->Ln(10);

    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->SetFont('Times','',12);

    $prod_res = mysqli_query($connect,"SELECT * FROM cart_item 
							INNER JOIN `order` ON cart_item.order_id = `order`.order_id							
							INNER JOIN `shipping` ON shipping.order_id = `order`.order_id	
							INNER JOIN `payment` ON payment.order_id = `order`.order_id	
                            WHERE `order`.order_id = '$orderId'");

    $order_detail = mysqli_fetch_assoc($prod_res);

    $date_time = $order_detail['pay_datetime'];
    $date = date("d/m/Y",strtotime($date_time));
        
    $html ='<p>INVOICE NUMBER: &nbsp;<b>'.$order_detail['invoice_number'].'</b></p>
            <p>Date: &nbsp;<b>'.$date.'</b></p>
            <p>Sold to:<br><b>'.$order_detail['receiver_name'].'<br>'.$order_detail['receiver_phone'].'</b></p>'.
            '<b>'.$order_detail['address'].',<br>'.$order_detail['city'].',<br>'.$order_detail['postcode'].' , '.$order_detail['state'].',<br>Malaysia.</b>';
            
    $pdf->WriteHTMLCell(190,0,13,'',$html,0);   
    $pdf->Ln(70);


    $pdf->SetFont('Times','',12);
    $table = <<<EOD
    <table>
        <tr style="font-weight:bold;">
            <th width="30px"></th>
            <th width="250px">PRODUCT NAME</th>
            <th width="150px">COLOR</th>
            <th width="90px">PRICE</th>
            <th width="50px">QTY</th>
            <th width="90px">SUBTOTAL</th>
        </tr><br>
    EOD;

    $i = 1;
    $prod_res = mysqli_query($connect,"SELECT * FROM cart_item 
                                        INNER JOIN product ON cart_item.prod_id = product.prod_id 
                                        INNER JOIN product_detail ON cart_item.prod_detail_id = product_detail.prod_detail_id
                                        INNER JOIN product_color ON cart_item.prod_color_id = product_color.prod_color_id
                                        WHERE cart_item.order_id = '$orderId'");

    while ($prod_row = mysqli_fetch_assoc($prod_res)) {
        if (empty($prod_row['prod_detail_name'])) {
            $cap = "";
        }
        else {
            $cap = "[".$prod_row['prod_detail_name']."]";
        }
        $table .= "<tr>
        <td>".$i."</td>
        <td>".$prod_row['prod_name']." ".$cap."</td>
        <td>".$prod_row['prod_color_name']."</td>
        <td>RM ".$prod_row['product_price']."</td>
        <td>".$prod_row['quantity']." unit</td>
        <td>RM ".$prod_row['cart_subtotal']."</td>
        </tr>";
        $i++;
    }
    
    $table .= <<<EOD
    <br><br>
    <tr>
        <td colspan="5" style="text-align:right; font-weight:bold;">Grandtotal: &nbsp;</td>
        <td style="font-weight:bold; border-top-style:solid; border-bottom-style:double;">
    EOD;

    $table .= "RM ".$order_detail['order_grandtotal']."";

    $table .= <<<EOD
    </td>
    </tr>
    </table>
    <style>
        th {
            border-top:1px solid black;
            border-bottom:1px solid black;
        }
    </style>
    EOD;

    $pdf->WriteHTMLCell(200,0,13,'',$table,0);

    $pdfname = $order_detail['invoice_number']."_".$order_detail['receiver_name'].".pdf";
    $pdf->Output("$pdfname",'I');
} 
else {
    echo "<script>window.close();</script>";
}
?>
