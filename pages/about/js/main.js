
$(document).ready(function(){
    var currTheme = false;
    var storage = localStorage['theme'];    
    
    function darkSettings() {
        $('body').css('background-color','rgb(32, 32, 33)');
        $('.modal-content').css('background-color', 'rgb(32, 32, 33)');
        $('input').css('background-color', 'rgb(73, 74, 79)');
        $('#bodyMod').css('color', 'rgb(153, 151, 151)');
        $('li').css('color', 'rgb(153, 151, 151)');
        $(".input-search").css('border','4px solid #FFFFFF');
        $(".search").removeClass("searchThemeLite");
        $(".search").addClass("searchThemeDark");
        $("#searcInp").css("color","white");
        $("#searcInp").css("background-color","rgb(73, 74, 79)");
        $(".dropdown-content").css("background-color","rgb(73, 74, 79)");
        $('#upldub').css('background-color','rgb(73, 74, 79)');
        $('#saveNewPass').css('background-color','rgb(73, 74, 79)');
        $("#categorySelect").css('background-color','rgb(94, 93, 93)');
        $("#upldubBut").css("background-color",'rgb(94, 93, 93)');       
        $("body").css("color","rgb(153, 151, 151)");
        $("#footer").css("background-color","rgb(32, 32, 33)")
    }
    function liteSettings() {
        $('body').css('background-color','rgb(244, 245, 247)');
        $('#bodyMod').css('color', 'rgb(56, 57, 58)');
        $('.modal-content').css('background-color', 'rgb(244, 245, 247)');
        $('input').css('background-color', 'rgb(244, 245, 247)');
        $('li').css('color', 'rgb(56, 57, 58)');
        $(".input-search").css('border','4px solid rgb(94, 93, 93)');
        $(".search").removeClass("searchThemeDark");
        $(".search").addClass("searchThemeLite");
        $("#searcInp").css("background-color","white");
        $("#searcInp").css("color","black");
        $(".dropdown-content").css("background-color","#f1f1f1");
        $(".dropdown-content").css("background-color","#f1f1f1");
        $('#upldub').css('background-color','red');
        $('#saveNewPass').css('background-color','red');
        $("#categorySelect").css('background-color','rgb(244, 245, 247)');
        $("#upldubBut").css("background-color",'red');
        $("#upload-image-button").css("background-color","red");
        $("#footer").css("background-color","rgb(244, 245, 247)")

    }
    $.fn.dark =  function(click)
    {
        if(click == true) {
        $(this).prop("disabled",true);
            $('body').fadeOut(1200, function () {    
                darkSettings();
                $('body').fadeIn(2000);
            });
        }
        else {
            darkSettings();
        }
        $(this).prop("disabled",false);
     };
    
     $.fn.lite =  function(click)
        {
            if(click == true) {
                $(this).prop("disabled",true);
                $('body').fadeOut(1200, function () {    
                    liteSettings();
                    $('body').fadeIn(2000);
                });
        }
        else {
            liteSettings();
        }
        $(this).prop("disabled", false);
    }; 

    if (typeof storage === 'undefined')
        {
            localStorage['theme'] = false;
            currTheme = false;
        }
        else if (storage == 'false')
        {
            $("#addNewProd").dark(false);
            currTheme = false;
        }
        else if (storage == 'true')
        {
            $("#addNewProd").lite(false);
            currTheme = true;
        }
        $('#theme').click(function() {
            if (currTheme == false) {
                currTheme = true;
                localStorage['theme'] = true;
                $("#addNewProd").lite(true);
            }
            else if (currTheme == true) {
                currTheme = false;
                localStorage['theme'] = false;
                $("#addNewProd").dark(true);
            }

        });

        var email_key = "";

    if($(".rightNav").length) {
        var w1 = $("#dropdown-row").text();
        w1 = w1.trim();
        var w2 = $("#preview").text();
        if (w1 == "admin") {
          $("#admin").show();
        }
        $("#preview").css({content:"url(../"+w2+")"}).fadeIn();
        $("#userPh").css({content:"url(../"+w2+")"}).fadeIn();
        $("#preview").text("");
    }
    $("#closeModal01").click(function() {
        $('#modal-username01').val('');
        $('#modal-password-login').val('');
        $('body').removeClass('stop-scrolling');
        $('#modal-container01').hide();
    })

    $("#exit").click(function() {
        $.ajax({
            url: '../../../php/query.php',
            data: {
                action: "userExit",
            },
            type: 'post',
            success: function() {
                location.reload();
            }
          });
    })

    $("#modal-submit01").click(function(){
        var usrname = $("#modal-username01").val();
        var psw = $("#modal-password-login").val();
        var dataString = 'username='+ usrname + '&password='+ psw;
            $.ajax({
                type: "POST",
                url: "../../../php/login.php",
                data: dataString,
                cache: false,
                beforeSend : function()
                {
                    $("#container-message01").fadeOut();
                },
                success: function(result)
                {
                    $( "#container-message01" ).text(result).fadeIn();
                    if(result == "Yay :3")
                    {
                        $("#container-message01").empty();
                        $('#success-login').append("<img id = 'scienceB' src = '../../../img/yeah-programming-bitch.jpg' height = '800px' width = '800px'>");
                        setTimeout(function(){
                            $("#success-login").remove();
                            location.reload();
                        }, 300);
                    }
                }
            });
        
        return false;
    });

    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
      } 
        $("#modal-submit02").click(function(){
        var usrname = $("#modal-username-sgn").val();
        var psw1 = $("#modal-pass-sgn").val();
        var psw2 = $("#modal-conf-pass-sgn").val();
        var email = $("#email").val();
        if( $('#confirmCode').is(':visible') ) {
            var temp_key = $("#ConfirmCodeinput").val();
        }
        else  {
            var temp_key = "";
        }
        $( "#email" ).change(function() {
            email_key = "";
        })
            $.ajax({
                type: "POST",
                url: "../../../php/reg.php",
                data: { 
                name1:usrname,
                email1:psw1,
                password1:psw2,
                email:email,
                temp_key:temp_key,
                email_key: email_key,
                },
                cache: false,
                beforeSend : function()
                {
                    $("#container-message02").fadeOut();
                    if(usrname !== "" && psw1 !=="" && psw2 !=="" && email !="" && email_key == "" && psw1 == psw2 && validateEmail(email)) {
                        $("#container-message02").fadeIn();
                        $("#container-message02").empty();
                        $("#container-message02").append("<img height='100px' width='100px' src='../../../img/codeLoad.gif'>");
                    }
                },
                success: function(result)
                {
                    var data = $.parseJSON(result);
                    $( "#container-message02" ).text(data[0]).fadeIn();
                    if(data[0] == "Nice Done ( ͡° ͜ʖ ͡°)")
                    {
                        setTimeout(function(){
                            $("#closeModal02").click();
                        }, 1000);                
                    }
                    else if (data[1] !== "") {
                            $("#confirmCode").show();
                        $( "#container-message02" ).text(data[0]).fadeIn();
                        if(email_key == "") {
                        email_key = data[1];   
                        }
                    }
                }
            });
        return false;
    });
    

    $("#closeModal02").click(function() {
        $('#container-message02').empty();
        $('#modal-username-sgn').val('');
        $('#modal-pass-sgn').val('');
        $('#modal-conf-pass-sgn').val('');
        $('#email').val('');
        $("#confirmCode").css("display","none");
        $("#ConfirmCodeinput").val('');
        email_key = "";
        $('body').removeClass('stop-scrolling');
        $('#modal-container02').hide();
    })


    $("#closeModal04").click(function() {
        $("#currentPassword").val("");
        $("#newPassword").val("");
        $("#newPassword-confirm").val("");
        $("#modal-message04-1").text("⠀⠀");
        $("#modal-message04-2").empty();
        $('body').removeClass('stop-scrolling');
        $('#modal-container04').hide();
    })

    

    $("#settings").click(function() {
        $('body').addClass('stop-scrolling');   
        $('#modal-container04').show();
    })

    $("#login").click(function() {
        $('body').addClass('stop-scrolling');
        $('#modal-container01').show();
    })

    $("#signup").click(function() {
        $('body').addClass('stop-scrolling');
        $('#modal-container02').show();
    })

    


$( "#dropdown-row" ).click(function() {
    myFunction();
});

function myFunction() {

    document.getElementById("myDropdown").classList.toggle("show");
  }
  window.onclick = function(event) {
    if (!event.target.matches('.dropdown-row-a')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
$("#saveNewPass").click(function(){
var oldPass = $("#currentPassword").val();
var NewPass1 = $("#newPassword").val();
var newPass2 = $("#newPassword-confirm").val();
changePass(oldPass,NewPass1,newPass2);
})
function changePass(oldPass,NewPass1,NewPass2){
    $.ajax({ url: '../../../../php/query.php',
           data: {
               action: "changePassword",
               oldPassword: oldPass,
               newPassword1: NewPass1,
               newPassword2: NewPass2,
          },
           type: 'post',
           beforeSend : function()
           {
               $("#modal-message04-2").fadeOut();
           },
           success: function(output) {
              $("#modal-message04-2").text(output).fadeIn();
           }
          })
      }
    
	var fileExist = false;
    var fileExist = false;
    $("#form").on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData($('#form')[0]);
        formData.append('image', $('input[type=file]')[0].files[0]);
        formData.append("action","uploadProfilePhoto");
    $( "#uploadImage" ).change(function() {
        fileExist = true;
    })
    $.ajax({
  url: "../../../../php/query.php",
        type: "POST",
        data:  formData,
            contentType: false,
            cache: false,
            processData:false,
        beforeSend : function()
        {

            $("#modal-message04-1").fadeOut();
        },
        success: function(data)
        {
            if(data == 'invalid')
            {
                if (fileExist == true){
                $("#modal-message04-1").html("Invalid File !").fadeIn();
                }
                else {
                    $("#modal-message04-1").html("File Doesn't Exit !010!").fadeIn();
                }
            }
            else
            {
                $("#userPh").css({content:"url(../"+data+")"}).fadeIn();
                $("#preview").css({content:"url(../"+data+")"}).fadeIn();
                $("#form")[0].reset();	
            }
        },
          error: function(e) 
        {
                
            $("#modal-message04-1").html(e).fadeIn();
            }
   });
}));


});