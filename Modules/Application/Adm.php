<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Application form</title>
        <link rel="stylesheet" href="adm.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../Dashboard/Stud_Dashboard.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <script src="https://kit.fontawesome.com/3b822bcb84.js" crossorigin="anonymous"></script>
        <script src="adm.js" defer></script>
        <style>
                .card {
                        background-color: white;
                }

                body {
                        background-color: #DDFFFB;
                }

                .home-section1 {
                        position: relative;
                        display: flex;
                        margin-left: 300px;
                        /* align-self:center; */
                        margin-top: 40px;
                        align-items: center;
                        margin-bottom: 40px;
                }

                .required {
                        color: red;
                }
        </style>
</head>

<body onload="initializeDropdowns()">
        
        <div class="container">
                <!-----------------------Multi step form---------------------------------->

                <section class="home-section1">
                        <form data-multi-step class="multi-step-form" method="post" action="process_appln.php" enctype="multipart/form-data">
                                <h1>Application form</h1>
                                <div class="card" data-step>
                                        <h2 class="Title">Step 1</h2>
                                        <h3 class="step-title">Enter your personal details</h3>
                                        <div class="form-group">
                                                <table>
                                                        <tr>
                                                                <td>Name <span class="required">*</span></td>
                                                                <td><input type="text" class="Name" name="Name" id="Name" placeholder="Ex: John Doe" onKeyUp="validateName(this,nameError)" required /></td>
                                                                <td class="valid"><span class="valid" id="name-error"></span></td>
                                                        </tr>
                                                        <tr>
            <td>Course<span class="required">*</span></td>
            <td>
                <select class="dropdown" name="course" id="categoryDropdown">
                    <option value="Select a course">Select a course</option>
                    <option value="Bachelors of Commerce">Bachelors of Commerce(BCom)</option>
                    <option value="Bachelors of Business Administration">Bachelors of Business Administration(BBA)</option>
                    <option value="Bachelors of Computer Applications">Bachelors of Computer Applications(BCA)</option>
                    <option value="Bachelors of Vocational Education">Bachelors of Vocational Education(BVoc)</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Specialisation<span class="required">*</span></td>
            <td>
                <select class="dropdown" name="specialisation" id="subCategoryDropdown">
                    <option value="Select a specialisation">Select a specialisation</option>
                </select>
            </td>
        </tr>
    
<script>
 function initializeDropdowns() {
    var categoryDropdown = document.getElementById("categoryDropdown");
    var subCategoryDropdown = document.getElementById("subCategoryDropdown");

    // Call updateOptions() when the course dropdown selection changes
    categoryDropdown.addEventListener("change", updateOptions);

    function updateOptions() {
        // Clear existing options
        subCategoryDropdown.innerHTML = "";

        // Get selected option from the category dropdown
        var selectedCategory = categoryDropdown.value;

        // Options specific to the selected category
        if (selectedCategory === "Bachelors of Computer Applications") {
            subCategoryDropdown.innerHTML = `
                <option value="Computer Science">Computer Science</option>
            `;
        } else if (selectedCategory === "Bachelors of Commerce") {
            subCategoryDropdown.innerHTML = `
                <option value="Accounting and Finance">Accounting and Finance</option>
            `;
        } else if (selectedCategory === "Bachelors of Business Administration") {
            subCategoryDropdown.innerHTML = `
                <option value="Marketing">Marketing</option>
            `;
        } else if (selectedCategory === "Bachelors of Vocational Education") {
            subCategoryDropdown.innerHTML = `
                <option value="Information Technology">Information Technology</option>
            `;
        }
    }

    // Check if 'ugid' parameter is set in the URL
    var urlParams = new URLSearchParams(window.location.search);
    var ugname = urlParams.get('ugid');
    if (ugname) {
        // Split the 'ugid' parameter to extract course and specialization
        var array = ugname.split(' - ');
        var course = array[0];
        var specialisation = array[1];

        // Set the selected options based on the 'ugid' parameter
        categoryDropdown.value = course;
        subCategoryDropdown.value = specialisation;
        updateOptions();
    } else {
        // If 'ugid' parameter is not set, update the specialization options based on the initial course selection
        updateOptions();
    }
}

