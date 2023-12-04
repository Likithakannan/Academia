
<?php
// Get the PDF filename from the URL query parameter
$pdfFileName = isset($_GET['filename']) ? $_GET['filename'] : '';

// Output the "Application Submitted" message
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous' />
";
echo "<style>
body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-image: url(bg.jpeg);
}
</style>";
echo "<p align='center'>";
echo '<a href="' . $pdfFileName . '" target="_blank"><button type="submit" class="btn btn-info btn-lg">Download PDF</button></a></p><br/><br/>';
echo '<p align="center"><a href="../Homepage/index.php" >Go to home</a></p>';
?>
