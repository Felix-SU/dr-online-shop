<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Digital Resources</title>
  <link rel="stylesheet" type="text/css"  href="style/main.css">
  <script src="js/lib/jquery.min.js"></script>
</head>
<body>
<?php include_once ("php/query.php"); ?>

<div class="headerBlock">
  <div class="mainNav">
    <nav>
	    <ul class="nav-wrap">
		    <li class="menu-item"><a href="<?php $_SERVER["PHP_SELF"]; ?>">Main</a></li>
			  <li id="about" class="menu-item"><a href="pages/about">About</a></li>
			  <li id="faq" class="menu-item"><a href="pages/faq">F.A.Q</a></li>
        <li class="menu-item" id="theme"><a>Theme</a></li>
        <hr class="underline">
      </ul>
      <div class="rightNav">    
        <?php
          if (!isset($_SESSION["user_id"])) {
        ?>
          <button id="login">Login</button>
          <button id="signup">SignUp</button>
        <?php
        } 
        else {
        ?>
         <div  class="adminButton"  id="admin">Admin Panel</div> 
         <div id="userPh" class="userPhoto"></div>
         <div class="dropdown">
           <div id="dropdown-row" class="dropbtn dropdown-row-a">
            <?php echo getUserData("username"); ?>  
            <div class="dropdown-row-b dropdown-row-a"></div>
           </div>
           <div id="myDropdown" class="dropdown-content">
            <a class="settings" id="settings">Settings</a>
            <a id="exit">Exit</a>
           </div>
      </div>
      <div id ="buyOpenMe"></div>
      <?php
      }
      ?>
    </nav>
  </div>
  <div class="logoBlock">
    <div class="logotype"></div>
  </div>
  <div class="borderTop"></div>
</div>

<div id ="bodyBlock">
  <div class="catalogNav" >
    <div class="catalogTitle"> Catalog</div>
      <ul>
        <a class="catalog-item" id="scetch"><li id ="scetchli">Scetch</li></a>
        <a class="catalog-item" id="arts"><li id="artsli">Arts</li></a>
        <a class="catalog-item" id="textures"><li id="texturesli">Textures</li></a>
        <a class="catalog-item" id="sprites"><li id="spritesli">Sprites</li></a>
      </ul>
  </div> 
  <div id="body-products">
    <div class="products">Products</div>
    <div class="slider">
      <input type="radio" name="slider1" id="slider1_1" checked="checked">
      <label for="slider1_1"></label>
      <div id="slider1_1_a">
        <div id="outerDiv" class="outer-div noee" >
          <video muted  autoplay  id="video1" class="sashaVSouse"></video>
        </div>
      </div>
      <input type="radio" name="slider1" id="slider1_2">
      <label for="slider1_2"></label>
      <div id="slider1_2_a"></div>
      <input type="radio" name="slider1" id="slider1_3">
      <label for="slider1_3"></label>
      <div id="slider1_3_a"></div>
      <input type="radio" name="slider1" id="slider1_4">
      <label for="slider1_4"></label>
      <div  id="slider1_4_a"></div>
      <input type="radio" name="slider1" id="slider1_5">
      <label for="slider1_5"></label>
      <div id="slider1_5_a"></div>
      <input type="radio" name="slider1" id="slider1_6">
      <label for="slider1_6"></label>
      <div  id="slider1_6_a"></div>
    </div>
    <div class ="slider-box"></div>     
    <div id="search-box">
      <input class="input-search" type="text" id="searcInp" >
      <input id="hidenSearchBox" readonly type="text">
      <button type="reset"  class="search searchThemeDark" id="searchButton"></button>
    </div>
    <div id="product"></div>
    <div id="loadMore" class="loadMore">
      <div  class="loadimg"></div>  
    </div>
  </div> 
  <div class="news-nav">
    <div class="news">News</div>
    <ul class="news-block">
      <li class="news-text" >
        Welcome. Welcome to City 17. <br>You have chosen, or been chosen, to relocate to one of our finest remaining urban centers.
        I thought so much of City 17 that I elected to establish my Administration here, in the Citadel so thoughtfully provided by Our Benefactors.
        I have been proud to call City 17 my home. And so, whether you are here to stay, or passing through on your way to parts unknown, welcome to City 17. It"s safer here.
      </li>
      <hr>
      <li class ="news-text">Yay ^_^</li>
      <hr>
      <li class ="news-text">Diplome project"s....<br>Diplome project"s never changes....</li>
      <hr>
      <li class ="news-text">Breaking news.....We do some <s>shit</s> important featche</li>
      <hr>
      <li class ="news-text">
        I used to play a lot of racket sports, tennis and squash.
        <br>And if people come up and say they like the movies you"re in, it"s a great compliment.
        <br>A lot of action movies today seem to have scenes that just lead up to the action.
        <br>And it was a great experience, you know, to travel the world and compete at a certain level. It teaches you discipline, focus, and certainly keeps you out of trouble.
      </li>
      <hr>
      <li class ="news-text">Trump Make America Greate Again,Again</li>
      <hr>
      <li class ="news-text">I can"t let my emotions get in the way. But it"s impossible to forget everything... because I"ve known you for longer than we"ve lived. This is reality. This is the world.</li>
    </ul>
  </div> 