</script>  
                                                        <tr>
                                                                <td>Email Address <span class="required">*</span></td>
                                                                <td><input type="email" class="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" onKeyUp="validateEmail(this,emailError)" required /></td>
                                                                <td class="valid"><span class="valid" id="email-error"></span></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Date of Birth<span class="required">*</span></td>
                                                                <td><input type="date" class="DOB" name="DOB" min="1978-01-01" max="2003-01-01" required /></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Nationality<span class="required">*</span></td>
                                                                <td><input type="text" class="Nationality" name="Nationality" placeholder="Nationality" onKeyUp="validateName(this,nationalityError)" required /></td>
                                                                <td class="valid"><span class="valid" id="nationality-error"></span></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Community/Religion</td>
                                                                <td><select id="religion" class="Community" name="Community" onchange="updateCaste()">
                                                                                <option value="">Select a religion</option>
                                                                                <option value="Christianity">Christianity</option>
                                                                                <option value="Islam">Islam</option>
                                                                                <option value="Hinduism">Hinduism</option>
                                                                                <option value="Buddhism">Buddhism</option>
                                                                                <option value="Sikhism">Sikhism</option>
                                                                                <option value="Judaism">Judaism</option>
                                                                                <option value="Bahai">Bahá'í Faith</option>
                                                                                <option value="Jainism">Jainism</option>
                                                                                <option value="Shinto">Shinto</option>
                                                                                <option value="Taoism">Taoism</option>
                                                                                <option value="Zoroastrianism">Zoroastrianism</option>
                                                                                <option value="African Traditional Religions">African Traditional Religions</option>
                                                                                <option value="Indigenous/Native Religions">Indigenous/Native Religions</option>
                                                                                <option value="Animism">Animism</option>
                                                                                <option value="Rastafari">Rastafari</option>
                                                                                <option value="Spiritism">Spiritism</option>
                                                                                <option value="Cao Dai">Cao Dai</option>
                                                                                <option value="Tenrikyo">Tenrikyo</option>
                                                                                <option value="Unitarian Universalism">Unitarian Universalism</option>
                                                                                <option value="Scientology">Scientology</option>
                                                                                <option value="Eckankar">Eckankar</option>
                                                                                <option value="Wicca">Wicca</option>
                                                                                <option value="Asatru">Asatru</option>
                                                                                <option value="Druidry">Druidry</option>
                                                                                <option value="New Age Spirituality">New Age Spirituality</option>
                                                                        </select>
                                                                </td>
                                                                <td class="valid"><span class="valid" id="community-error"></span></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Caste</td>
                                                                <td>
                                                                        <select id="caste" class="Caste" name="Caste">
                                                                                <!-- Default caste options -->
                                                                                <option value="default">Select a religion first</option>
                                                                        </select>
                                                                </td>
                                                                <td class="valid"><span class="valid" id="caste-error"></span></td>
                                                        </tr>
                                                        <script>
                                                                function updateCaste() {
                                                                        // Get the selected religion
                                                                        var selectedReligion = document.getElementById("religion").value;
                                                                        var casteDropdown = document.getElementById("caste");

                                                                        // Clear previous caste options
                                                                        casteDropdown.innerHTML = "";

                                                                        if (selectedReligion === "Hinduism") {
                                                                                casteDropdown.innerHTML = `
                                <option value="Brahmin">Brahmin</option>
                            <option value="Kshatriya">Kshatriya</option>
                            <option value="Vaishya">Vaishya</option>
                            <option value="Shudra">Shudra</option>
                            `;
                                                                        } else if (selectedReligion === "Islam") {

                                                                                casteDropdown.innerHTML = `
                                <option value="Sunni">Sunni</option>
                                <option value="Shia">Shia</option>
                            <option value="Sufism">Sufism</option>
                            `;
                                                                        } else if (selectedReligion === "Christianity") {

                                                                                casteDropdown.innerHTML = `
                                <option value="Catholicism">Catholicism</option>
                                <option value="Protestantism">Protestantism</option>
                            <option value="Eastern Orthodox">Eastern Orthodox</option>
                            `;
                                                                        } else if (selectedReligion === "Judaism") {

                                                                                casteDropdown.innerHTML = `
                                <option value="Ashkenazi Jews">Ashkenazi Jews</option>
                                <option value="Sephardic Jews">Sephardic Jews</option>
                            <option value="Mizrahi Jews">Mizrahi Jews</option>
                            `;
                                                                        } else if (selectedReligion === "Sikhism") {

                                                                                casteDropdown.innerHTML = `
                                <option value="Khatri">Khatri</option>
                                <option value="Jatt">Jatt</option>
                            <option value="Ramgharia">Ramgharia</option>
                            `;
                                                                        } else if (selectedReligion === "Buddhism") {

                                                                                casteDropdown.innerHTML = `
                                <option value="Theravada Buddhism">Theravada Buddhism</option>
                                <option value="Mahayana Buddhism">Mahayana Buddhism</option>
                            <option value="Vajrayana Buddhism">Vajrayana Buddhism</option>
                            `;
                                                                        } else if (selectedReligion === "Jainism") {

                                                                                casteDropdown.innerHTML = `
                                <option value="Digambara">Digambara</option>
                                <option value="Shvetambara">Shvetambara</option>
                           
                            `;
                                                                        }

                                                                        casteDropdown.selectedIndex = 0;
                                                                }
                                                        </script>
                                                        <tr>
                                                                <td>Category </td>
                                                                <td><input type="text" class="Category" name="Category" placeholder="Ex:1A" onKeyUp="validateCat(this,categoryError)" maxlength="5" /></td>
                                                                <td class="valid"><span class="valid" id="category-error"></span></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Aadhar number </td>
                                                                <td>
                                                                        <input type="text" name="Aadhar" class="Aadhar" id="Aadhar" placeholder="Aadhar number" maxlength="12" onKeyUp="validateAadhar(this,aadharError)" />
                                                                <td class="valid"><span class="valid" id="aadhar-error"></span></td>
                                                                </td>
                                                        </tr>

                                                        <tr>
                                                                <td>Passport Number</td>
                                                                <td>
                                                                        <input type="text" name="Passport" class="Passport" id="Passport" placeholder="Passport Number" maxlength="9" onKeyUp="validatePassport(this,passportError)" />
                                                                <td class="valid"><span class="valid" id="passport-error"></span></td>
                                                                </td>
                                                        </tr>
                                                        <!-- <script>
                        function isValid_Aadhaar_Number(Aadhar) {
                            let aadharp = "/^[2-9]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}$/";
                            if (aadharp.test(Aadhar) === true) {
                                alert("Aadhar correct");
                            } else {
                                alert("Enter valid Aadhar number");
                            }
                        }
                        
                        document.getElementById("btnNext").addEventListener("click", function(event) {
                            event.preventDefault(); 
                            let AadharInput = document.getElementById("Aadhar");
                            isValid_Aadhaar_Number(AadharInput.value);
                        });
                    </script> -->

                                                        <tr>
                                                                <td>PAN number </td>
                                                                <td><input type="text" name="PAN" class="PAN" id="PAN" placeholder="PAN number" onKeyUp="validatePan(this,panError)" maxlength="10" /></td>
                                                                <td class="valid"><span class="valid" id="pan-error"></span></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Blood group <span class="required">*</span></td>
                                                                <td><select name="BloodGroup" class="Dropdown" required>
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
                                                                <td class="valid"><span class="valid" id="blood-error"></span></td>
                                                        </tr>

                                                </table>
                                                <!-- <div align="center">
                <button type="button" data-next class="btn btn-success" id="btnNext">Next</button></div>
        </div> -->
                                        </div>
                                </div>
                                <div class="card" data-step>
                                        <h2 class="Title">Step 2</h2>
                                        <h3 class="step-title">Contact Information</h3>
                                        <div class="form-group">
                                                <table>
                                                        <tr>
                                                                <td>Mobile number <span class="required">*</span></td>
                                                                <td><!-- Country names and Phone Code -->
                                                                        <select class="form-select" id="Phone" name="Phone" required>
                                                                                <option value="">Select Country code</option>
                                                                                <option value="93">Afghanistan +93</option>
                                                                                <option value="358">Aland Islands +358</option>
                                                                                <option value="355">Albania +355</option>
                                                                                <option value="213">Algeria +213</option>
                                                                                <option value="1684">American Samoa +1684</option>
                                                                                <option value="376">Andorra +376</option>
                                                                                <option value="244">Angola +244</option>
                                                                                <option value="1264">Anguilla +1264</option>
                                                                                <option value="672">Antarctica +672</option>
                                                                                <option value="1268">Antigua and Barbuda +1268</option>
                                                                                <option value="54">Argentina +54</option>
                                                                                <option value="374">Armenia +374</option>
                                                                                <option value="297">Aruba +297</option>
                                                                                <option value="61">Australia +61</option>
                                                                                <option value="43">Austria +43</option>
                                                                                <option value="994">Azerbaijan +994</option>
                                                                                <option value="1242">Bahamas +1242</option>
                                                                                <option value="973">Bahrain +973</option>
                                                                                <option value="880">Bangladesh +880</option>
                                                                                <option value="1246">Barbados +1246</option>
                                                                                <option value="375">Belarus +375</option>
                                                                                <option value="32">Belgium +32</option>
                                                                                <option value="501">Belize +501</option>
                                                                                <option value="229">Benin +229</option>
                                                                                <option value="1441">Bermuda +1441</option>
                                                                                <option value="975">Bhutan +975</option>
                                                                                <option value="591">Bolivia +591</option>
                                                                                <option value="599">Bonaire, Sint Eustatius and Saba +599</option>
                                                                                <option value="387">Bosnia and Herzegovina +387</option>
                                                                                <option value="267">Botswana +267</option>
                                                                                <option value="55">Bouvet Island +55</option>
                                                                                <option value="55">Brazil +55</option>
                                                                                <option value="246">British Indian Ocean Territory +246</option>
                                                                                <option value="673">Brunei Darussalam +673</option>
                                                                                <option value="359">Bulgaria +359</option>
                                                                                <option value="226">Burkina Faso +226</option>
                                                                                <option value="257">Burundi +257</option>
                                                                                <option value="855">Cambodia +855</option>
                                                                                <option value="237">Cameroon +237</option>
                                                                                <option value="1">Canada +1</option>
                                                                                <option value="238">Cape Verde +238</option>
                                                                                <option value="1345">Cayman Islands +1345</option>
                                                                                <option value="236">Central African Republic +236</option>
                                                                                <option value="235">Chad +235</option>
                                                                                <option value="56">Chile +56</option>
                                                                                <option value="86">China +86</option>
                                                                                <option value="61">Christmas Island +61</option>
                                                                                <option value="672">Cocos (Keeling) Islands +672</option>
                                                                                <option value="57">Colombia +57</option>
                                                                                <option value="269">Comoros +269</option>
                                                                                <option value="242">Congo +242</option>
                                                                                <option value="242">Congo, Democratic Republic of the Congo +242</option>
                                                                                <option value="682">Cook Islands +682</option>
                                                                                <option value="506">Costa Rica +506</option>
                                                                                <option value="225">Cote D'Ivoire +225</option>
                                                                                <option value="385">Croatia +385</option>
                                                                                <option value="53">Cuba +53</option>
                                                                                <option value="599">Curacao +599</option>
                                                                                <option value="357">Cyprus +357</option>
                                                                                <option value="420">Czech Republic +420</option>
                                                                                <option value="45">Denmark +45</option>
                                                                                <option value="253">Djibouti +253</option>
                                                                                <option value="1767">Dominica +1767</option>
                                                                                <option value="1809">Dominican Republic +1809</option>
                                                                                <option value="593">Ecuador +593</option>
                                                                                <option value="20">Egypt +20</option>
                                                                                <option value="503">El Salvador +503</option>
                                                                                <option value="240">Equatorial Guinea +240</option>
                                                                                <option value="291">Eritrea +291</option>
                                                                                <option value="372">Estonia +372</option>
                                                                                <option value="251">Ethiopia +251</option>
                                                                                <option value="500">Falkland Islands (Malvinas) +500</option>
                                                                                <option value="298">Faroe Islands +298</option>
                                                                                <option value="679">Fiji +679</option>
                                                                                <option value="358">Finland +358</option>
                                                                                <option value="33">France +33</option>
                                                                                <option value="594">French Guiana +594</option>
                                                                                <option value="689">French Polynesia +689</option>
                                                                                <option value="262">French Southern Territories +262</option>
                                                                                <option value="241">Gabon +241</option>
                                                                                <option value="220">Gambia +220</option>
                                                                                <option value="995">Georgia +995</option>
                                                                                <option value="49">Germany +49</option>
                                                                                <option value="233">Ghana +233</option>
                                                                                <option value="350">Gibraltar +350</option>
                                                                                <option value="30">Greece +30</option>
                                                                                <option value="299">Greenland +299</option>
                                                                                <option value="1473">Grenada +1473</option>
                                                                                <option value="590">Guadeloupe +590</option>
                                                                                <option value="1671">Guam +1671</option>
                                                                                <option value="502">Guatemala +502</option>
                                                                                <option value="44">Guernsey +44</option>
                                                                                <option value="224">Guinea +224</option>
                                                                                <option value="245">Guinea-Bissau +245</option>
                                                                                <option value="592">Guyana +592</option>
                                                                                <option value="509">Haiti +509</option>
                                                                                <option value="39">Holy See (Vatican City State) +39</option>
                                                                                <option value="504">Honduras +504</option>
                                                                                <option value="852">Hong Kong +852</option>
                                                                                <option value="36">Hungary +36</option>
                                                                                <option value="354">Iceland +354</option>
                                                                                <option value="91">India +91</option>
                                                                                <option value="62">Indonesia +62</option>
                                                                                <option value="98">Iran, Islamic Republic of +98</option>
                                                                                <option value="964">Iraq +964</option>
                                                                                <option value="353">Ireland +353</option>
                                                                                <option value="44">Isle of Man +44</option>
                                                                                <option value="972">Israel +972</option>
                                                                                <option value="39">Italy +39</option>
                                                                                <option value="1876">Jamaica +1876</option>
                                                                                <option value="81">Japan +81</option>
                                                                                <option value="44">Jersey +44</option>
                                                                                <option value="962">Jordan +962</option>
                                                                                <option value="7">Kazakhstan +7</option>
                                                                                <option value="254">Kenya +254</option>
                                                                                <option value="686">Kiribati +686</option>
                                                                                <option value="850">Korea, Democratic People's Republic of +850</option>
                                                                                <option value="82">Korea, Republic of +82</option>
                                                                                <option value="383">Kosovo +383</option>
                                                                                <option value="965">Kuwait +965</option>
                                                                                <option value="996">Kyrgyzstan +996</option>
                                                                                <option value="856">Lao People's Democratic Republic +856</option>
                                                                                <option value="371">Latvia +371</option>
                                                                                <option value="961">Lebanon +961</option>
                                                                                <option value="266">Lesotho +266</option>
                                                                                <option value="231">Liberia +231</option>
                                                                                <option value="218">Libyan Arab Jamahiriya +218</option>
                                                                                <option value="423">Liechtenstein +423</option>
                                                                                <option value="370">Lithuania +370</option>
                                                                                <option value="352">Luxembourg +352</option>
                                                                                <option value="853">Macao +853</option>
                                                                                <option value="389">Macedonia, the Former Yugoslav Republic of +389</option>
                                                                                <option value="261">Madagascar +261</option>
                                                                                <option value="265">Malawi +265</option>
                                                                                <option value="60">Malaysia +60</option>
                                                                                <option value="960">Maldives +960</option>
                                                                                <option value="223">Mali +223</option>
                                                                                <option value="356">Malta +356</option>
                                                                                <option value="692">Marshall Islands +692</option>
                                                                                <option value="596">Martinique +596</option>
                                                                                <option value="222">Mauritania +222</option>
                                                                                <option value="230">Mauritius +230</option>
                                                                                <option value="262">Mayotte +262</option>
                                                                                <option value="52">Mexico +52</option>
                                                                                <option value="691">Micronesia, Federated States of +691</option>
                                                                                <option value="373">Moldova, Republic of +373</option>
                                                                                <option value="377">Monaco +377</option>
                                                                                <option value="976">Mongolia +976</option>
                                                                                <option value="382">Montenegro +382</option>
                                                                                <option value="1664">Montserrat +1664</option>
                                                                                <option value="212">Morocco +212</option>
                                                                                <option value="258">Mozambique +258</option>
                                                                                <option value="95">Myanmar +95</option>
                                                                                <option value="264">Namibia +264</option>
                                                                                <option value="674">Nauru +674</option>
                                                                                <option value="977">Nepal +977</option>
                                                                                <option value="31">Netherlands +31</option>
                                                                                <option value="599">Netherlands Antilles +599</option>
                                                                                <option value="687">New Caledonia +687</option>
                                                                                <option value="64">New Zealand +64</option>
                                                                                <option value="505">Nicaragua +505</option>
                                                                                <option value="227">Niger +227</option>
                                                                                <option value="234">Nigeria +234</option>
                                                                                <option value="683">Niue +683</option>
                                                                                <option value="672">Norfolk Island +672</option>
                                                                                <option value="1670">Northern Mariana Islands +1670</option>
                                                                                <option value="47">Norway +47</option>
                                                                                <option value="968">Oman +968</option>
                                                                                <option value="92">Pakistan +92</option>
                                                                                <option value="680">Palau +680</option>
                                                                                <option value="970">Palestinian Territory, Occupied +970</option>
                                                                                <option value="507">Panama +507</option>
                                                                                <option value="675">Papua New Guinea +675</option>
                                                                                <option value="595">Paraguay +595</option>
                                                                                <option value="51">Peru +51</option>
                                                                                <option value="63">Philippines +63</option>
                                                                                <option value="64">Pitcairn +64</option>
                                                                                <option value="48">Poland +48</option>
                                                                                <option value="351">Portugal +351</option>
                                                                                <option value="1787">Puerto Rico +1787</option>
                                                                                <option value="974">Qatar +974</option>
                                                                                <option value="262">Reunion +262</option>
                                                                                <option value="40">Romania +40</option>
                                                                                <option value="7">Russian Federation +7</option>
                                                                                <option value="250">Rwanda +250</option>
                                                                                <option value="590">Saint Barthelemy +590</option>
                                                                                <option value="290">Saint Helena +290</option>
                                                                                <option value="1869">Saint Kitts and Nevis +1869</option>
                                                                                <option value="1758">Saint Lucia +1758</option>
                                                                                <option value="590">Saint Martin +590</option>
                                                                                <option value="508">Saint Pierre and Miquelon +508</option>
                                                                                <option value="1784">Saint Vincent and the Grenadines +1784</option>
                                                                                <option value="684">Samoa +684</option>
                                                                                <option value="378">San Marino +378</option>
                                                                                <option value="239">Sao Tome and Principe +239</option>
                                                                                <option value="966">Saudi Arabia +966</option>
                                                                                <option value="221">Senegal +221</option>
                                                                                <option value="381">Serbia +381</option>
                                                                                <option value="381">Serbia and Montenegro +381</option>
                                                                                <option value="248">Seychelles +248</option>
                                                                                <option value="232">Sierra Leone +232</option>
                                                                                <option value="65">Singapore +65</option>
                                                                                <option value="721">Sint Maarten +721</option>
                                                                                <option value="421">Slovakia +421</option>
                                                                                <option value="386">Slovenia +386</option>
                                                                                <option value="677">Solomon Islands +677</option>
                                                                                <option value="252">Somalia +252</option>
                                                                                <option value="27">South Africa +27</option>
                                                                                <option value="500">South Georgia and the South Sandwich Islands +500</option>
                                                                                <option value="211">South Sudan +211</option>
                                                                                <option value="34">Spain +34</option>
                                                                                <option value="94">Sri Lanka +94</option>
                                                                                <option value="249">Sudan +249</option>
                                                                                <option value="597">Suriname +597</option>
                                                                                <option value="47">Svalbard and Jan Mayen +47</option>
                                                                                <option value="268">Swaziland +268</option>
                                                                                <option value="46">Sweden +46</option>
                                                                                <option value="41">Switzerland +41</option>
                                                                                <option value="963">Syrian Arab Republic +963</option>
                                                                                <option value="886">Taiwan, Province of China +886</option>
                                                                                <option value="992">Tajikistan +992</option>
                                                                                <option value="255">Tanzania, United Republic of +255</option>
                                                                                <option value="66">Thailand +66</option>
                                                                                <option value="670">Timor-Leste +670</option>
                                                                                <option value="228">Togo +228</option>
                                                                                <option value="690">Tokelau +690</option>
                                                                                <option value="676">Tonga +676</option>
                                                                                <option value="1868">Trinidad and Tobago +1868</option>
                                                                                <option value="216">Tunisia +216</option>
                                                                                <option value="90">Turkey +90</option>
                                                                                <option value="7370">Turkmenistan +7370</option>
                                                                                <option value="1649">Turks and Caicos Islands +1649</option>
                                                                                <option value="688">Tuvalu +688</option>
                                                                                <option value="256">Uganda +256</option>
                                                                                <option value="380">Ukraine +380</option>
                                                                                <option value="971">United Arab Emirates +971</option>
                                                                                <option value="44">United Kingdom +44</option>
                                                                                <option value="1">United States +1</option>
                                                                                <option value="1">United States Minor Outlying Islands +1</option>
                                                                                <option value="598">Uruguay +598</option>
                                                                                <option value="998">Uzbekistan +998</option>
                                                                                <option value="678">Vanuatu +678</option>
                                                                                <option value="58">Venezuela +58</option>
                                                                                <option value="84">Viet Nam +84</option>
                                                                                <option value="1284">Virgin Islands, British +1284</option>
                                                                                <option value="1340">Virgin Islands, U.s. +1340</option>
                                                                                <option value="681">Wallis and Futuna +681</option>
                                                                                <option value="212">Western Sahara +212</option>
                                                                                <option value="967">Yemen +967</option>
                                                                                <option value="260">Zambia +260</option>
                                                                                <option value="263">Zimbabwe +263</option>
                                                                        </select>
                                                                        <input type="text" class="MNo" name="Phone" placeholder="Mobile number" onkeyup="validatePhone(this,phoneError)" maxlength="10" />
                                                                <td class="valid"><span class="valid" id="phone-error"></span></td>

                                                        </tr>

                                                        <tr>
                                                                <td>Residential Address <span class="required">*</span></td>
                                                                <td><textarea name="Address" class="Address" placeholder="Address" onkeyup="validateAddress(this,addressError)" required></textarea></td>
                                                                <td class="valid"><span class="valid" id="address-error"></span></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Country <span class="required">*</span></td>
                                                                <td><select class="form-select" id="Country" name="Country" onchange="updateOptions()" required>
                                                                                <option>Select your Country</option>
                                                                                <option value="AF">Afghanistan</option>
                                                                                <option value="AX">Aland Islands</option>
                                                                                <option value="AL">Albania</option>
                                                                                <option value="DZ">Algeria</option>
                                                                                <option value="AS">American Samoa</option>
                                                                                <option value="AD">Andorra</option>
                                                                                <option value="AO">Angola</option>
                                                                                <option value="AI">Anguilla</option>
                                                                                <option value="AQ">Antarctica</option>
                                                                                <option value="AG">Antigua and Barbuda</option>
                                                                                <option value="AR">Argentina</option>
                                                                                <option value="AM">Armenia</option>
                                                                                <option value="AW">Aruba</option>
                                                                                <option value="AU">Australia</option>
                                                                                <option value="AT">Austria</option>
                                                                                <option value="AZ">Azerbaijan</option>
                                                                                <option value="BS">Bahamas</option>
                                                                                <option value="BH">Bahrain</option>
                                                                                <option value="BD">Bangladesh</option>
                                                                                <option value="BB">Barbados</option>
                                                                                <option value="BY">Belarus</option>
                                                                                <option value="BE">Belgium</option>
                                                                                <option value="BZ">Belize</option>
                                                                                <option value="BJ">Benin</option>
                                                                                <option value="BM">Bermuda</option>
                                                                                <option value="BT">Bhutan</option>
                                                                                <option value="BO">Bolivia</option>
                                                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                                                <option value="BA">Bosnia and Herzegovina</option>
                                                                                <option value="BW">Botswana</option>
                                                                                <option value="BV">Bouvet Island</option>
                                                                                <option value="BR">Brazil</option>
                                                                                <option value="IO">British Indian Ocean Territory</option>
                                                                                <option value="BN">Brunei Darussalam</option>
                                                                                <option value="BG">Bulgaria</option>
                                                                                <option value="BF">Burkina Faso</option>
                                                                                <option value="BI">Burundi</option>
                                                                                <option value="KH">Cambodia</option>
                                                                                <option value="CM">Cameroon</option>
                                                                                <option value="CA">Canada</option>
                                                                                <option value="CV">Cape Verde</option>
                                                                                <option value="KY">Cayman Islands</option>
                                                                                <option value="CF">Central African Republic</option>
                                                                                <option value="TD">Chad</option>
                                                                                <option value="CL">Chile</option>
                                                                                <option value="CN">China</option>
                                                                                <option value="CX">Christmas Island</option>
                                                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                                                <option value="CO">Colombia</option>
                                                                                <option value="KM">Comoros</option>
                                                                                <option value="CG">Congo</option>
                                                                                <option value="CD">Congo, Democratic Republic of the Congo</option>
                                                                                <option value="CK">Cook Islands</option>
                                                                                <option value="CR">Costa Rica</option>
                                                                                <option value="CI">Cote D'Ivoire</option>
                                                                                <option value="HR">Croatia</option>
                                                                                <option value="CU">Cuba</option>
                                                                                <option value="CW">Curacao</option>
                                                                                <option value="CY">Cyprus</option>
                                                                                <option value="CZ">Czech Republic</option>
                                                                                <option value="DK">Denmark</option>
                                                                                <option value="DJ">Djibouti</option>
                                                                                <option value="DM">Dominica</option>
                                                                                <option value="DO">Dominican Republic</option>
                                                                                <option value="EC">Ecuador</option>
                                                                                <option value="EG">Egypt</option>
                                                                                <option value="SV">El Salvador</option>
                                                                                <option value="GQ">Equatorial Guinea</option>
                                                                                <option value="ER">Eritrea</option>
                                                                                <option value="EE">Estonia</option>
                                                                                <option value="ET">Ethiopia</option>
                                                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                                                <option value="FO">Faroe Islands</option>
                                                                                <option value="FJ">Fiji</option>
                                                                                <option value="FI">Finland</option>
                                                                                <option value="FR">France</option>
                                                                                <option value="GF">French Guiana</option>
                                                                                <option value="PF">French Polynesia</option>
                                                                                <option value="TF">French Southern Territories</option>
                                                                                <option value="GA">Gabon</option>
                                                                                <option value="GM">Gambia</option>
                                                                                <option value="GE">Georgia</option>
                                                                                <option value="DE">Germany</option>
                                                                                <option value="GH">Ghana</option>
                                                                                <option value="GI">Gibraltar</option>
                                                                                <option value="GR">Greece</option>
                                                                                <option value="GL">Greenland</option>
                                                                                <option value="GD">Grenada</option>
                                                                                <option value="GP">Guadeloupe</option>
                                                                                <option value="GU">Guam</option>
                                                                                <option value="GT">Guatemala</option>
                                                                                <option value="GG">Guernsey</option>
                                                                                <option value="GN">Guinea</option>
                                                                                <option value="GW">Guinea-Bissau</option>
                                                                                <option value="GY">Guyana</option>
                                                                                <option value="HT">Haiti</option>
                                                                                <option value="HM">Heard Island and Mcdonald Islands</option>
                                                                                <option value="VA">Holy See (Vatican City State)</option>
                                                                                <option value="HN">Honduras</option>
                                                                                <option value="HK">Hong Kong</option>
                                                                                <option value="HU">Hungary</option>
                                                                                <option value="IS">Iceland</option>
                                                                                <option value="IN">India</option>
                                                                                <option value="ID">Indonesia</option>
                                                                                <option value="IR">Iran, Islamic Republic of</option>
                                                                                <option value="IQ">Iraq</option>
                                                                                <option value="IE">Ireland</option>
                                                                                <option value="IM">Isle of Man</option>
                                                                                <option value="IL">Israel</option>
                                                                                <option value="IT">Italy</option>
                                                                                <option value="JM">Jamaica</option>
                                                                                <option value="JP">Japan</option>
                                                                                <option value="JE">Jersey</option>
                                                                                <option value="JO">Jordan</option>
                                                                                <option value="KZ">Kazakhstan</option>
                                                                                <option value="KE">Kenya</option>
                                                                                <option value="KI">Kiribati</option>
                                                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                                                <option value="KR">Korea, Republic of</option>
                                                                                <option value="XK">Kosovo</option>
                                                                                <option value="KW">Kuwait</option>
                                                                                <option value="KG">Kyrgyzstan</option>
                                                                                <option value="LA">Lao People's Democratic Republic</option>
                                                                                <option value="LV">Latvia</option>
                                                                                <option value="LB">Lebanon</option>
                                                                                <option value="LS">Lesotho</option>
                                                                                <option value="LR">Liberia</option>
                                                                                <option value="LY">Libyan Arab Jamahiriya</option>
                                                                                <option value="LI">Liechtenstein</option>
                                                                                <option value="LT">Lithuania</option>
                                                                                <option value="LU">Luxembourg</option>
                                                                                <option value="MO">Macao</option>
                                                                                <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                                                                <option value="MG">Madagascar</option>
                                                                                <option value="MW">Malawi</option>
                                                                                <option value="MY">Malaysia</option>
                                                                                <option value="MV">Maldives</option>
                                                                                <option value="ML">Mali</option>
                                                                                <option value="MT">Malta</option>
                                                                                <option value="MH">Marshall Islands</option>
                                                                                <option value="MQ">Martinique</option>
                                                                                <option value="MR">Mauritania</option>
                                                                                <option value="MU">Mauritius</option>
                                                                                <option value="YT">Mayotte</option>
                                                                                <option value="MX">Mexico</option>
                                                                                <option value="FM">Micronesia, Federated States of</option>
                                                                                <option value="MD">Moldova, Republic of</option>
                                                                                <option value="MC">Monaco</option>
                                                                                <option value="MN">Mongolia</option>
                                                                                <option value="ME">Montenegro</option>
                                                                                <option value="MS">Montserrat</option>
                                                                                <option value="MA">Morocco</option>
                                                                                <option value="MZ">Mozambique</option>
                                                                                <option value="MM">Myanmar</option>
                                                                                <option value="NA">Namibia</option>
                                                                                <option value="NR">Nauru</option>
                                                                                <option value="NP">Nepal</option>
                                                                                <option value="NL">Netherlands</option>
                                                                                <option value="AN">Netherlands Antilles</option>
                                                                                <option value="NC">New Caledonia</option>
                                                                                <option value="NZ">New Zealand</option>
                                                                                <option value="NI">Nicaragua</option>
                                                                                <option value="NE">Niger</option>
                                                                                <option value="NG">Nigeria</option>
                                                                                <option value="NU">Niue</option>
                                                                                <option value="NF">Norfolk Island</option>
                                                                                <option value="MP">Northern Mariana Islands</option>
                                                                                <option value="NO">Norway</option>
                                                                                <option value="OM">Oman</option>
                                                                                <option value="PK">Pakistan</option>
                                                                                <option value="PW">Palau</option>
                                                                                <option value="PS">Palestinian Territory, Occupied</option>
                                                                                <option value="PA">Panama</option>
                                                                                <option value="PG">Papua New Guinea</option>
                                                                                <option value="PY">Paraguay</option>
                                                                                <option value="PE">Peru</option>
                                                                                <option value="PH">Philippines</option>
                                                                                <option value="PN">Pitcairn</option>
                                                                                <option value="PL">Poland</option>
                                                                                <option value="PT">Portugal</option>
                                                                                <option value="PR">Puerto Rico</option>
                                                                                <option value="QA">Qatar</option>
                                                                                <option value="RE">Reunion</option>
                                                                                <option value="RO">Romania</option>
                                                                                <option value="RU">Russian Federation</option>
                                                                                <option value="RW">Rwanda</option>
                                                                                <option value="BL">Saint Barthelemy</option>
                                                                                <option value="SH">Saint Helena</option>
                                                                                <option value="KN">Saint Kitts and Nevis</option>
                                                                                <option value="LC">Saint Lucia</option>
                                                                                <option value="MF">Saint Martin</option>
                                                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                                                <option value="WS">Samoa</option>
                                                                                <option value="SM">San Marino</option>
                                                                                <option value="ST">Sao Tome and Principe</option>
                                                                                <option value="SA">Saudi Arabia</option>
                                                                                <option value="SN">Senegal</option>
                                                                                <option value="RS">Serbia</option>
                                                                                <option value="CS">Serbia and Montenegro</option>
                                                                                <option value="SC">Seychelles</option>
                                                                                <option value="SL">Sierra Leone</option>
                                                                                <option value="SG">Singapore</option>
                                                                                <option value="SX">Sint Maarten</option>
                                                                                <option value="SK">Slovakia</option>
                                                                                <option value="SI">Slovenia</option>
                                                                                <option value="SB">Solomon Islands</option>
                                                                                <option value="SO">Somalia</option>
                                                                                <option value="ZA">South Africa</option>
                                                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                                                <option value="SS">South Sudan</option>
                                                                                <option value="ES">Spain</option>
                                                                                <option value="LK">Sri Lanka</option>
                                                                                <option value="SD">Sudan</option>
                                                                                <option value="SR">Suriname</option>
                                                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                                                <option value="SZ">Swaziland</option>
                                                                                <option value="SE">Sweden</option>
                                                                                <option value="CH">Switzerland</option>
                                                                                <option value="SY">Syrian Arab Republic</option>
                                                                                <option value="TW">Taiwan, Province of China</option>
                                                                                <option value="TJ">Tajikistan</option>
                                                                                <option value="TZ">Tanzania, United Republic of</option>
                                                                                <option value="TH">Thailand</option>
                                                                                <option value="TL">Timor-Leste</option>
                                                                                <option value="TG">Togo</option>
                                                                                <option value="TK">Tokelau</option>
                                                                                <option value="TO">Tonga</option>
                                                                                <option value="TT">Trinidad and Tobago</option>
                                                                                <option value="TN">Tunisia</option>
                                                                                <option value="TR">Turkey</option>
                                                                                <option value="TM">Turkmenistan</option>
                                                                                <option value="TC">Turks and Caicos Islands</option>
                                                                                <option value="TV">Tuvalu</option>
                                                                                <option value="UG">Uganda</option>
                                                                                <option value="UA">Ukraine</option>
                                                                                <option value="AE">United Arab Emirates</option>
                                                                                <option value="GB">United Kingdom</option>
                                                                                <option value="US">United States</option>
                                                                                <option value="UM">United States Minor Outlying Islands</option>
                                                                                <option value="UY">Uruguay</option>
                                                                                <option value="UZ">Uzbekistan</option>
                                                                                <option value="VU">Vanuatu</option>
                                                                                <option value="VE">Venezuela</option>
                                                                                <option value="VN">Viet Nam</option>
                                                                                <option value="VG">Virgin Islands, British</option>
                                                                                <option value="VI">Virgin Islands, U.s.</option>
                                                                                <option value="WF">Wallis and Futuna</option>
                                                                                <option value="EH">Western Sahara</option>
                                                                                <option value="YE">Yemen</option>
                                                                                <option value="ZM">Zambia</option>
                                                                                <option value="ZW">Zimbabwe</option>
                                                                        </select></td>
                                                        </tr>

                                                        <tr>
                                                                <td>State <span class="required">*</span></td>
                                                                <td>
                                                                        <select id="country-state" name="country-state" class="country-state" required>
                                                                                <option value="Select a state">Select a state</option>
                                                                        </select>
                                                                </td>

                                                        </tr>

                                                        <script>
                                                                document.getElementById("Country").addEventListener("change", updateOptions);

                                                                function updateOptions() {
                                                                        var countryDropDown = document.getElementById("Country");
                                                                        var stateDropDown = document.getElementById("country-state");
                                                                        var selectedCountry = countryDropDown.value;

                                                                        // Clear existing options
                                                                        stateDropDown.innerHTML = '<option value="">Select a state</option>';

                                                                        if (selectedCountry === "IN") {
                                                                                // Fetch states for India from a data source or API
                                                                                stateDropDown.innerHTML = `
                                <option value="AN">Andaman and Nicobar Islands</option>
                            <option value="AP">Andhra Pradesh</option>
                            <option value="AR">Arunachal Pradesh</option>
                            <option value="AS">Assam</option>
                            <option value="BR">Bihar</option>
                            <option value="CH">Chandigarh</option>
                            <option value="CT">Chhattisgarh</option>
                            <option value="DN">Dadra and Nagar Haveli</option>
                            <option value="DD">Daman and Diu</option>
                            <option value="DL">Delhi</option>
                            <option value="GA">Goa</option>
                            <option value="GJ">Gujarat</option>
                            <option value="HR">Haryana</option>
                            <option value="HP">Himachal Pradesh</option>
                            <option value="JK">Jammu and Kashmir</option>
                            <option value="JH">Jharkhand</option>
                            <option value="KA">Karnataka</option>
                            <option value="KL">Kerala</option>
                            <option value="LA">Ladakh</option>
                            <option value="LD">Lakshadweep</option>
                            <option value="MP">Madhya Pradesh</option>
                            <option value="MH">Maharashtra</option>
                            <option value="MN">Manipur</option>
                            <option value="ML">Meghalaya</option>
                            <option value="MZ">Mizoram</option>
                            <option value="NL">Nagaland</option>
                            <option value="OR">Odisha</option>
                            <option value="PY">Puducherry</option>
                            <option value="PB">Punjab</option>
                            <option value="RJ">Rajasthan</option>
                            <option value="SK">Sikkim</option>
                            <option value="TN">Tamil Nadu</option>
                            <option value="TG">Telangana</option>
                            <option value="TR">Tripura</option>
                            <option value="UP">Uttar Pradesh</option>
                            <option value="UT">Uttarakhand</option>
                            <option value="WB">West Bengal</option>
                            `;
                                                                                //     var indiaStates = ["Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh"];
                                                                                //     populateOptions(indiaStates);
                                                                        } else if (selectedCountry === "AU") {
                                                                                // Fetch states for Australia from a data source or API
                                                                                var australiaStates = ["Australian Capital Territory", "New South Wales", "Northern Territory"];
                                                                                populateOptions(australiaStates);
                                                                        } else if (selectedCountry === "DZ") {
                                                                                stateDropDown.innerHTML = `
                                <option value="01">Adrar</option>
                                <option value="16">Alger</option>
                                <option value="23">Annaba</option>
                                <option value="44">Aïn Defla</option>
                                <option value="46">Aïn Témouchent</option>
                                <option value="05">Batna</option>
                                <option value="07">Biskra</option>
                                <option value="09">Blida</option>
                                <option value="34">Bordj Bou Arréridj</option>
                                <option value="10">Bouira</option>
                                <option value="35">Boumerdès</option>
                                <option value="08">Béchar</option>
                                <option value="06">Béjaïa</option>
                                <option value="02">Chlef</option>
                                <option value="25">Constantine</option>
                                <option value="17">Djelfa</option>
                                <option value="32">El Bayadh</option>
                                <option value="39">El Oued</option>
                                <option value="36">El Tarf</option>
                                <option value="47">Ghardaïa</option>
                                <option value="24">Guelma</option>
                                <option value="33">Illizi</option>
                                <option value="18">Jijel</option>
                                <option value="40">Khenchela</option>
                                <option value="03">Laghouat</option>
                                <option value="28">M'sila</option>
                                <option value="29">Mascara</option>
                                <option value="43">Mila</option>
                                <option value="27">Mostaganem</option>
                                <option value="26">Médéa</option>
                                <option value="45">Naama</option>
                                <option value="31">Oran</option>
                                <option value="30">Ouargla</option>
                                <option value="04">Oum el Bouaghi</option>
                                <option value="48">Relizane</option>
                                <option value="20">Saïda</option>
                                <option value="22">Sidi Bel Abbès</option>
                                <option value="21">Skikda</option>
                                <option value="41">Souk Ahras</option>
                                <option value="19">Sétif</option>
                                <option value="11">Tamanrasset</option>
                                <option value="14">Tiaret</option>
                                <option value="37">Tindouf</option>
                                <option value="42">Tipaza</option>
                                <option value="38">Tissemsilt</option>
                                <option value="15">Tizi Ouzou</option>
                                <option value="13">Tlemcen</option>
                                <option value="12">Tébessa</option>
                            `;

                                                                        } else if (selectedCountry === "US") {
                                                                                // Fetch states for United States from a data source or API
                                                                                var usStates = ["Alabama", "Alaska", "Arizona", /* ... */ ];
                                                                                populateOptions(usStates);
                                                                        } else if (selectedCountry === "AL") {
                                                                                stateDropDown.innerHTML = `
                                <option value="01">Berat</option>
                                <option value="09">Dibër</option>
                                <option value="02">Durrës</option>
                                <option value="03">Elbasan</option>
                                <option value="04">Fier</option>
                                <option value="05">Gjirokastër</option>
                                <option value="06">Korçë</option>
                                <option value="07">Kukës</option>
                                <option value="08">Lezhë</option>
                                <option value="10">Shkodër</option>
                                <option value="11">Tiranë</option>
                                <option value="12">Vlorë</option>
                            `;
                                                                        } else if (selectedCountry === "AX") {
                                                                                stateDropDown.innerHTML = `
                                <option value="Aland Islands">Aland Islands</option>
                            
                            `;
                                                                        } else if (selectedCountry === "HR") {
                                                                                stateDropDown.innerHTML = `
                                
                                                        <option value="07">Bjelovar-Bilogora County</option>
                                                        <option value="12">Brod-Posavina County</option>
                                                        <option value="19">Dubrovnik-Neretva County</option>
                                                        <option value="18">Istria County</option>
                                                        <option value="06">Koprivnica-Križevci County</option>
                                                        <option value="02">Krapina-Zagorje County</option>
                                                        <option value="09">Lika-Senj County</option>
                                                        <option value="20">Međimurje County</option>
                                                        <option value="14">Osijek-Baranja County</option>
                                                        <option value="11">Požega-Slavonia County</option>
                                                        <option value="08">Primorje-Gorski Kotar County</option>
                                                        <option value="15">Šibenik-Knin County</option>
                                                        <option value="03">Sisak-Moslavina County</option>
                                                        <option value="17">Split-Dalmatia County</option>
                                                        <option value="05">Varaždin County</option>
                                                        <option value="10">Virovitica-Podravina County</option>
                                                        <option value="16">Vukovar-Syrmia County</option>
                                                        <option value="13">Zadar County</option>
                                                        <option value="21">Zagreb</option>
                                                        <option value="01">Zagreb County</option>
                                                    `;
                                                                        } else if (selectedCountry === "AF") {
                                                                                stateDropDown.innerHTML = `
                                                        <option value="BDS">Badakhshan</option>
                                                        <option value="BDG">Badghīs</option>
                                                        <option value="BGL">Baghlan</option>
                                                        <option value="BAL">Balkh</option>
                                                        <option value="BAM">Bamyān</option>
                                                        <option value="DAY">Daykundī</option>
                                                        <option value="FRA">Farah</option>
                                                        <option value="FYB">Faryāb</option>
                                                        <option value="GHA">Ghaznī</option>
                                                        <option value="GHO">Ghōr</option>
                                                        <option value="HEL">Helmand</option>
                                                        <option value="HER">Herat</option>
                                                        <option value="JOW">Jowzjan</option>
                                                        <option value="KAB">Kabul</option>
                                                        <option value="KAN">Kandahar</option>
                                                        <option value="KAP">Kapīsā</option>
                                                        <option value="KHO">Khōst</option>
                                                        <option value="KNR">Kunaṟ</option>
                                                        <option value="KDZ">Kunduz</option>
                                                        <option value="LAG">Laghman</option>
                                                        <option value="LOG">Lōgar</option>
                                                        <option value="NAN">Nangarhar</option>
                                                        <option value="NIM">Nīmrōz</option>
                                                        <option value="NUR">Nūristan</option>
                                                        <option value="PIA">Paktiya</option>
                                                        <option value="PKA">Paktīka</option>
                                                        <option value="PAN">Panjshayr</option>
                                                        <option value="PAR">Parwan</option>
                                                        <option value="SAM">Samangan</option>
                                                        <option value="SAR">Sar-e Pul</option>
                                                        <option value="TAK">Takhar</option>
                                                        <option value="URU">Uruzgan</option>
                                                        <option value="WAR">Wardak</option>
                                                        <option value="ZAB">Zabul</option>
                                                    `;
                                                                        } else if (selectedCountry === "BY") {
                                                                                stateDropDown.innerHTML = `
                                
                                <option value="BR">Brest Region</option>
                                <option value="HO">Gomel Region</option>
                                <option value="HR">Grodno Region</option>
                                <option value="HM">Minsk</option>
                                <option value="MI">Minsk Region</option>
                                <option value="MA">Mogilev Region</option>
                                <option value="VI">Vitebsk Region</option>
                            `;
                                                                        } else if (selectedCountry === "AU") {
                                                                                stateDropDown.innerHTML = `
                                
                                <option value="ACT">Australian Capital Territory</option>
                                <option value="NSW">New South Wales</option>
                                <option value="NT">Northern Territory</option>
                                <option value="QLD">Queensland</option>
                                <option value="SA">South Australia</option>
                                <option value="TAS">Tasmania</option>
                                <option value="VIC">Victoria</option>
                                <option value="WA">Western Australia</option>
                                `;
                                                                        }

                                                                        function populateOptions(states) {
                                                                                states.forEach(function(state) {
                                                                                        var option = document.createElement("option");
                                                                                        option.text = state;
                                                                                        option.value = state;
                                                                                        stateDropDown.appendChild(option);
                                                                                });
                                                                        }
                                                                }
                                                        </script>

                                                        <tr>
                                                                <td>City <span class="required">*</span></td>
                                                                <td><input type="text" class="City" name="City" id="city" placeholder="City" onkeyup="validateName(this,cityError)" required /></td>
                                                                <td class="valid"><span class="valid" id="city-error"></span></td>
                                                        </tr>
                                                        <tr>

                                                        <tr>
                                                                <td>PIN Code <span class="required">*</span></td>
                                                                <td><input type="text" name="Pincode" class="Pincode" pattern="[0-9]{6}" placeholder="PIN Code" onkeyup="validatePin(this,pinError)" maxlength="6" required /></td>
                                                                <td class="valid"><span class="valid" id="pin-error"></span></td>
                                                        </tr>

                                                </table>
                                        </div>
                                        <!-- <div align="center">
        <button type="button" data-previous class="btn btn-warning">Previous</button>
        <button type="button" data-next class="btn btn-success">Next</button></div>
        </div> -->
                                </div>
                                <div class="card" data-step>
                                        <h2 class="Title">Step 3</h2>
                                        <h3 class="step-title">Family Particulars</h3>
                                        <div class="form-group">
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
                                                                        Name
                                                                </td>

                                                                <td>
                                                                        <input type="text" class="Father_name" name="Father_name" placeholder="Father's name" onkeyup="validateText(this,fnameError)" />
                                                                        <span class="valid" id="fname-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="text" class="Mother_name" name="Mother_Name" placeholder="Mother's name" onkeyup="validateText(this,mnameError)" />
                                                                        <span class="valid" id="mname-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="text" class="Guardian_Name" name="Guardian_Name" placeholder="Guardian's name" onKeyUp="validateText(this,gnameError)" />
                                                                        <span class="valid" id="gname-error"></span>
                                                                </td>
                                                        </tr>

                                                        <tr>
                                                                <td>
                                                                        Occupation
                                                                </td>

                                                                <td>
                                                                        <input type="text" class="Father_Occupation" name="Father_Occupation" placeholder="Father's Occupation" onkeyup="validateText(this,foccError)" />
                                                                        <span class="valid" id="focc-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="text" class="Mother_Occupation" name="Mother_Occupation" placeholder="Mother's Occupation" onKeyUp="validateText(this,moccError)" />
                                                                        <span class="valid" id="mocc-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="text" class="Guardian_Occupation" name="Guardian_Occupation" placeholder="Guardian's Occupation" onKeyUp="validateText(this,goccError)" />
                                                                        <span class="valid" id="gocc-error"></span>
                                                                </td>

                                                        </tr>

                                                        <tr>
                                                                <td>
                                                                        Mobile number
                                                                </td>

                                                                <td>
                                                                        <input type="text" name="Father_Number" class="Father_Number" placeholder="Father's Mobile number" onkeyup="validatePhoneFam(this,fphoneError)" maxlength="10" />
                                                                        <span class="valid" id="fphone-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="text" name="Mother_Number" name="Mother_Number" placeholder="Mother's Mobile number" onkeyup="validatePhoneFam(this,mphoneError)" maxlength="10" />
                                                                        <span class="valid" id="mphone-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="text" name="Guardian_Number" class="Guardian_Number" placeholder="Guardian's Mobile number" onKeyUp="validatePhoneFam(this,gphoneError)" maxlength="10" />
                                                                        <span class="valid" id="gphone-error"></span>
                                                                </td>
                                                        </tr>

                                                        <tr>
                                                                <td>
                                                                        Email Address
                                                                </td>

                                                                <td>
                                                                        <input type="email" name="Father_email" class="Father_email" placeholder="Father's Email address" onkeyup="validateEmailFam(this,femailError)" />
                                                                        <span class="valid" id="femail-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="email" name="Mother_email" class="Mother_email" placeholder="Mother's Email address" onkeyup="validateEmailFam(this,memailError)" />
                                                                        <span class="valid" id="memail-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="email" name="Guardian_email" class="Guardian_email" placeholder="Guardian's Email address" onKeyUp="validateEmailFam(this,gemailError)" />
                                                                        <span class="valid" id="gemail-error"></span>
                                                                </td>
                                                        </tr>

                                                        <tr>
                                                                <td>
                                                                        Annual Income
                                                                </td>

                                                                <td>
                                                                        <input type="text" name="Father_AI" class="Father_AI" placeholder="Father's Annual Income" onkeyup="validateInc(this,fincomeError)" />
                                                                        <span class="valid" id="fincome-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="text" name="Mother_AI" class="Mother_AI" placeholder="Mother's Annual Income" onkeyup="validateInc(this,mincomeError)" />
                                                                        <span class="valid" id="mincome-error"></span>
                                                                </td>

                                                                <td>
                                                                        <input type="text" name="Guardian_AI" class="Guardian_AI" placeholder="Guardian's Annual Income" onKeyUp="validateInc(this,gincomeError)" />
                                                                        <span class="valid" id="gincome-error"></span>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <!-- <div align="center">
      <button type="button" data-previous class="btn btn-warning">Previous</button>
      <button type="button" data-next class="btn btn-success">Next</button></div>
