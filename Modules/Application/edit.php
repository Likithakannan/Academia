<?php
include('db.php');
session_start();
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}
include 'db.php';
if (isset($_POST['edit'])) {

  $id = $_POST['student_id'];
  $name=$_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['phone'];
  $aadhar = $_POST['aadhar'];
  $pan = $_POST['pan'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $pincode = $_POST['pincode'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $blood_group = $_POST['blood_group'];
  $nationality = $_POST['nationality'];
  $community = $_POST['community'];
  $caste = $_POST['caste'];
  $category = $_POST['category'];
  $stmt = $con->prepare("UPDATE student SET email = ?, full_name = ?, phone = ?, aadhar = ?, pan = ?, address = ?, city = ?, pincode = ?, state = ?, country = ?, blood_group = ?, nationality = ?, community = ?, caste = ?, category = ? WHERE student_id = ?");
  $stmt->bind_param('ssissssissssssss', $email, $name, $mobile, $aadhar, $pan, $address, $city, $pincode, $state, $country, $blood_group, $nationality, $community, $caste, $category, $id);
  $stmt->execute();
 
  echo "<script language='javascript'>window.alert('Student details updated successful');window.location='Studs1.php';</script>";
  exit();
} else {

  if(isset($_GET['student_id'])) {
    $id = $_GET['student_id'];

    $stmt = $con->prepare("SELECT * FROM student WHERE student_id = ?");
   
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    // print_r($row);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Student Details</title>
         <style>
        body {
            font-family: Arial, sans-serif;
            background-color:	; /* Light background color */
            margin: 0;
            padding: 0;
        }

        /* Adding a container to center the content and set max-width */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            background-color: #F0E68C; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: 98%;
            padding: 10px;
            /*margin-right: 10px;*/
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
    </head>
    <body>
        <form method="POST" name="edit_form" action="" onsubmit="return validateform();">
      <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
      Email:
      <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required><br>
      Name:
      <input type="text" name="name" id="name" value="<?php echo $row['full_name']; ?>" required><br>
      Mobile:
      <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required><br>
      Aadhar:
      <input type="text" name="aadhar" id="aadhar" value="<?php echo $row['aadhar']; ?>"><br>
      PAN:
      <input type="text" name="pan" id="pan" value="<?php echo $row['pan']; ?>"><br>
      Address:
      <input type="text" name="address" id="address" value="<?php echo $row['address']; ?>" required><br>
      City:
      <input type="text" name="city" id="city" value="<?php echo $row['city']; ?>" required><br>
      Pincode:
      <input type="number" name="pincode" id="pincode" value="<?php echo $row['pincode']; ?>" required><br>
      State:
      <input type="text" name="state" id="state" value="<?php echo $row['state']; ?>" required><br>
      Country:
      <input type="text" name="country" id="country" value="<?php echo $row['country']; ?>" required><br>
      Blood Group:
      <input type="text" name="blood_group" id="blood_group" value="<?php echo $row['blood_group']; ?>"><br>
      Nationality:
      <input type="text" name="nationality" id="nationality" value="<?php echo $row['nationality']; ?>" required><br>
      Community:
      <input type="text" name="community" id="community" value="<?php echo $row['community']; ?>"><br>
      Caste:
      <input type="text" name="caste" id="caste" value="<?php echo $row['caste']; ?>"><br>
      Category:
      <input type="text" name="category" id="category" value="<?php echo $row['category']; ?>"><br>
      <input type="submit" value="Update" name="edit">
    </form>
        <script>
        function validateform(){
          console.log("func call");
            var email = document.getElementById("email").value;
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var aadhar = document.getElementById("aadhar").value;
            var pan = document.getElementById("pan").value;
            var address = document.getElementById("address").value;
            var city = document.getElementById("city").value;
            var pincode = document.getElementById("pincode").value;
            var state = document.getElementById("state").value;
            var country = document.getElementById("country").value;
            var blood_group = document.getElementById("blood_group").value;
            var nationality = document.getElementById("nationality").value;
            var community = document.getElementById("community").value;
            var caste = document.getElementById("caste").value;
            var category = document.getElementById("category").value;

            if (!name.match(/^[a-zA-Z ]+$/)) {
               alert("Enter only text");
               return false;
            }
            var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var domain = email.split("@")[1];   
            if(!email.match(emailRegex)){
              alert("Invalid Email Address");        
              return false;
            }
            if(!(domain === "bmscw.edu.in" || domain === "gmail.com" || domain === "yahoo.com" || domain === "hotmail.com" || domain === "outlook.com")){
              alert("Invalid Email Address");        
              return false;
            }
            if (!phone.match(/^[6-9]{1}[0-9]{9}$/)) {
              alert("Invalid Phone Number");
              return false;
            }
            if(!aadhar.match(/^[0-9]{12}$/)){
              alert("Invalid Aadhar Number");
              return false;
            }
            if(!pan.match(/^[A-Z]{5}[0-9]{4}[A-Z]$/)){
              alert("Invalid Pan Number");
              return false;
            }
            if (!city.match(/^[a-zA-Z ]+$/)) {
               alert("Enter only text");
               return false;
            }
            if(!pin.match(/^[0-9]{6}$/)){
              alert("Invalid Pincode");
              return false;
            }
            if (!state.match(/^[a-zA-Z ]+$/)) {
               alert("Enter only text");
               return false;
            }
            if (!country.match(/^[a-zA-Z ]+$/)) {
               alert("Enter only text");
               return false;
            }
            if(!(blood_group === "A+ve" || blood_group === "A-ve" || blood_group === "B+ve" || blood_group === "B-ve" || blood_group === "AB+ve" || blood_group === "AB-ve" || blood_group === "O+ve" || blood_group === "O-ve")){
              alert("Enter valid blood group");
               return false;
            }
            if (!nationality.match(/^[a-zA-Z ]+$/)) {
               alert("Enter only text");
               return false;
            }
            if (!community.match(/^[a-zA-Z ]+$/)) {
               alert("Enter only text");
               return false;
            }
            if (!caste.match(/^[a-zA-Z ]+$/)) {
               alert("Enter only text");
               return false;
            }
            if(!category.match(/^[a-zA-Z0-9]+$/)){
              alert("Enter only text and number");
              return false;
            }
            else{
              return true;
            }  
    }
    </script>     
    </body>
    </html>
    
    <?php
  } 
}
if(isset($_GET['student_id']) && $_GET['type'] === 'delete') {
      $id = $_GET['student_id'];
      
         // Delete the student record from the database
         $delete_upload = "DELETE FROM upload WHERE student_id='$id'";
         $result_upload = mysqli_query($con,$delete_upload);
         $delete_pay = "DELETE FROM onlinepayment WHERE student_id='$id'";
         $result_pay = mysqli_query($con,$delete_pay);
         $delete_msg = "DELETE FROM messages WHERE student_id='$id'";
         $result_msg = mysqli_query($con,$delete_msg);
         $delete_fees = "DELETE FROM fees WHERE student_id='$id'";
         $result_fees = mysqli_query($con,$delete_fees);
         $delete_exam = "DELETE FROM exam WHERE student_id='$id'";
         $result_exam = mysqli_query($con,$delete_exam);
         $delete_enrollment = "DELETE FROM enrollment WHERE student_id='$id'";
         $result_enrollment = mysqli_query($con,$delete_enrollment);
         $delete_cart = "DELETE FROM cart WHERE student_id='$id'";
         $result_cart = mysqli_query($con,$delete_cart);
         $delete_student = "DELETE FROM student WHERE student_id='$id'";
         $result_student = mysqli_query($con,$delete_student);

         if($result_student && $result_upload && $result_pay && $result_msg && $result_fees && $result_exam && $result_enrollment && $result_cart){
                  echo "<script language='javascript'>window.alert('Student details deleted Successful');window.location='Studs1.php';</script>";
         }
         else{
                  echo "<script language='javascript'>window.alert('Didnt delete the data');window.location='Studs1.php';</script>";
         }
         exit();
       }

      
?>