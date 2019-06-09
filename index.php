<?php ob_start(); $user_coo = $_COOKIE['user']; if(empty($user_coo)){  include"files/header.php"; include "inc/function.php"; ?>
<script>
function checkurl() {
    var check=window.location.hostname;
if(check.indexOf("www") == -1){
    window.location = "https://www.investorsstate.com";
}
}
</script>
  <body onload="checkurl()">

      <div class="container-fluid">
          <div class="row">
              <div class="header col-lg-12">
                  <div class="header_madiaquary">
                  <a class="logo" href="https://www.investorsstate.com"><img src="image/logo.PNG" width="200" height="80"/></a>
                  <span class="button_madiaquary_display glyphicon glyphicon-th-list" aria-hidden="true"></span>
                  </div>
              <ul class="earth_quake">
                  <img src="image/arrowup.png" class="img_arrowe" style="display: none;"/>
                  <li style="margin-left:30px; top: 0;"><a class="logo quake_logo" href="https://www.investorsstate.com"><img src="image/logo.PNG" width="200" height="80"/></a></li>
                  <li ><a href="about_us.php" style="font-size: 19px;">About us</a></li>
                  <li ><a href="faq.php" style="font-size: 19px;">FAQ</a></li>
                  <li ><a href="contact.php" style="font-size: 19px;">Conact us</a></li>
                  </ul>
              </div>
              </div>
      </div>
   <div class="container-fluid" style="height: 100%;">
      <div class="row" style="height: 100%;">
            <div class="carousel col-lg-12">
               <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img_1">
                                <div class="img_1_text col-lg-push-3 col-lg-6 animated fadeIn" style=" letter-spacing: .7px; color: #fff;">
                                    <span class="reliable_partner" style="font-family: gabriola; font-size: 40px;">A RELIABLE PARTNER</span><div class="hersontal_line" style="margin-top: 0px;"></div>
                                    <span>Clear and simple investment, withdrawal operations take only 3 clicks. Regular, high-yield dividends. Legal protection for funds invested. The latest news and updates from analysts.</span><br/>
                                    <div class="minimal_risks" style="margin-top: 20px;"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                        Minimal risks</div>
                                    <div class="minimal_risks"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                        Our Plan 1% daily for 90 days </div>
                                    <div class="minimal_risks"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                       Equal rights and opportunities are available for investors</div>
                                    <div class="minimal_risks"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                        A wide choice of payments systems are available for adding funds/withdrawal
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide"><div class="img_2">
                            <div class="img_1_text col-lg-push-3 col-lg-6 animated fadeIn" style="letter-spacing: .7px; color: #fff;">
                                    <span class="reliable_partner" style="font-family: gabriola; font-size: 40px;">About Our Company</span><div style="margin-top: 0px;" class="hersontal_line"></div>
                                    <span class="mmm">Our Company is a community of people who have come together to support Bitcoin and other digital currencies (also called crypto currencies or virtual currencies). We are helping to educate, provide services for, secure, protect, and ultimately profit from this emerging technology.</span><br/>
                                    <div class="minimal_risks">
                                       With Our Company you can earn daily profits from our shared mining pools. We also have a referral program so you can get paid for anyone you share Our Company Network with. We have combined the power of crowd funding to bring you a very unique and timely opportunity in the Bitcoin industry. By using our expertise we are able to build a profitable mining operation that uses an affiliate payment structure to leverage the earning potential of our members. Every client can share our profits by investing only $10 or more. Join us, make a contribution to the development of digital currencies!</div>
                            </div>
                            </div></div>
                        <div class="swiper-slide"><div class="img_3">
                            <div class="img_1_text col-lg-push-3 col-lg-6 animated fadeIn" style="color: #fff;">
                                    <span class="reliable_partner" style="font-family: gabriola; font-size: 40px;">Representative affiliate program</span><div style="margin-top: 0px;" class="hersontal_line"></div>
                                    <span class="aaa">To be a Regional Representative of Our Company Network is a privilege and an opportunity to become a partner in the ready trusted Company, improve it and let it grow in your geographic region and also be part of a worldwide network of Our company regional representative program. It is a high revenue share. </span><br/>
                                    <div class="minimal_risks">
                                       Regional Representative of Our Company Network get a higher referral commission: 5 %. </div>
                            </div>
                            </div></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
      </div>

      <div class="container-fluid">
          <div class="row">
              <div class="sidebar_overlay"></div>
              <div class="main_sidebar col-lg-12">
              <div class="sidebar">
                  <div class="sidebar_helper">
                  <span class="sidebar_arrow glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                <span class="sidebar_text" style="bottom: -17px; font-family: gabriola; font-size: 22px;">Register/Login </span>
                  </div>
              </div>
              <div class="sidebar_body col-lg-12">
                  <!-- login -->
                  <div class="col-lg-6">
                      <div class="choice_login" style="height:250px;">Login</div>
                      <div class="logincollection">
                    <div class="login_form">
                        <?php // singup value
$loginusername = @$_POST['loginusername'];
$loginpassword = @$_POST['loginpassword'];

if(isset($_POST['login'])){
    if(empty($loginusername) || empty($loginpassword)){
        echo '<script>alert("please complete the fields");</script>';
    }else{$encriptionloginpass = md5($loginpassword);
        $select_c = "select * from customers where username = '$loginusername' AND password = '$encriptionloginpass' ";
        $run_c = mysqli_query($con, $select_c);
        if(mysqli_num_rows($run_c) > 0){
            $row_c = mysqli_fetch_array($run_c);
            $user = $row_c['username'];
            $pass = $row_c['password'];
            
            if($user != $loginusername && $pass != $loginpassword){
                echo '<script>alert("The entered data is incorrect");</script>';
            }else{
                setcookie("user",$user,time()+60*60*24);
                setcookie("login",1,time()+60*60*24);
                header('Location: https://www.investorsstate.com/laoding.php');
                echo '<script>alert("welcome to '.$user.'");</script>';
            }
        }else{
            echo '<script>alert("The entered data is incorrect");</script>';
        }
    }
}
?>
                            <h1 style="color: #fff;">Login</h1>
                        <form action="" method="post">
                        <input type="text" name="loginusername" placeholder="Username"/>
                        <input type="password" name="loginpassword" placeholder="Password"/><br/>
                            <div class="loginhref">
                            <a href="#">Forgot your password?</a><br/>
                            </div>
                            <input type="submit" value="login" name="login" />
                            </form>
                        </div>
                      <h1 style="color: #fff; font-size: 22px;">we accepted</h1>
                      <div class="bank_accepted">
                        <img src="image/betcion.png" width="100" height="50">
                          <img src="image/neteller.png" width="100" height="50">
                          <img src="image/skrill.png" width="100" height="50">
                          <img src="image/payeer.png" width="100" height="50">
                          <img src="image/perfectmoney.png" width="100" height="50">
                      </div>
                      </div>
                  </div>
                  <!-- rigster -->
                  <div class="col-lg-6">
<?php // singup value
        $referral = @$_GET['ref'];
        $username = @$_POST['username'];
        $password = @$_POST['password'];
        $con_password = @$_POST['con_password'];
        $email = @$_POST['email'];
        $country = @$_POST['country'];
            date_default_timezone_set("America/New_York");
           $reg_date = date("Y-m-d");
    if(isset($_POST['register'])){
        if(empty($username) || empty($password) || empty($email) || empty($country)){
            echo '<script>alert("please complete the fields");</script>';
        }else{
            if($password === $con_password){
                if(preg_match('/^[a-z0-9_-]{6,16}$/',$username) && preg_match('/^[a-z0-9_-]{6,18}$/',$password) && preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2})/',$email)){
                    $check_username_quake = "select * from customers where username = '$username'";
                    $run_check_username_quake = mysqli_query($con, $check_username_quake);
                if(mysqli_num_rows($run_check_username_quake) === 0){
                    $encriptionpassword = md5($password);
            $insert_c = "insert into customers(username,password,email,country,referral,	u_date_of_register) values('$username','$encriptionpassword','$email','$country','$referral','$reg_date')";
            $run_c = mysqli_query($con, $insert_c);
                    setcookie("user",$username,time()+60*60*24);
                    setcookie("login",1,time()+60*60*24);
                header('Location: https://www.investorsstate.com/laoding.php');
                echo '<script>alert("welcome to '.$user.'");</script>';
                    }else {
                    //username
                    echo '<script>alert("this username is already used");</script>';
                    }
                }
                else{
                    //username
                    echo '<script>alert("you data is not much our requirements");</script>';
                }
            }else{
                echo '<script>alert("your confirmation password is not right");</script>';
            }
        }
    }
