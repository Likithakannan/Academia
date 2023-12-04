<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/Stud_Dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/appln.css">
	<script src="../js/appln.js" defer></script>
	<!--Material-Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<title>Application</title>

</head>
<body>
<div class="container">
		<!----------------------ASIDE--------------------->
		<aside>
			<div class="top">
				<div class="logo">
					<!--<img src="#">-->
					<h2>ACADEMIA</h2>
				</div>
				<div class="close" id="close-btn">
					<span class="material-symbols-rounded">close</span>
				</div>
			</div>
			<div class="sidebar">
				<a href="#">
					<span class="material-symbols-sharp">dashboard</span>
					<h3>Dashboard</h3>
				</a>
				<a href="Application.php">
					<span class="material-symbols-outlined">person_add</span>
					<h3>My Admissions</h3>
				</a>
				<a href="#">
					<span class="material-symbols-outlined">mail</span>
					<h3>Messages</h3>
					<span class="message-count">26</span>
				</a>
				
				<a href="../php/course_disp.php">
					<span class="material-symbols-outlined">post_add</span>
					<h3>Courses</h3>
				</a>
				<a href="#">
					<span class="material-symbols-outlined">apartment</span>
					<h3>Departments</h3>
				</a>
				<a href="#">
					<span class="material-symbols-outlined">auto_stories</span>
					<h3>Resources</h3>
				</a>
				<a href="#">
					<span class="material-symbols-sharp">quiz</span>
					<h3>Exams</h3>
				</a>
				<a href="#">
					<span class="material-symbols-outlined">forum</span>
					<h3>Collaboration hub</h3>
				</a>
				<a href="#">
					<span class="material-symbols-outlined">how_to_vote</span>
					<h3>Voting system</h3>
				</a>
				<a href="#">
					<span class="material-symbols-sharp">workspace_premium</span>
					<h3>My Certificates</h3>
				</a>
				<a href="Index.html">
					<span class="material-symbols-sharp">logout</span>
					<h3>Logout</h3>
				</a>
			</div>
		</aside>
		<!---------------------END OF ASIDE--------------------->
	
        <!------------------------ multistep form --------------------------->
	
