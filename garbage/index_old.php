<?php
$dynamicFunnelName = isset($_GET['dynamic']) ? $_GET['dynamic'] : 'unknown';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .input-group input {
            width: 80%;
            padding: 10px;
            padding-left: 60px;
            border: 1px solid #ccc;
            border-radius: 4px;

        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background-color: #0056b3;
        }


        .error-message {
            margin-top: 10px;
            color: red;
        }
    </style>

    <style>
        .orderForm {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left;
        }

        .orderForm div {
            margin-bottom: 1em;
            width: 100%;
        }

        .orderForm label {
            font-weight: bold;
        }

        .orderForm input {
            font-size: 16px;
            font-weight: bold;
            padding-left: 40px;
            margin-top: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .orderForm span {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            /* Adjusted font size */
        }

        .orderForm button {
            font-weight: bold;
            font-size: 20px;
            width: 200px;
            height: 50px;
            background-color: #FF5733;
            color: white;
            margin-right: 20px;
        }

        /* Center the button */
        .orderForm div.center {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <form id="mainForm" method="POST">
            <h2>Register</h2>
            <div id="errorMsg"
                style="display: none; background-color: rgb(255 231 231); color: #b92727; padding: 10px; border-radius: 5px; margin-bottom:10px;">
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input class="user-input" type="text" name="firstname" placeholder="First Name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input class="user-input" type="text" name="lastname" placeholder="Last Name" required>
            </div>
            <script>
                function showSelectedText() {
                    var selectedOption = $("#area_code option:selected");
                    var countryCodeText = selectedOption.text().match(/\(([^)]+)\)/)[1];
                    $("#selectedText").text(countryCodeText);
                }


            </script>
            <span id="selectedText"></span>

            <div class="input-group" style="display: flex; align-items: center; margin-bottom: 8px;">
                <select class="user-input" id="area_code" name="area_code"
                    style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; flex: 1; width:40%;">
                    <option value="" selected>Select</option>
                    <option value="376" data-countryCode="AD">(+376) Andorra</option>
                    <option value="244" data-countryCode="AO">(+244) Angola</option>
                    <option value="1264" data-countryCode="AI">(+1264) Anguilla</option>
                    <option value="1268" data-countryCode="AG">(+1268) Antigua &amp; Barbuda</option>
                    <option value="54" data-countryCode="AR">(+54) Argentina</option>
                    <option value="374" data-countryCode="AM">(+374) Armenia</option>
                    <option value="297" data-countryCode="AW">(+297) Aruba</option>
                    <option value="61" data-countryCode="AU">(+61) Australia</option>
                    <option value="43" data-countryCode="AT">(+43) Austria</option>
                    <option value="994" data-countryCode="AZ">(+994) Azerbaijan</option>
                    <option value="1242" data-countryCode="BS">(+1242) Bahamas</option>
                    <option value="973" data-countryCode="BH">(+973) Bahrain</option>
                    <option value="880" data-countryCode="BD">(+880) Bangladesh</option>
                    <option value="1246" data-countryCode="BB">(+1246) Barbados</option>
                    <option value="375" data-countryCode="BY">(+375) Belarus</option>
                    <option value="32" data-countryCode="BE">(+32) Belgium</option>
                    <option value="501" data-countryCode="BZ">(+501) Belize</option>
                    <option value="229" data-countryCode="BJ">(+229) Benin</option>
                    <option value="1441" data-countryCode="BM">(+1441) Bermuda</option>
                    <option value="975" data-countryCode="BT">(+975) Bhutan</option>
                    <option value="591" data-countryCode="BO">(+591) Bolivia</option>
                    <option value="387" data-countryCode="BA">(+387) Bosnia Herzegovina</option>
                    <option value="267" data-countryCode="BW">(+267) Botswana</option>
                    <option value="55" data-countryCode="BR">(+55) Brazil</option>
                    <option value="673" data-countryCode="BN">(+673) Brunei</option>
                    <option value="359" data-countryCode="BG">(+359) Bulgaria</option>
                    <option value="226" data-countryCode="BF">(+226) Burkina Faso</option>
                    <option value="257" data-countryCode="BI">(+257) Burundi</option>
                    <option value="855" data-countryCode="KH">(+855) Cambodia</option>
                    <option value="237" data-countryCode="CM">(+237) Cameroon</option>
                    <option value="1" data-countryCode="CA">(+1) Canada</option>
                    <option value="238" data-countryCode="CV">(+238) Cape Verde Islands</option>
                    <option value="1345" data-countryCode="KY">(+1345) Cayman Islands</option>
                    <option value="236" data-countryCode="CF">(+236) Central African Republic</option>
                    <option value="56" data-countryCode="CL">(+56) Chile</option>
                    <option value="86" data-countryCode="CN">(+86) China</option>
                    <option value="57" data-countryCode="CO">(+57) Colombia</option>
                    <option value="269" data-countryCode="KM">(+269) Comoros</option>
                    <option value="242" data-countryCode="CG">(+242) Congo</option>
                    <option value="682" data-countryCode="CK">(+682) Cook Islands</option>
                    <option value="506" data-countryCode="CR">(+506) Costa Rica</option>
                    <option value="385" data-countryCode="HR">(+385) Croatia</option>
                    <option value="53" data-countryCode="CU">(+53) Cuba</option>
                    <option value="90392" data-countryCode="CY">(+90392) Cyprus North</option>
                    <option value="357" data-countryCode="CY">(+357) Cyprus South</option>
                    <option value="42" data-countryCode="CZ">(+42) Czech Republic</option>
                    <option value="45" data-countryCode="DK">(+45) Denmark</option>
                    <option value="253" data-countryCode="DJ">(+253) Djibouti</option>
                    <option value="1809" data-countryCode="DM">(+1809) Dominica</option>
                    <option value="1809" data-countryCode="DO">(+1809) Dominican Republic</option>
                    <option value="593" data-countryCode="EC">(+593) Ecuador</option>
                    <option value="20" data-countryCode="EG">(+20) Egypt</option>
                    <option value="503" data-countryCode="SV">(+503) El Salvador</option>
                    <option value="240" data-countryCode="GQ">(+240) Equatorial Guinea</option>
                    <option value="291" data-countryCode="ER">(+291) Eritrea</option>
                    <option value="372" data-countryCode="EE">(+372) Estonia</option>
                    <option value="251" data-countryCode="ET">(+251) Ethiopia</option>
                    <option value="500" data-countryCode="FK">(+500) Falkland Islands</option>
                    <option value="298" data-countryCode="FO">(+298) Faroe Islands</option>
                    <option value="679" data-countryCode="FJ">(+679) Fiji</option>
                    <option value="358" data-countryCode="FI">(+358) Finland</option>
                    <option value="33" data-countryCode="FR">(+33) France</option>
                    <option value="594" data-countryCode="GF">(+594) French Guiana</option>
                    <option value="689" data-countryCode="PF">(+689) French Polynesia</option>
                    <option value="241" data-countryCode="GA">(+241) Gabon</option>
                    <option value="220" data-countryCode="GM">(+220) Gambia</option>
                    <option value="7880" data-countryCode="GE">(+7880) Georgia</option>
                    <option value="49" data-countryCode="DE">(+49) Germany</option>
                    <option value="233" data-countryCode="GH">(+233) Ghana</option>
                    <option value="350" data-countryCode="GI">(+350) Gibraltar</option>
                    <option value="30" data-countryCode="GR">(+30) Greece</option>
                    <option value="299" data-countryCode="GL">(+299) Greenland</option>
                    <option value="1473" data-countryCode="GD">(+1473) Grenada</option>
                    <option value="590" data-countryCode="GP">(+590) Guadeloupe</option>
                    <option value="671" data-countryCode="GU">(+671) Guam</option>
                    <option value="502" data-countryCode="GT">(+502) Guatemala</option>
                    <option value="224" data-countryCode="GN">(+224) Guinea</option>
                    <option value="245" data-countryCode="GW">(+245) Guinea - Bissau</option>
                    <option value="592" data-countryCode="GY">(+592) Guyana</option>
                    <option value="509" data-countryCode="HT">(+509) Haiti</option>
                    <option value="504" data-countryCode="HN">(+504) Honduras</option>
                    <option value="852" data-countryCode="HK">(+852) Hong Kong</option>
                    <option value="36" data-countryCode="HU">(+36) Hungary</option>
                    <option value="354" data-countryCode="IS">(+354) Iceland</option>
                    <option value="91" data-countryCode="IN">(+91) India</option>
                    <option value="62" data-countryCode="ID">(+62) Indonesia</option>
                    <option value="98" data-countryCode="IR">(+98) Iran</option>
                    <option value="964" data-countryCode="IQ">(+964) Iraq</option>
                    <option value="353" data-countryCode="IE">(+353) Ireland</option>
                    <option value="972" data-countryCode="IL">(+972) Israel</option>
                    <option value="39" data-countryCode="IT">(+39) Italy</option>
                    <option value="1876" data-countryCode="JM">(+1876) Jamaica</option>
                    <option value="81" data-countryCode="JP">(+81) Japan</option>
                    <option value="962" data-countryCode="JO">(+962) Jordan</option>
                    <option value="7" data-countryCode="KZ">(+7) Kazakhstan</option>
                    <option value="254" data-countryCode="KE">(+254) Kenya</option>
                    <option value="686" data-countryCode="KI">(+686) Kiribati</option>
                    <option value="850" data-countryCode="KP">(+850) Korea North</option>
                    <option value="82" data-countryCode="KR">(+82) Korea South</option>
                    <option value="965" data-countryCode="KW">(+965) Kuwait</option>
                    <option value="996" data-countryCode="KG">(+996) Kyrgyzstan</option>
                    <option value="856" data-countryCode="LA">(+856) Laos</option>
                    <option value="371" data-countryCode="LV">(+371) Latvia</option>
                    <option value="961" data-countryCode="LB">(+961) Lebanon</option>
                    <option value="266" data-countryCode="LS">(+266) Lesotho</option>
                    <option value="231" data-countryCode="LR">(+231) Liberia</option>
                    <option value="218" data-countryCode="LY">(+218) Libya</option>
                    <option value="417" data-countryCode="LI">(+417) Liechtenstein</option>
                    <option value="370" data-countryCode="LT">(+370) Lithuania</option>
                    <option value="352" data-countryCode="LU">(+352) Luxembourg</option>
                    <option value="853" data-countryCode="MO">(+853) Macao</option>
                    <option value="389" data-countryCode="MK">(+389) Macedonia</option>
                    <option value="261" data-countryCode="MG">(+261) Madagascar</option>
                    <option value="265" data-countryCode="MW">(+265) Malawi</option>
                    <option value="60" data-countryCode="MY">(+60) Malaysia</option>
                    <option value="960" data-countryCode="MV">(+960) Maldives</option>
                    <option value="223" data-countryCode="ML">(+223) Mali</option>
                    <option value="356" data-countryCode="MT">(+356) Malta</option>
                    <option value="692" data-countryCode="MH">(+692) Marshall Islands</option>
                    <option value="596" data-countryCode="MQ">(+596) Martinique</option>
                    <option value="222" data-countryCode="MR">(+222) Mauritania</option>
                    <option value="269" data-countryCode="YT">(+269) Mayotte</option>
                    <option value="52" data-countryCode="MX">(+52) Mexico</option>
                    <option value="691" data-countryCode="FM">(+691) Micronesia</option>
                    <option value="373" data-countryCode="MD">(+373) Moldova</option>
                    <option value="377" data-countryCode="MC">(+377) Monaco</option>
                    <option value="976" data-countryCode="MN">(+976) Mongolia</option>
                    <option value="1664" data-countryCode="MS">(+1664) Montserrat</option>
                    <option value="212" data-countryCode="MA">(+212) Morocco</option>
                    <option value="258" data-countryCode="MZ">(+258) Mozambique</option>
                    <option value="95" data-countryCode="MN">(+95) Myanmar</option>
                    <option value="264" data-countryCode="NA">(+264) Namibia</option>
                    <option value="674" data-countryCode="NR">(+674) Nauru</option>
                    <option value="977" data-countryCode="NP">(+977) Nepal</option>
                    <option value="31" data-countryCode="NL">(+31) Netherlands</option>
                    <option value="687" data-countryCode="NC">(+687) New Caledonia</option>
                    <option value="64" data-countryCode="NZ">(+64) New Zealand</option>
                    <option value="505" data-countryCode="NI">(+505) Nicaragua</option>
                    <option value="227" data-countryCode="NE">(+227) Niger</option>
                    <option value="234" data-countryCode="NG">(+234) Nigeria</option>
                    <option value="683" data-countryCode="NU">(+683) Niue</option>
                    <option value="672" data-countryCode="NF">(+672) Norfolk Islands</option>
                    <option value="670" data-countryCode="NP">(+670) Northern Marianas</option>
                    <option value="47" data-countryCode="NO">(+47) Norway</option>
                    <option value="968" data-countryCode="OM">(+968) Oman</option>
                    <option value="680" data-countryCode="PW">(+680) Palau</option>
                    <option value="507" data-countryCode="PA">(+507) Panama</option>
                    <option value="675" data-countryCode="PG">(+675) Papua New Guinea</option>
                    <option value="595" data-countryCode="PY">(+595) Paraguay</option>
                    <option value="595" data-countryCode="PK">(+92) Pakistan</option>
                    <option value="51" data-countryCode="PE">(+51) Peru</option>
                    <option value="63" data-countryCode="PH">(+63) Philippines</option>
                    <option value="48" data-countryCode="PL">(+48) Poland</option>
                    <option value="351" data-countryCode="PT">(+351) Portugal</option>
                    <option value="1787" data-countryCode="PR">(+1787) Puerto Rico</option>
                    <option value="974" data-countryCode="QA">(+974) Qatar</option>
                    <option value="262" data-countryCode="RE">(+262) Reunion</option>
                    <option value="40" data-countryCode="RO">(+40) Romania</option>
                    <option value="7" data-countryCode="RU">(+7) Russia</option>
                    <option value="250" data-countryCode="RW">(+250) Rwanda</option>
                    <option value="378" data-countryCode="SM">(+378) San Marino</option>
                    <option value="239" data-countryCode="ST">(+239) Sao Tome &amp; Principe</option>
                    <option value="966" data-countryCode="SA">(+966) Saudi Arabia</option>
                    <option value="221" data-countryCode="SN">(+221) Senegal</option>
                    <option value="381" data-countryCode="CS">(+381) Serbia</option>
                    <option value="248" data-countryCode="SC">(+248) Seychelles</option>
                    <option value="232" data-countryCode="SL">(+232) Sierra Leone</option>
                    <option value="65" data-countryCode="SG">(+65) Singapore</option>
                    <option value="421" data-countryCode="SK">(+421) Slovak Republic</option>
                    <option value="386" data-countryCode="SI">(+386) Slovenia</option>
                    <option value="677" data-countryCode="SB">(+677) Solomon Islands</option>
                    <option value="252" data-countryCode="SO">(+252) Somalia</option>
                    <option value="27" data-countryCode="ZA">(+27) South Africa</option>
                    <option value="34" data-countryCode="ES">(+34) Spain</option>
                    <option value="94" data-countryCode="LK">(+94) Sri Lanka</option>
                    <option value="290" data-countryCode="SH">(+290) St. Helena</option>
                    <option value="1869" data-countryCode="KN">(+1869) St. Kitts</option>
                    <option value="1758" data-countryCode="SC">(+1758) St. Lucia</option>
                    <option value="249" data-countryCode="SD">(+249) Sudan</option>
                    <option value="597" data-countryCode="SR">(+597) Suriname</option>
                    <option value="268" data-countryCode="SZ">(+268) Swaziland</option>
                    <option value="46" data-countryCode="SE">(+46) Sweden</option>
                    <option value="41" data-countryCode="CH">(+41) Switzerland</option>
                    <option value="963" data-countryCode="SI">(+963) Syria</option>
                    <option value="886" data-countryCode="TW">(+886) Taiwan</option>
                    <option value="7" data-countryCode="TJ">(+7) Tajikstan</option>
                    <option value="66" data-countryCode="TH">(+66) Thailand</option>
                    <option value="228" data-countryCode="TG">(+228) Togo</option>
                    <option value="676" data-countryCode="TO">(+676) Tonga</option>
                    <option value="1868" data-countryCode="TT">(+1868) Trinidad &amp; Tobago</option>
                    <option value="216" data-countryCode="TN">(+216) Tunisia</option>
                    <option value="90" data-countryCode="TR">(+90) Turkey</option>
                    <option value="7" data-countryCode="TM">(+7) Turkmenistan</option>
                    <option value="993" data-countryCode="TM">(+993) Turkmenistan</option>
                    <option value="1649" data-countryCode="TC">(+1649) Turks &amp; Caicos Islands</option>
                    <option value="688" data-countryCode="TV">(+688) Tuvalu</option>
                    <option value="256" data-countryCode="UG">(+256) Uganda</option>
                    <option value="380" data-countryCode="UA">(+380) Ukraine</option>
                    <option value="1" data-countryCode="US">(+1) USA</option>
                    <option value="44" data-countryCode="UK">(+44) United Kingdom</option>
                    <option value="971" data-countryCode="AE">(+971) United Arab Emirates</option>
                    <option value="598" data-countryCode="UY">(+598) Uruguay</option>
                    <option value="7" data-countryCode="UZ">(+7) Uzbekistan</option>
                    <option value="678" data-countryCode="VU">(+678) Vanuatu</option>
                    <option value="379" data-countryCode="VA">(+379) Vatican City</option>
                    <option value="58" data-countryCode="VE">(+58) Venezuela</option>
                    <option value="84" data-countryCode="VN">(+84) Vietnam</option>
                    <option value="84" data-countryCode="VG">(+1284) Virgin Islands - British</option>
                    <option value="84" data-countryCode="VI">(+1340) Virgin Islands - US</option>
                    <option value="681" data-countryCode="WF">(+681) Wallis &amp; Futuna</option>
                    <option value="969" data-countryCode="YE">(+969) Yemen (North)</option>
                    <option value="967" data-countryCode="YE">(+967) Yemen (South)</option>
                    <option value="260" data-countryCode="ZM">(+260) Zambia</option>
                    <option value="263" data-countryCode="ZW">(+263) Zimbabwe</option>
                </select>


                <input class="user-input" type="tel" id="phone" name="phone" placeholder="Your Phone Number"
                    style="padding-left: 10px; flex: 3;" required>
            </div>



            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input class="user-input" type="email" name="email" placeholder="Email" required>
            </div>
            <input type="hidden" name="dynamicFunnelName" value="<?php echo htmlspecialchars($dynamicFunnelName); ?>">

            <button type="submit" id="sbtbtn" class="btn" style="width:102%">Register</button>
        </form>
    </div>

    <div id="preloader" class="preloder" style="display:none">
        <div class="loder">

        </div>
    </div>
    <style>
        .preloder {
            height: 100vh;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(0 0 0 / 40%);
        }


        .loder {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 5px solid #D1DFFF;
            border-top: 8px solid #3775FF;
            animation: spinner 1s linear infinite;
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);

            }

            50% {
                border-top-width: 5px;
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @media screen and (max-width: 668px) {
            .loder {
                height: 60px;
                width: 60px;
                border-top: 6px solid #3775FF;
            }
        }




        .orderForm {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left;
        }

        .orderForm div {
            margin-bottom: 1em;
            width: 100%;
        }

        .orderForm label {
            font-weight: bold;
        }

        .orderForm input {
            font-size: 16px;
            font-weight: bold;
            padding-left: 40px;
            margin-top: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .orderForm span {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            /* Adjusted font size */
        }

        .orderForm button {
            font-weight: bold;
            font-size: 20px;
            width: 200px;
            height: 50px;
            background-color: #FF5733;
            color: white;
            margin-right: 20px;
        }

        /* Center the button */
        .orderForm div.center {
            display: flex;
            justify-content: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


    <script>


        $(document).ready(function () {

            fetch('https://ipapi.co/json/')
                .then(response => response.json()) // Assuming the API returns JSON data
                .then(data => {
                    if (data.country) {
                        console.log('Country Code:', data.country);
                        $('#area_code option[data-countryCode="' + data.country + '"]').prop('selected', true);
                    } else {
                        console.log('Country Code not defined..');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                
            // $.ajax({
            //     url: 'defaultCountryCode.php',
            //     type: 'GET',
            //     success: function (response) {
            //         // Set default selected option based on the country code
            //         var countryCode = response.trim();
            //         if (countryCode.toLowerCase() != "undefined") {
            //             $('#area_code option[data-countryCode="' + countryCode + '"]').prop('selected', true);
            //         } else {
            //             console.log("Undefined so not setting country code by default.")
            //         }
            //     },
            //     error: function (xhr, status, error) {
            //         console.error('Error fetching default country code:', error);
            //     }
            // });



            $('#errorMsg').hide();
            $('#errorMsg').empty();
            $("#mainForm").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    phone: {
                        required: true,
                        minlength: 5,
                    }
                },
                // Specify validation error messages
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    phone: {
                        required: "Please provide a valid phone number",
                        minlength: "Please provide a valid phone number"
                    },
                    email: "Please enter a valid email address"
                },
                errorPlacement: function (error, element) {
                    error.addClass('error-message');
                    // Check if the element is the phone input
                    if (element.attr("name") === "phone") {
                        // Insert the error message after the input group div
                        error.insertAfter(element.closest(".input-group"));
                    } else {
                        // For other inputs, insert the error message after the input element
                        error.insertAfter(element);
                    }
                },


                submitHandler: function (form) {
                    $("#preloader").show();
                    $('#errorMsg').empty();
                    $('#errorMsg').hide();
                    $('#sbtbtn').prop('disabled', true);

                    var formData = $('#mainForm').serializeArray();
                    formData.push({ name: "country_code", value: $("#area_code option:selected").data('countrycode') });


                    $.ajax({
                        url: "formsubmit.php",
                        type: "POST",
                        data: formData,
                        success: function (t) {
                            $('#sbtbtn').prop('disabled', false);
                            const rslt = JSON.parse(t);
                            console.log(rslt);
                            if (rslt.status == "Success") {
                                let redirectUrl = rslt.data.RedirectTo;
                                $("#preloader").hide();
                                $('#errorMsg').hide();
                                window.location.href = redirectUrl;
                            } else {
                                $("#preloader").hide();
                                document.getElementById('errorMsg').innerHTML += rslt.errors;
                                $('#errorMsg').show();
                            }

                        },
                        error: function (n) {
                            $('#sbtbtn').prop('disabled', false);

                            var div = document.getElementById('errorMsg');
                            div.innerHTML = "Oops! Something went wrong. We are solving the issue. Try after some time.";
                            $('#errorMsg').show();
                            return;
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>