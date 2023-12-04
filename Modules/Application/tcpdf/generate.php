<?php
session_start();
    function fetch_data(){
        $student_id = $_SESSION['student_id'];
        $pID = $_GET['data'];
        $output = '';
        $connect = mysqli_connect("localhost","root","","academia");
        $query = "SELECT full_name,course, specialisation FROM `student` WHERE student_id='$student_id'";
        $query1 = "SELECT razorpayOrderId, toValue FROM `onlinepayment` WHERE student_id='$student_id' and razorpayOrderId='$pID' and type='admission_fees'";
        $query2 = "SELECT current_bal FROM `fees` WHERE student_id='$student_id'";
        $result = mysqli_query($connect,$query);
        $result1 = mysqli_query($connect,$query1);
        $result2 = mysqli_query($connect,$query2);
        while($row = mysqli_fetch_array($result)){ 
            while($row1 = mysqli_fetch_array($result1)){
                while($row2 =mysqli_fetch_assoc($result2)){
                $output .= '
                <style>
                    @font-face {
                    font-family: "Poppins";
                    src: url(path/to/poppins/font.ttf);
                }
                table {
                    border: 1px solid black;
                    align-items: center;
                    margin: auto;
                    border-collapse: collapse;
                }
                h1 {
                    text-align: center;
                    color:black;
                    font-size:20px;
                    width: 50%;
                    padding: 10px;
                }
                th {
                    font-weight:bold;
                    padding: 10px;
                    width: 50%;
                    padding: 10px;
                }
                td {
                    padding: 10px;
                    width: 50%;
                    padding: 10px;
                }
                .container{        
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                </style>
                <div class="container">
                    <div align="center"><h1>ACADEMIA</h1></div>
                    <table border="1" cellspacing="0" cellpadding="5" style="border: 1px solid black; font-family: \'Poppins\', sans-serif; align-items: center; margin: auto; border-collapse: collapse;">
                        <tr>
                            <th>Name</th>
                            <td>'.$row["full_name"].'</td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>'.$row["course"].'</td>
                        </tr>
                        <tr>
                            <th>Specialisation</th>
                            <td>'.$row["specialisation"].'</td>
                        </tr>
                        <tr>
                            <th>Transaction ID</th>
                            <td>'.$row1["razorpayOrderId"].'</td>
                        </tr>
                        <tr>    
                            <th>Amount Paid</th>
                            <td>Rs:'.$row1["toValue"].'/-</td>
                        </tr>
                        <tr>    
                            <th>Balance</th>
                            <td>Rs:'.$row2["current_bal"].'/-</td>
                        </tr> 
                    </table>
                    </div>
                ';
   
            }
        }
    }
        return $output;
    }
    $content = '';
    if (isset($_GET['data'])) {
        require_once("tcpdf.php");        
        $obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Fee Receipt");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $obj_pdf->SetDefaultMonospacedFont('helvetica');  
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '8', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false);
        $obj_pdf->setPrintFooter(false);  
        $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        $obj_pdf->SetFont('helvetica', '', 13);  
        $obj_pdf->AddPage();  
        $content .= fetch_data();
        $obj_pdf->writeHTML($content);
        $obj_pdf->Output("fee_receipt.pdf","I");
    }
?>