</div> 

<div id="footer">
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
      <li><a href=""><img src="img/facebook.png" width="50px"></a></li>
      <li><a href=""><img src="img/twitter.png" width="50px"></a></li>
      <li><a href=""><img src="img/vk.png" width="50px"></a></li>
      <li><a href=""><img src="img/instagram.png" width="50px"></a></li>
      <li><a href=""><img src="img/icq.png" width="50px"></a></li>
    </ul>
  </div>
  <div class="mapwrapper">
    <iframe class="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3315.170895822351!2d-117.83657895788585!3d33.80790264927272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd7524240d1e1%3A0x82b8362ca610b751!2s1215+N+Tustin+St%2C+Orange%2C+CA+92867%2C+USA!5e0!3m2!1sen!2skz!4v1554379876213!5m2!1sen!2skz" allowfullscreen frameborder="0"></iframe>
  </div>
  <hr class="endline">
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
      <button type="submit" id="modal-submit01">Login</button>
      <div id="container-message01"></div>
    </div>
  </form>
</div>

<div id="modal-container02" class="modal">
  <form class="modal-content modal-animate">
    <div class="close-contaner">
      <span id="closeModal02" class="close">&times;</span>
    </div>
    <div class="container">
      <div class="containerText">Username</div>
      <input class="modal-username"  id="modal-username-sgn"  type="text" placeholder="Enter username" autocomplete="username" >  
      <div class="containerText">Password</div>
      <input  id="modal-pass-sgn"  type="password" placeholder="Enter Password"  autocomplete="new-password"> 
      <div class="containerText">Confirm Password</div>
      <input  id="modal-conf-pass-sgn"  type="password" placeholder="Confirm Password" autocomplete="new-password" >
      <div class="containerText">Email</div>
      <input  id="email"  type="email" placeholder="Enter Email">
      <div id="confirmCode">
        <div  class="containerText">Confirm Code</div>
        <input  id="ConfirmCodeinput" class="modal-username"  type="text" placeholder="Enter Confirm Code">
      </div>          
      <button id="modal-submit02"  value="Submit">SignUp</button>
      <div id="container-message02" class="containerText"></div>
    </div>
  </form>
</div>

<div id="modal-container03" class="modal ">
  <form class="modal-content modal-animate" >
    <div class="close-contaner">
      <span id="closeModal03" class="close" >&times;</span>
    </div>
    <div id="sendMail">
      <div id="busket-elements" class="busketStaff"></div>
      <div id="busket-total"></div>
    </div>
    <div id="busket-message"></div>
    <button id="shoppingcard-buy">Buy Or Die</button>
  </form>
</div>

<div id="modal-container04" class="modal">
  <div class="modal-content modal-animate settingsModal" >
    <div class="close-contaner another-modal">
      <span id="closeModal04" class="close" >&times;</span>
    </div>
    <div id="preview" class="changeUserPhoto"></div>
    <div class="change-password-block">
      <div>Old Password</div>
      <input  class="modal-input" id="currentPassword"  type="password" placeholder="Old Password" name="old-password" required>
      <div>New Passowrd</div>
        <input class="modal-input"  id="newPassword"  type="password" placeholder="New Password" name="new-password" required>
        <div>Confirm New  Password</div>
        <input class="modal-input"  id="newPassword-confirm"  type="password" placeholder="Confirm New Password" name="new-password" required>
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

<div id="modal-container05" class="modal">
  <div class="modal-content modal-animate settingsModal">
    <div class="close-contaner another-modal">
      <span id="closeModal05" class="close">&times;</span>
    </div>
    <div id="previewProduct" class="productPhoto"><?php  echo getUserData("image_name"); ?></div>
    <div class="change-password-block">
      <label for="password"><b>Title</b></label>
      <input  class="modal-input" id="title"  type="text" placeholder="Title of product" name="title" required>
      <label for="password"><b>Cost</b></label>
      <input class="modal-input"  id="costzz"  type="number" placeholder="Cost of product" name="cost" required>
      <label for="password"><b>Category</b></label>
      <select id="categorySelect" class="categorySelect" name="category">
        <option value ="Arts">Arts</option>
        <option value ="Scetch">Scetch</option>
        <option value ="Textures">Textures</option>
        <option value ="Sprites">Sprites</option>
      </select> 
    </div>
    <form id="form2" action="php/products.php" method="post" enctype="multipart/form-data">	
      <input  id="uploadImageProd" class="uplImgBitt" type="file" accept="image/*" name="image"  />
      <input id="upldubBut" class="uploadImg"  type="submit"  value="Save" style="margin-left: 236px;">
      <div id ="modal-message05-1" class="modal-message04-1"></div>
    </form>
  </div>
</div>

<div id="tempBlock"></div>

<div id ="notifyBlock" class="notify"></div>

<script src="js/main.js" async></script>
<script src="js/products.js" async></script> 
</body>

</html>