?>
                      <div class="choice_reg" style="height:250px;">Register</div>
                      <div class="regcollection">
                  <div class="login_form">
                            <h1 style="color: #fff;">Register</h1>
                        <form action="" method="post">
                            <div class="wrong">
                                you are allow to put from a-z and 0-9 number of char 6-16
                                <div class="wrong_arrow"></div>
                            </div>
                            <input id="usernamecheck" type="text" name="username" placeholder="Username" />
                            <div class="wrong_3">
                                you email is no correct
                                <div class="wrong_arrow_3"></div>
                            </div>
                            <input id="emailcheck" type="email" name="email" placeholder="email" />
                            <div class="wrong_1">
                                you are allow to put from a-z and 0-9 number of char 6-18
                                <div class="wrong_arrow_1"></div>
                            </div>
                            <input id="passwordcheck" type="password" name="password" placeholder="Password"/>
                            <div class="wrong_2">
                                confirm Password not correct
                                <div class="wrong_arrow_2"></div>
                            </div>
                            <input id="conpasswordcheck" type="password" name="con_password" placeholder="confirm Password"/>
                            <select id="countrycheck"name="country" class="form-control" style="background: #414141; border: 1px solid #414141; border-radius: 0; width: 90%; margin-top: 20px; padding: 10px 12px; height: 50px;" required>
<option value="">Country...</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select><br/>
                            <input type="submit" id="quake_submit" value="register" name="register" style="margin-top:0;"/>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="container-fluid">
          <div class="row">
              <div class="sidebar_overlay_10"></div>
          <div class="calcaulater">
              <div class="calcaulater_color">calcaulater</div>
              <div class="calcaulater_contant " style="margin-top: 50px; margin-left: 25px;">
              <span style="font-size: 20px;">Calculate your profit</span><br/>
                  <div style="margin-top: 10px;">
                  <span>Enter deopsite</span>
                      </div>
                  <input type="text" id="input_val" placeholder="Calculate" value="" maxlength="7"/>
                  <div class="caculater_resolt col-lg-6 col-sm-6 col-md-6 col-xs-6">
                        <p>profit</p>
                      <span id="profit">$0</span>
                  </div>
                  <div class="caculater_resolt col-lg-6 col-sm-6 col-md-6 col-xs-6">
                        <p>profit</p>
                      <span id="total_return">$0</span>
                  </div>
              </div>
              </div>
          </div>
      </div>
<?php  include"files/footer.php"; ob_end_flush(); }else{header('Location: https://www.investorsstate.com/laoding.php');}?>