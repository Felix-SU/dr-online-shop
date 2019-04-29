<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Digital Resources</title>
  <link rel="stylesheet" type="text/css"  href="style/main.css">
  <script src="../../js/lib/jquery.min.js"></script>
</head>
<body>
<?php include_once ("../../php/query.php"); ?>

<div class="headerBlock">
  <div class="drNav">
    <nav>
	    <ul class="nav-wrap">
		    <li  id="main" class="menu-item"><a href="../../">Main</a></li>
			  <li id="about" class="menu-item"><a href="../about">About</a></li>
			  <li id="faq" class="menu-item"><a href="">F.A.Q</a></li>
        <li class="menu-item" id="theme"><a>Theme</a></li>
        <hr class="underline">
      </ul>
      <?php
        if (!isset($_SESSION["user_id"])) {
      ?>
          <div class="rightNav">
          <button id="login">Login</button>
          <button id="signup">SignUp</button>
      <?php
      } 
      else {
      ?>
  <div class="rightNav">
            <div id="userPh" class="userPhoto"></div>
            <div class="dropdown">
              <div id="dropdown-row" class="dropbtn dropdown-row-a">
              <?php echo getUserData("username"); ?>  
              <div class='dropdown-row-b dropdown-row-a'></div>
              </div>
              <div id="myDropdown" class="dropdown-content">
              <a class="settings" id="settings">Settings</a>
              <a id="exit">Exit</a>
            </div>
      <?php
      }
      ?>
          </div>

</nav>
  </div>
    <div class="logoBlock">
      <div class="logotype"></div>
    </div>
    <div class="borderTop"></div>
    </div>
  <div id ="bodyBlock">
        <div class="catalogNav" >            
          </div>

          <div id="body-products">
      <div class="products">F.A.Q</div>
      
<div class="dropdown">
  <div class="dropdown__top">Do you have refand?</div>
  <div class="dropdown__btm">
  <img src="img/giphy.gif" class="dropImg">
  </div>
</div>

<div class="dropdown">
  <div class="dropdown__top">Do you know  your website is useless</div>
  <div class="dropdown__btm">
  <img src="img/smile.gif" class="dropImg" >
  </div>
</div>

<div class="dropdown">
  <div class="dropdown__top">What can site do</div>
  <div class="dropdown__btm">
  <img class="dropImg" src="img/everything.gif">
  </div>
</div>
<div class="dropdown">
  <div class="dropdown__top">Why you always answer by gif</div>
  <div class="dropdown__btm">
      Because it's funny
  </div>
</div>
    </div>




      
   
    </div>

  <div id="footer" class="footer">
    <div class="nav-contacts">
        Contacts:
      <ul class="contacts-elem">
        <li>+77074534772 | gaben@gmail.com</li>
        <li>+77013784022 | zuckerberg@gmail.com</li>
        <li>+77778456351 | jhohromero@gmail.com</li>
        <li>+77015466991 | trump@gmail.com</li>
        <li>+77074513729 | сhurchill@gmail.com</li>
        <hr class="contacs-line" >
        <li>Address: City.California, St.Tustin 1215</li>
      </ul>
      <ul class="social">
        <li><a href=""><img src="../../img/facebook.png" width="50px"></a></li>
        <li><a href=""><img src="../../img/twitter.png" width="50px"></a></li>
        <li><a href=""><img src="../../img/vk.png" width="50px"></a></li>
        <li><a href=""><img src="../../img/instagram.png" width="50px"></a></li>
        <li><a href=""><img src="../../img/icq.png" width="50px"></a></li>
      </ul>
    </div>
    <div class="mapwrapper">
    <iframe class="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3315.170895822351!2d-117.83657895788585!3d33.80790264927272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd7524240d1e1%3A0x82b8362ca610b751!2s1215+N+Tustin+St%2C+Orange%2C+CA+92867%2C+USA!5e0!3m2!1sen!2skz!4v1554379876213!5m2!1sen!2skz" allowfullscreen frameborder="0"></iframe>
  </div>
  <hr class="endline" >
    <div class="borderDown"></div>
  </div>



    <div id="modal-container01" class="modal">
  <div id="success-login"></div>
  <form class="modal-content modal-animate">
    <div class="close-contaner">
      <span id="closeModal01"  class="close">&times;</span>
    </div>
    <div class="container">
      <div>Username</div>
      <input class="modal-username" id="modal-username01" type="text" placeholder="Enter Username"  autocomplete="username">
      <div>Password</div>
      <input id="modal-password-login" type="password" placeholder="Enter Password" autocomplete="current-password">
      <button type="submit" id = "modal-submit01">Login</button>
      <div id = "container-message01"></div>
    </div>
  </form>
  </div>

  <div id="modal-container02" class="modal">
    <form class="modal-content modal-animate">
      <div class="close-contaner">
        <span id = "closeModal02"   class="close">&times;</span>
      </div>
      <div class="container">
        <div class="containerText">Username</div>
        <input class="modal-username"  id = "modal-username-sgn"  type="text" placeholder="Enter username" autocomplete="username" >  
        <div class="containerText">Password</div>
        <input  id = "modal-pass-sgn"  type="password" placeholder="Enter Password"  autocomplete="new-password"> 
        <div class="containerText">Confirm Password</div>
        <input  id = "modal-conf-pass-sgn"  type="password" placeholder="Confirm Password" autocomplete="new-password" >
        <div class="containerText">Email</div>
        <input  id = "email"  type="email" placeholder="Enter Email">
        <div id="confirmCode">
        <div  class="containerText">Confirm Code</div>
        <input  id = "ConfirmCodeinput" class="modal-username"  type="text" placeholder="Enter Confirm Code">
        </div>          
        <button id = "modal-submit02"  value="Submit">SignUp</button>
        <div id = "container-message02" class="containerText"></div>
      </div>
    </form>
    </div>


    <div id="modal-container04" class="modal">
    <div class="modal-content modal-animate settingsModal" >
    <div class="close-contaner another-modal">
        <span id = "closeModal04" class="close" >&times;</span>
      </div>
     <div id="preview" class="changeUserPhoto"><?php  echo getUserData("image_name"); ?></div>
     <div class="change-password-block">
  <div>Old Password</div>
        <input  class="modal-input" id = "currentPassword"  type="password" placeholder="Old Password" name="old-password" required>
  <div>New Passowrd</div>
        <input class="modal-input"  id = "newPassword"  type="password" placeholder="New Password" name="new-password" required>

        <div>Confirm New  Password</div>
        <input class="modal-input"  id = "newPassword-confirm"  type="password" placeholder="Confirm New Password" name="new-password" required>
        
</div>
    <form id="form" action="php/uploadProfilePhoto.php" method="post" enctype="multipart/form-data">	
  <input  id="uploadImage" type="file" accept="image/*" name="image" />
  <div class="flexParty">
  <input id="upload-image-button" type="submit"  value="Upload">
  <div id="saveNewPass" class="updatePasswordButt">Save</div>
  </div>
  <div class="flexParty">
    <div id="modal-message04-1">⠀⠀</div>
    <div id="modal-message04-2"></div>
  </div>
</form>

      </div>
      
    </div>

    
    </div>



<script src="js/main.js"></script>
</body>

</html>