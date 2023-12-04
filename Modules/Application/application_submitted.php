<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width : 100%;
            height : 600px;
		    background-image: linear-gradient(to right top, #f41995, #e329ac, #cc3ac2, #ad4ad4, #8558e3, #6770f2, #4283fb, #0094ff, #00b1ff, #00caff, #00e1f7, #15f4e5);
            background-repeat : no-repeat;
            background-size : cover;
	    }
    </style>
</head>
<body>
    <?php
// Get the PDF filename from the URL query parameter
    $pdfFileName = isset($_GET['filename']) ? $_GET['filename'] : '';

// Output the "Application Submitted" message
echo "<h1 align='center'>Application Submitted</h1>";
echo "<p align='center'>Thank you for submitting your application. Click the link below to download your filled application:</p>";
echo "<p align='center'>";
echo '<a href="' . $pdfFileName . '" target="_blank">Download Application</a><br/><br/>';
echo '<a href="../Homepage/index.php" >Go to home</a></p>';
?>

</body>
</html>

