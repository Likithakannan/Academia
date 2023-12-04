

<?php
session_start();
//$sid = $_SESSION['sid'];
require_once('tcpdf/tcpdf.php');

$name = "";
$email = "";
$course = "";
$specialisation = "";
$DOB="";
$Nationality="";
$Community="";
$Caste="";
$Category="";
$Aadhar="";
$Passport="";
$PAN="";
$BloodGroup="";
$Phone="";
$Address="";
$Country="";
$State="";
$City="";
$Pincode="";
$Father_name="";
$Mother_Name="";
$Guardian_Name="";
$Father_Occupation="";
$Mother_Occupation="";
$Guardian_Occupation="";
$Father_Number="";
$Mother_Number="";
$Guardian_Number="";
$Father_email="";
$Mother_email="";
$Guardian_email="";
$Father_AI="";
$Mother_AI="";
$Guardian_AI="";

$name = $_POST['Name'];
$email = $_POST['email'];
$course = $_POST['course'];
$specialisation = $_POST['specialisation'];
$DOB = $_POST['DOB'];
$Nationality=$_POST['Nationality'];
$Community=$_POST['Community'];
$Caste=$_POST['Caste'];
$Category=$_POST['Category'];
$Aadhar=$_POST['Aadhar'];
$Passport=$_POST['Passport'];
$PAN=$_POST['PAN'];
$BloodGroup=$_POST['BloodGroup'];
$Phone=$_POST['Phone'];
$Address=$_POST['Address'];
$Country=$_POST['Country'];
$State=$_POST['country-state'];
$City=$_POST['City'];
$Pincode=$_POST['Pincode'];
$Father_name=$_POST['Father_name'];
$Mother_Name=$_POST['Mother_Name'];
$Guardian_Name=$_POST['Guardian_Name'];
$Father_Occupation=$_POST['Father_Occupation'];
$Mother_Occupation=$_POST['Mother_Occupation'];
$Guardian_Occupation=$_POST['Guardian_Occupation'];
$Father_Number=$_POST['Father_Number'];
$Mother_Number=$_POST['Mother_Number'];
$Guardian_Number=$_POST['Guardian_Number'];
$Father_email=$_POST['Father_email'];
$Mother_email=$_POST['Mother_email'];
$Guardian_email=$_POST['Guardian_email'];
$Father_AI=$_POST['Father_AI'];
$Mother_AI=$_POST['Mother_AI'];
$Guardian_AI=$_POST['Guardian_AI'];
$sign_img=$_FILES['sign_img'];
$marks_img=$_FILES['marks_img'];
$transfer_img=$_FILES['transfer_img'];
$migration_img=$_FILES['migration_img'];
$photo_img=$_FILES['photo_img'];
$caste_img=$_FILES['caste_img'];
$sign_img_content = isset($sign_img['tmp_name']) && !empty($sign_img['tmp_name']) ? file_get_contents($sign_img['tmp_name']) : '';
$marks_img_content = isset($marks_img['tmp_name']) && !empty($marks_img['tmp_name']) ? file_get_contents($marks_img['tmp_name']) : '';
$transfer_img_content=isset($transfer_img['tmp_name']) && !empty($transfer_img['tmp_name']) ? file_get_contents($transfer_img['tmp_name']) : '';
$migration_img_content = isset($migration_img['tmp_name']) && !empty($migration_img['tmp_name']) ? file_get_contents($migration_img['tmp_name']) : '';
$photo_img_content = isset($photo_img['tmp_name']) && !empty($photo_img['tmp_name']) ? file_get_contents($photo_img['tmp_name']) : '';
$caste_img_content = isset($caste_img['tmp_name']) && !empty($caste_img['tmp_name']) ? file_get_contents($caste_img['tmp_name']) : '';


$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle($name . 'Application form');
$pdf->SetHeaderData('', '', 'College Application', '');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(10, 10, 10, true);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();

$pdf->Cell(0, 10, 'College Application', 0, 1, 'C');
$pdf->Ln(10);