<form data-multistep-form id="msform">
<div class="form-container">
        <!-- progressbar -->
        <ul id="progressbar">
          <li class="">Personal Details</li>
          <li>Contact Information</li>
          <li>Family Particulars</li>
          <li>Previous Examination Details</li>
          <li>Declaration</li>
	  <li>Payment</li>
	  <li>Documents upload</li>
        </ul>
        <!-- fieldsets -->
	<div class="card active" data-step="1">
        <fieldset>
                <h2 class="Title">Step 1</h2>
                <h3 class="Subtitle">Enter your personal details</h3>
		<div class="input-row">
			
		<table>
			<tr>
			<td>Name: </td>
			<td><input type="text" class="Name" name="Name" placeholder="Full name" required/></td>
			</tr>

			<tr>
			<td>Date of Birth:</td>
			<td><input type="date" class="DOB" name="DOB" min="1978-01-01" max="2003-01-01" required/></td>
			</tr>

			<tr>
			<td>Nationality: </td>
			<td><input type="text" class="Nationality" name="Nationality" placeholder="Nationality" required/></td>
			</tr>

			<tr>
			<td>Community: </td>
			<td><input type="text" class="Community" name="Community" placeholder="Community" required/></td>
			</tr>

			<tr>
			<td>Caste: </td>
			<td><input type="text" class="Caste" name="Caste" placeholder="Caste" required/></td>
			</tr>

			<tr>
			<td>Category: </td>
			<td><input type="text" class="Category" name="Category" placeholder="Category" required/></td>
			</tr>

			<tr>
			<td>Aadhar number: </td>
			<td><input type="number" name="Aadhar" class="Aadhar" placeholder="Aadhar number"  pattern="\d{12}" maxlength="12"/></td>
			</tr>

			<tr>
			<td>PAN number: </td>
			<td><input type="text" name="PAN" class="PAN" placeholder="PAN number"  pattern="[A-Z]{5}\d{4}[A-Z]" maxlength="10"/></td>
			</tr>

			<tr>
			<td>Blood group: </td>
			<td><select name="BloodGroup" class="Dropdown">
			<option value="A+ve">A+ve</option>
			<option value="A-ve">A-ve</option>
			<option value="B+ve">B+ve</option>
			<option value="B-ve">B-ve</option>
			<option value="AB+ve">AB+ve</option>
			<option value="AB-ve">AB-ve</option>
			<option value="O+ve">O+ve</option>
			<option value="O-ve">O-ve</option>
			</select>
			</td>
			</tr>

			<tr>
			<!--<td>Year of passing: </td>
			<td><select name="YOP" class="YOP">
			//<?php
			//for ($year = 2023; $year <= 2045; $year++) {
			//echo "<option value='$year'>$year</option>";
			//}
			//?>
			</select></td>-->
			</tr>
		</table>
		</div>
		<input type="button" name="next" class="next action-button" value="Next" />	
			
        </fieldset>
	</div>
	<div class="card" data-step="2">
        <fieldset>
                <h2 class="Title">Step 2</h2>
                <h3 class="Subtitle">Contact Information</h3>
                <div class="input-row">
		<table>
			<tr>
			<td>Mobile number: </td>
			<td><input type="number" class="MNo" pattern="[6,7,8,9]{1}[0-9]{9}" placeholder="Mobile number" required/></td>
			</tr>

			<tr>
			<td>Residential Address: </td>
			<td><textarea name="Address" class="Address" placeholder="Address" required></textarea></td>
			</tr>

			<tr>
			<td>City: </td>
			<td><input type="text" class="City" name="City" placeholder="City" required/></td>
			</tr>

			<tr>
			<td>PIN Code: </td>
			<td><input type="number" class="Pincode" pattern="[0-9]{6}" placeholder="PIN Code" required/></td>
			</tr>

			<tr>
			<td>State: </td>
			<td><input type="text" class="State" name="State" placeholder="State" required/></td>
			</tr>

			<tr>
			<td>Country: </td>
			<td><input type="text" class="Country" name="Country" placeholder="Country" required/></td>
			</tr>
		</table>
		</div>
                <div class="input-row">
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" id="nextButton" />
		</div>
                
        </fieldset>
	</div>
	<div class="card" data-step="3">
        <fieldset>
                <h2 class="Title">Step 3</h2>
                <h3 class="Subtitle">Family Particulars</h3>
                <div class="input-row">
			<table>
					<th>
						Details
					</th>
					<th>
						Father
					</th>
					<th>
						Mother
					</th>
					<th>
						Guardian
					</th>
				
				<tr>
					
					<td>
					Name:
					</td>
				
					<td>
					<input type="text" class="Father_name" name="Father_name" placeholder="Father's name" required />
					</td>
				
					<td>
					<input type="text" class="Mother_name" name="Mother_Name" placeholder="Mother's name" required/>
					</td>

					<td>
					<input type="text" class="Guardian_Name" name="Guardian_Name" placeholder="Guardian's name" />
					</td>
				</tr>

				<tr>
					<td>
					Occupation:
					</td>

					<td>
					<input type="text" class="Father_Occupation" name="Father_occupation" placeholder="Father's Occupation" required />
					</td>

					<td>
					<input type="text" class="Mother_Occupation" name="Mother_Occupation" placeholder="Mother's Occupation" required />
					</td>

					<td>
					<input type="text" class="Guardian_Occupation" name="Guardian_Occupation" placeholder="Guardian's Occupation" />
					</td>

				</tr>

				<tr>
					<td>
					Mobile number:
					</td>

					<td>
					<input type="text" pattern="[6,7,8,9][0-9]{9}" name="Father_MNo" class="Father_Number" placeholder="Father's Mobile number" required/>
					</td>

					<td>
					<input type="text" pattern="[6789][0-9]{9}" name="Mother_Number" name="Mother_MNo" placeholder="Mother's Mobile number" required/>
					</td>

					<td>
					<input type="text" pattern="[6789][0-9]{9}" name="Guardian_Number" class="Guardian_Number" placeholder="Guardian's Mobile number" />
					</td>
				</tr>

				<tr>
					<td>
					Email Address:
					</td>

					<td>
					<input type="text" name="Father_email" class="Father_email" placeholder="Father's Email address" required/>
					</td>

					<td>
					<input type="text" name="Mother_email" class="Mother_email" placeholder="Mother's Email address" required/>
					</td>

					<td>
					<input type="text" name="Guardian_email" class="Guardian_email" placeholder="Guardian's Email address"/>
					</td>
				</tr>

				<tr>
					<td>
					Annual Income:
					</td>

					<td>
					<input type="text" name="Father_AI" class="Father_AI" placeholder="Father's Annual Income" required/>
					</td>

					<td>
					<input type="text" name="Mother_AI" class="Mother_AI" placeholder="Mother's Annual Income" required/>
					</td>

					<td>
					<input type="text" name="Guardian_AI" class="Guardian_AI" placeholder="Guardian's Annual Income"/>
					</td>
				</tr>
			</table>
			<!-- <table>
                <tr>
                  <td>Application for the year:</td>
                  <td>
                    <select id="dropdown" name="AYear" class="Dropdown">
                      <option value="2nd">2nd year</option>
                      <option value="3rd">3rd year</option>
                    </select>
                  </td>
                </tr>
              </table>
              
              <table id="sem">
                <th>Semester</th>
                <th>Result Month & Year</th>
                <th>Result</th>
                <th>SGPA</th>
                <tr id="1sem">
                  <td>1st Semester</td>
                  <td><input type="month" class="1sem_res" name="1sem_res" required /></td>
                  <td>
                    <select name="Result" class="Dropdown">
                      <option value="Pass">Pass</option>
                      <option value="Fail">Fail</option>
                    </select>
                  </td>
                  <td><input type="number"></td>
                </tr>
                <tr id="2sem">
                  <td>2nd Semester</td>
                  <td><input type="month" class="2sem_res" name="2sem_res" required /></td>
                  <td>
                    <select name="Result" class="Dropdown">
                      <option value="Pass">Pass</option>
                      <option value="Fail">Fail</option>
                    </select>
                  </td>
                  <td><input type="number"></td>
                </tr>
                <tr id="3sem">
                  <td>3rd Semester</td>
                  <td><input type="month" class="3sem_res" name="1sem_res" required /></td>
                  <td>
                    <select name="Result" class="Dropdown">
                      <option value="Pass">Pass</option>
                      <option value="Fail">Fail</option>
                    </select>
                  </td>
                  <td><input type="number"></td>
                </tr>
                <tr id="4sem">
                  <td>4th Semester</td>
                  <td><input type="month" class="4sem_res" name="1sem_res" required /></td>
                  <td>
                    <select name="Result" class="Dropdown">
                      <option value="Pass">Pass</option>
                      <option value="Fail">Fail</option>
                    </select>
                  </td>
                  <td><input type="number"></td>
                </tr>
              </table> -->
		</div>
		<!--<div class="input-row">
                	Father's name: <input type="text" class="Father_name" name="Father_name" placeholder="Father's name" required /><br>
		</div>
		<div class="input-row">
                	Father's occupation: <input type="text" class="Father_Occupation" name="Father_occupation" placeholder="Father's Occupation" required /><br>
		</div>
		<div class="input-row">
                	Father's Mobile number: <input type="text" pattern="[6,7,8,9][0-9]{9}" name="Father_MNo" class="Father_Number" placeholder="Father's Mobile number" required/><br>
		</div>
		<div class="input-row">
			Father's Email address: <input type="text" name="Father_email" class="Father_email" placeholder="Father's Email address" required/><br>
		</div>
		<div class="input-row">
			Father's Annual Income: <input type="text" name="Father_AI" class="Father_AI" placeholder="Father's Annual Income" required/>
		</div>

		<div class="input-row">
                	Mother's name: <input type="text" class="Mother_name" name="Mother_Name" placeholder="Mother's name" required/><br>
		</div>
		<div class="input-row">
                	Mother's occupation: <input type="text" class="Mother_Occupation" name="Mother_Occupation" placeholder="Mother's Occupation" required /><br>
		</div>
		<div class="input-row">
                	Mother's Mobile number: <input type="text" pattern="[6789][0-9]{9}" name="Mother_Number" name="Mother_MNo" placeholder="Mother's Mobile number" required/><br>
		</div>
		<div class="input-row">
			Mother's Email address: <input type="text" name="Mother_email" class="Mother_email" placeholder="Mother's Email address" required/><br>
		</div>
		<div class="input-row">
			Mother's Annual Income: <input type="text" name="Mother_AI" class="Mother_AI" placeholder="Mother's Annual Income" required/>
		</div>

		<div class="input-row">
                	Guardian's name: <input type="text" class="Guardian_Name" name="Guardian_Name" placeholder="Guardian's name" /><br>
		</div>
		<div class="input-row">
			Guardian's occupation: <input type="text" class="Guardian_Occupation" name="Guardian_Occupation" placeholder="Guardian's Occupation" /><br>
		</div>
		<div class="input-row">
			Guardian's Mobile number: <input type="text" pattern="[6789][0-9]{9}" name="Guardian_Number" class="Guardian_Number" placeholder="Guardian's Mobile number" /><br>
		</div>
		<div class="input-row">
			Guardian's Email address: <input type="text" name="Guardian_email" class="Guardian_email" placeholder="Guardian's Email address"/><br>
		</div>
		<div class="input-row">
			Guardian's Annual Income: <input type="text" name="Guardian_AI" class="Guardian_AI" placeholder="Guardian's Annual Income"/>
		</div>-->
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
	</div>
	<div class="card" data-step="4">
        <fieldset>
                <h2 class="Title">Step 4</h2>
                <h3 class="Subtitle">Previous Examination Details</h3>
		
                Application for the year: 
			<select id="year" name="AYear" class="Dropdown">
			<option value="2nd">2nd year</option>
			<option value="3rd">3rd year</option>
			</select>
		<div class="input-row">
		<table>
			<th>Semester</th>
			<th>Result Month & Year</th>
			<th>Result</th>
			<th>SGPA</th>
			<tr>
			<td>1st Semester</td>
			<td><input type="month" class="1sem_res" name="1sem_res" required /></td>
			<td><select name="Result" class="Dropdown">
			<option value="Pass">Pass</option>
			<option value="Fail">Fail</option>
			</select></td>
			<td><input type="number"></td>
			</tr>
			<tr>
			<td>2nd Semester</td>
			<td><input type="month" class="2sem_res" name="2sem_res" required /></td>
			<td><select name="Result" class="Dropdown">
			<option value="Pass">Pass</option>
			<option value="Fail">Fail</option>
			</select></td>
			<td><input type="number"></td>
			</tr>
			<tr>
			<td>3rd Semester</td>
			<td><input type="month" class="3sem_res" name="1sem_res" required /></td>
			<td><select name="Result" class="Dropdown">
			<option value="Pass">Pass</option>
			<option value="Fail">Fail</option>
			</select></td>
			<td><input type="number"></td>
			</tr>
			<tr>
			<td>4th Semester</td>
			<td><input type="month" class="4sem_res" name="1sem_res" required /></td>
			<td><select name="Result" class="Dropdown">
			<option value="Pass">Pass</option>
			<option value="Fail">Fail</option>
			</select></td>
			<td><input type="number"></td>
			</tr>
		</table>
		</div>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
		
        </fieldset>
	</div>
	<div class="card" data-step="5">
        <fieldset>
                <h2 class="Title">Step 5</h2>
                <h3 class="Subtitle">Declaration</h3>
		<div class="input-row">
                Scholarship / Fee concession will not be given to students who do not take the class tests / Examination and have shortage of attendance. They will have to pay the fees due to the college otherwise the T.C. will not be given. If a student after taking admission, for any reason leaves the College / takes admission in another College, the same should be informed to the College immediately in writing and requisite fee, if any, will have to be paid.<br>
		</div>
		<div class="input-row">
			
		<input type="checkbox" class="checkbox-container" id="Checkbox">
		<label for="Checkbox">I agree with the terms and conditions</label>
		</div>
		<br><input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" id="nextButton" />
		<script>
			// Checkbox and next button elements
			//const checkbox = document.getElementById('Checkbox');
			//const nextButton = document.getElementById('nextButton');

			//checkbox.addEventListener('change', function() {
			// Enable/disable the next button based on checkbox state
			//nextButton.disabled = !checkbox.checked;
			//});
		</script>
        </fieldset>
	</div>
	<div class="card" data-step="6">
        <fieldset>
                <h2 class="Title">Step 6</h2>
                <h3 class="Subtitle">Fees</h3>
                <main class="main">
			<div class="insights">
				<div class="totalfees">
				<span class="material-symbols-outlined">payments</span>
					<div class="middle">
						<div class="left">
							<h3>Total fees</h3>
							<h1>65000</h1>
						</div>
						
					</div>
					
				</div>

				<div class="totalpaid">
				<span class="material-symbols-outlined">credit_score</span>
					<div class="middle">
						<div class="left">
							<h3>Total Paid</h3>
							<h1>40000</h1>
						</div>
					</div>	
				</div>

				<div class="totalbal">
				<span class="material-symbols-outlined">account_balance_wallet</span>
					<div class="middle">
						<div class="left">
							<h3>Total Balance</h3>
							<h1>25000</h1>
						</div>	
					</div>
					<small class="text-muted">Due on </small>
				</div>
			</div>
		</main>
		<table class="fees">
			<th>Sl. No</th>
			<th>Date</th>
			<th>Transaction ID</th>
			<th>Mode of Payment</th>
			<th>Amount</th>
			<th>Status</th>
			<th>Download Receipt</th>
		</table>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" id="nextButton" />
                
        </fieldset>
	</div>
	<div class="card" data-step="7">
	<fieldset>
                <h2 class="Title">Step 7</h2>
                <h3 class="Subtitle">Documents Upload</h3>
		<h2>DOCUMENTS TO BE SUBMITTED</h2>
		<table class="fees">
			<th>Document</th>
			<th>Upload</th>

			<tr>
				<td>Address proof : copy of Aadhar card</td>
				<td><button>Upload</button></td>
			<tr>
			<tr>
				<td>PAN Card</td>
				<td><button>Upload</button></td>
			<tr>
			<tr>
				<td>Original marks cards of 10th and 12th Std./ PUC</td>
				<td><button>Upload</button></td>
			<tr>
			<tr>
				<td>Original Transfer Certificate of 12th Std. / PUC</td>
				<td><button>Upload</button></td>
			<tr>
			<tr>
				<td>Original Migration Certificate (Only for Non-Karnataka)</td>
				<td><button>Upload</button></td>
			<tr>
			<tr>
				<td>Passport Size Photograph</td>
				<td><button>Upload</button></td>
			<tr>
			<tr>
				<td>Proof of Caste, If other than GM (SC, ST & CAT – I compulsory)</td>
				<td><button>Upload</button></td>
			<tr>
		</table>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<a href="#" class="submit action-button">Submit</a>
        </fieldset>
</div>
</div>
</form>
<script>

const form = document.getElementById('msform');
const fieldsets = form.querySelectorAll('fieldset');
const nextButtons = form.querySelectorAll('.next');
const previousButtons = form.querySelectorAll('.previous');
let currentStep = 0;

function showStep(step) {
  fieldsets.forEach((fieldset, index) => {
    if (index === step) {
      fieldset.classList.add('current');
    } else {
      fieldset.classList.remove('current');
    }
  });
}

function nextStep() {
  if (currentStep < fieldsets.length - 1) {
    currentStep++;
    showStep(currentStep);
  }
}

function previousStep() {
  if (currentStep > 0) {
    currentStep--;
    showStep(currentStep);
  }
}

nextButtons.forEach(button => {
  button.addEventListener('click', nextStep);
});

previousButtons.forEach(button => {
  button.addEventListener('click', previousStep);
});

// Show the first step initially
showStep(currentStep);
</script>
<!--
<script>
        
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

</script>-->
</body>
</html>