</div> -->
                                </div>
                                <!-- <div class="card" data-step>
                                <h2 class="Title">Step 4</h2>
                                <h3 class="step-title">Previous Examination Details</h3>

                                <div class="form-group">
                                        <table>
                                                <tr>
                                                        <td>Application for the year:</td>
                                                        <td><select id="dropdown" name="AYear" class="Dropdown">
                                                                        <option value="2nd">2nd year</option>
                                                                        <option value="3rd">3rd year</option>
                                                                </select></td>
                                                </tr>

                                                <table id="sem">
                                                        <tr id="title"><th>Semester</th>
                                                        <th>Result Month & Year</th>
                                                        <th>Result</th>
                                                        <th>SGPA</th></tr>
                                                        <tr id="1sem">
                                                                <td>1st Semester</td>
                                                                <td><input type="month" class="1sem_res" name="1sem_res" /></td>
                                                                <td><select name="Result" class="Dropdown">
                                                                                <option value="Pass">Pass</option>
                                                                                <option value="Fail">Fail</option>
                                                                        </select></td>
                                                                <td><input type="number" name="sgpa" onKeyUp="validateSGPA(this, sgpaError1)"><span class="valid" id="sgpa-error1"></span></td>
                                                        </tr>
                                                        <tr id="2sem">
                                                                <td>2nd Semester</td>
                                                                <td><input type="month" class="2sem_res" name="2sem_res" /></td>
                                                                <td><select name="Result1" class="Dropdown">
                                                                                <option value="Pass">Pass</option>
                                                                                <option value="Fail">Fail</option>
                                                                        </select></td>
                                                                <td><input type="number" name="sgpa1" onKeyUp="validateSGPA(this, sgpaError2)"><span class="valid" id="sgpa-error2"></span></td>
                                                        </tr>
                                                        <tr id="3sem">
                                                                <td>3rd Semester</td>
                                                                <td><input type="month" class="3sem_res" name="1sem_res" /></td>
                                                                <td><select name="Result2" class="Dropdown">
                                                                                <option value="Pass">Pass</option>
                                                                                <option value="Fail">Fail</option>
                                                                        </select></td>
                                                                <td><input type="number" name="sgpa2" onKeyUp="validateSGPA(this, sgpaError3)"><span class="valid" id="sgpa-error3"></span></td>
                                                        </tr>
                                                        <tr id="4sem">
                                                                <td>4th Semester</td>
                                                                <td><input type="month" class="4sem_res" name="1sem_res" /></td>
                                                                <td><select name="Result3" class="Dropdown">
                                                                                <option value="Pass">Pass</option>
                                                                                <option value="Fail">Fail</option>
                                                                        </select></td>
                                                                <td><input type="number" name="sgpa3" onKeyUp="validateSGPA(this, sgpaError4)"><span class="valid" id="sgpa-error4"></span></td>
                                                        </tr>
                                                </table>

                                                <script>
                                                        const dropdown = document.getElementById('dropdown');
                                                        const semTable = document.getElementById('sem');
                                                        const rowsToShow = [document.getElementById('title'),document.getElementById('1sem'), document.getElementById('2sem')];
                                                        const rowsToHide = [document.getElementById('3sem'), document.getElementById('4sem')];

                                                        // Hide all rows initially
                                                        semTable.querySelectorAll('tr').forEach(row => {
                                                                row.style.display = 'none';
                                                        });

                                                        // Show the first two rows
                                                        rowsToShow.forEach(row => {
                                                                row.style.display = 'table-row';
                                                        });

                                                        dropdown.addEventListener('change', function() {
                                                                const selectedOption = dropdown.value;

                                                                // Hide all rows initially
                                                                semTable.querySelectorAll('tr').forEach(row => {
                                                                        row.style.display = 'none';
                                                                });

                                                                // Show the first two rows
                                                                rowsToShow.forEach(row => {
                                                                        row.style.display = 'table-row';
                                                                });

                                                                // Show/hide additional rows based on the selected option
                                                                if (selectedOption === '2nd') {
                                                                        rowsToHide.forEach(row => {
                                                                                row.style.display = 'none';
                                                                        });
                                                                } else if (selectedOption === '3rd') {
                                                                        rowsToHide.forEach(row => {
                                                                                row.style.display = 'table-row';
                                                                        });
                                                                }
                                                        });
                                                </script>
                                </div>
                                <div align="center">
        <button type="button" data-previous class="btn btn-warning">Previous</button>
      <button type="button" data-next class="btn btn-success">Next</button></div>
      </div>
                        </div> -->
                                <div class="card" data-step>
                                        <h2 class="Title">Step 4</h2>
                                        <h3 class="step-title">Declaration</h3>
                                        <div class="form-group">
                                                <div align="center">

                                                        I hereby declare that the information provided in this application form is true, complete,
                                                        and accurate to the best of my knowledge. I understand that any false or misleading information
                                                        may result in the rejection of my application or subsequent termination of my enrollment if admitted.
                                                        <br />
                                                        <br />
                                                        Scholarship / Fee concession will not be given to students who do not take the class tests / Examination and have shortage of attendance. They will have to pay the fees due to the college otherwise the T.C. will not be given. If a student after taking admission, for any reason leaves the College / takes admission in another College, the same should be informed to the College immediately in writing and requisite fee, if any, will have to be paid.<br>
                                                        <!-- <input type="checkbox" class="checkbox-container" id="Checkbox">
		<label for="Checkbox">I agree with the terms and conditions</label>
       <script>
        //Checkbox and next button elements
        const checkbox = document.getElementById('Checkbox');
        const nextButton = document.getElementById('nextButton');

        checkbox.addEventListener('change', function() {
        //Enable/disable the next button based on checkbox state
        nextButton.disabled = !checkbox.checked;
        });