$html = '
<table cellspacing="1" cellpadding="3" border="1">
    <tr>
        <td>Name:</td>
        <td>' . $name . '</td>
    </tr>
    <tr>
        <td>Course:</td>
        <td>' . $course . '</td>
    </tr>
    <tr>
        <td>Specialisation:</td>
        <td>' . $specialisation . '</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>' . $email . '</td>
    </tr>
    <tr>
        <td>DOB:</td>
        <td>' . $DOB . '</td>
    </tr>
    <tr>
        <td>Nationality:</td>
        <td>' . $Nationality . '</td>
    </tr>
    <tr>
        <td>Community:</td>
        <td>' . $Community . '</td>
    </tr>
    <tr>
        <td>Caste:</td>
        <td>' . $Caste . '</td>
    </tr>
    <tr>
        <td>Category:</td>
        <td>' . $Category . '</td>
    </tr>
    <tr>
        <td>Aadhar Number:</td>
        <td>' . $Aadhar . '</td>
    </tr>
    <tr>
        <td>Passport number:</td>
        <td>' . $Passport . '</td>
    </tr>
    <tr>
        <td>PAN number:</td>
        <td>' . $PAN . '</td>
    </tr>
    <tr>
        <td>Blood Group:</td>
        <td>' . $BloodGroup . '</td>
    </tr>
    <tr>
        <td>Phone Number:</td>
        <td>' . $Phone . '</td>
    </tr>
    <tr>
        <td>Address:</td>
        <td>' . $Address . '</td>
    </tr>
    <tr>
        <td>Country:</td>
        <td>' . $Country . '</td>
    </tr>
    <tr>
        <td>State:</td>
        <td>' . $State . '</td>
    </tr>
    <tr>
        <td>City:</td>
        <td>' . $City . '</td>
    </tr>
    <tr>
        <td>PIN code:</td>
        <td>' . $Pincode . '</td>
    </tr>
    <tr>
        <td>Father\'s Name:</td>
        <td>' . $Father_name . '</td>
    </tr>
    <tr>
        <td>Father\'s Occupation:</td>
        <td>' . $Father_Occupation . '</td>
    </tr>
    <tr>
        <td>Father\'s Number:</td>
        <td>' . $Father_Number . '</td>
    </tr>
    <tr>
        <td>father\'s email:</td>
        <td>' . $Father_email . '</td>
    </tr>
    <tr>
    <td>Father\'s Annual Income:</td>
    <td>' . $Father_AI . '</td>
</tr>
    <tr>
        <td>Mother\'s Name:</td>
        <td>' . $Mother_Name . '</td>
    </tr>
    <tr>
        <td>Mother\'s Occupation:</td>
        <td>' . $Mother_Occupation . '</td>
    </tr>
    <tr>
        <td>Mother\'s Number:</td>
        <td>' . $Mother_Number . '</td>
    </tr>
    <tr>
        <td>Mother\'s Email:</td>
        <td>' . $Mother_email . '</td>
    </tr>
    <tr>
        <td>Mother\'s Annual Income :</td>
        <td>' . $Mother_AI . '</td>
    </tr>
    <tr>
        <td>Guardian\'s Name:</td>
        <td>' . $Guardian_Name . '</td>
    </tr>
    <tr>
        <td>Guardian\'s Occupation:</td>
        <td>' . $Guardian_Occupation . '</td>
    </tr>
    
    <tr>
        <td>Guardian\'s Number:</td>
        <td>' . $Guardian_Number . '</td>
    </tr>
    
    
    <tr>
        <td>Guardian\'s Email:</td>
        <td>' . $Guardian_email . '</td>
    </tr>
   
    
    <tr>
        <td>Guardian\'s Annual Income:</td>
        <td>' . $Guardian_AI . '</td>
    </tr>
    
</table>
';

$pdf->writeHTML($html);

$pdfFileName = 'Application_' . uniqid('Academia_') . '.pdf';
$pdf->Output(__DIR__ . '/pdfs/' . $pdfFileName, 'F');

$baseURL = 'http://localhost/academia/';

$pdfURL = $baseURL . 'Modules/Application/pdfs/' . $pdfFileName;
$pdfContent = $pdf->Output('', 'S');

// Convert the PDF content to base64-encoded string
$pdfData = base64_encode($pdfContent);

require('db.php');

$pdfData = $con->real_escape_string($pdfData);

    $sql = "INSERT INTO `student_details` (
                name, email, course, specialisation, dob, nationality, community, caste, category,
                aadhar, pan, passport, blood_group, phone, address, country, state, city, pincode,
                fname, foccupation, fmobile, femail, fincome, mname, moccupation, mmobile, memail, mincome,
                gname, goccupation, gmobile, gemail, gincome, marks_card, transfer, migration, photo,
                caste_img, sign,pdf
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $con->prepare($sql);

    // Bind the parameters to the statement (adjust data types and order as per your table)
    $stmt->bind_param(
        "sssssssssssssssssssssssssssssssssssssssss",
        $name, $email, $course, $specialisation, $DOB, $Nationality, $Community, $Caste, $Category,
        $Aadhar, $PAN, $Passport, $BloodGroup, $Phone, $Address, $Country, $State, $City, $Pincode,
        $Father_name, $Father_Occupation, $Father_Number, $Father_email, $Father_AI,
        $Mother_Name, $Mother_Occupation, $Mother_Number, $Mother_email, $Mother_AI,
        $Guardian_Name, $Guardian_Occupation, $Guardian_Number, $Guardian_email, $Guardian_AI,
        $marks_img_content, $transfer_img_content, $migration_img_content, $photo_img_content,
        $caste_img_content, $sign_img_content, $pdfData
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted into the database successfully.";
    } else {
        echo "Error inserting data into the database: " . $stmt->error;
    }

    // Close the statement

// Close the database connection
$con->close();

header("Location: application_submitted.php?filename=" . urlencode($pdfURL));


exit;