</script> -->

                                                        <br />
                                                        <br />
                                                        <center> <input type="checkbox" class="checkbox-container" id="Checkbox">
                                                                <label for="Checkbox">I agree with the terms and conditions</label>
                                                        </center>
                                                </div>
                                                <br />
                                        </div>
                                        <table>
                                                <th>Document</th>
                                                <th>Upload</th>

                                                <tr>
                                                        <td>Signature</td>
                                                        <td><input type="file" name="sign_img" class="sign_img" /></td>
                                                </tr>
                                        </table>
                                        <!-- <center>
                <button type="button" data-previous class="btn btn-warning">Previous</button>
                <button type="button" data-next class="btn btn-success" id="nextButton">Next</button>
        </center> -->
                                        <script>
                                                const checkbox = document.getElementById('Checkbox');
                                                const nextButton = document.getElementById('nextButton');

                                                checkbox.addEventListener('change', function() {
                                                        nextButton.disabled = !checkbox.checked;
                                                });
                                        </script>
                                </div>


                                <div class="card" data-step>
                                        <h2 class="Title">Step 5</h2>
                                        <h3 class="step-title">Documents Upload</h3>
                                        <div class="form-group">
                                                <h2 align="center">DOCUMENTS TO BE SUBMITTED</h2>
                                                <table class="fees">
                                                        <th>Document</th>
                                                        <th>Upload</th>

                                                        <tr>
                                                                <td>Marks card copy of 12th Std/PUC/Equivalent<span class="required">*</span></td>
                                                                <td><input type="file" name="marks_img" class="marks_img" required></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Transfer Certificate of 12th Std/PUC/Equivalent<span class="required">*</span></td>
                                                                <td><input type="file" name="transfer_img" class="transfer_img" required></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Migration Certificate (Only for Non-Karnataka)</td>
                                                                <td><input type="file" name="migration_img" class="migration_img"></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Passport Size Photograph<span class="required">*</span></td>
                                                                <td><input type="file" name="photo_img" class="photo_img" required></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Proof of Caste, if other than GM (SC, ST & CAT – I compulsory)</td>
                                                                <td><input type="file" name="caste_img" class="caste_img"></td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <!-- <div align="center">
        <button type="button" data-previous class=" btn-warning">Previous</button>
        <button type="button" data-next class="btn btn-success">Next</button></div> -->
                                        <!-- <button type="submit" class="btn">Submit</button></div> -->
                                </div>
                                <!-- <div align="center">
          <button type="button" data-previous class="btn btn-warning">Previous</button>
                                -->
                                <center><input type="submit" class="btn btn-success" onsubmit="return validateAppln()" value="Submit" name="submit" />
                                        <span class="valid" id="submit-error"></span>
                                </center>
        </div>


        </form>
        <script src="app_valid.js"></script>
        </section>
</body>

</html>