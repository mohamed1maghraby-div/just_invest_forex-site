jQuery(document).ready(function($){
    /*display message user*/
    $("#quake_message_number").on("click", function(){
        $(".message_box").toggleClass("message_box_on");
        $(".message_box_overlay").toggleClass("message_box_overlay_on");
    });
    /*display login query*/
    $(".choice_login").on("click", function(){
        $(".choice_login").toggleClass("earth_quake");
        $(".choice_reg").toggleClass("earth_quake");
        $(".logincollection").fadeToggle(3000);
    });
    $(".choice_reg").on("click", function(){
        $(".choice_login").toggleClass("earth_quake");
        $(".choice_reg").toggleClass("earth_quake");
        $(".regcollection").fadeToggle(3000);
    });
    /*dispaly madiaquaery*/
    $(".button_madiaquary_display").on("click", function(){
        $(".header ul").toggleClass("earth_quake");
    });
    
    /*regolar expertion*/
    
    $("#usernamecheck").blur(function(){
            var usernamecheck = $('#usernamecheck').val();
            var usernamecheck_1 = /^[a-z0-9_-]{6,16}$/;
            if(usernamecheck_1.test(usernamecheck) === true){
                $("#usernamecheck").css("border" , "none");
                $(".wrong").css("opacity" , "0");
                window.usernameendcheck = 1;
                $('#quake_submit').attr("disabled", false);
            }else{
                $("#usernamecheck").css("border" , "1px solid #b00");
                $(".wrong").css("opacity" , "1");
            }
    });
    $("#emailcheck").blur(function(){
            var emailcheck = $('#emailcheck').val();
            var emailcheck_1 = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2})/;
        if(emailcheck_1.test(emailcheck) === true){
            $("#emailcheck").css("border" , "none");
                $(".wrong_3").css("opacity" , "0");
                window.emailendcheck = 1;
            $('#quake_submit').attr("disabled", false);
        }else{
                $("#emailcheck").css("border" , "1px solid #b00");
                $(".wrong_3").css("opacity" , "1");
            }
    });
        $("#passwordcheck").blur(function(){
            window.passwordcheck = $('#passwordcheck').val();
            var passwordcheck_1 = /^[a-z0-9_-]{6,18}$/;
        if(passwordcheck_1.test(window.passwordcheck) === true){
            $("#passwordcheck").css("border" , "none");
                $(".wrong_1").css("opacity" , "0");
                window.passwordendcheck = 1;
            $('#quake_submit').attr("disabled", false);
        }else{
                $("#passwordcheck").css("border" , "1px solid #b00");
                $(".wrong_1").css("opacity" , "1");
            }
    });
     $("#conpasswordcheck").blur(function(){
            var conpasswordcheck = $('#conpasswordcheck').val();
        if(conpasswordcheck === window.passwordcheck){
            $("#conpasswordcheck").css("border" , "none");
                $(".wrong_2").css("opacity" , "0");
                window.conpasswordendcheck = 1;
            $('#quake_submit').attr("disabled", false);
        }else{
                $("#conpasswordcheck").css("border" , "1px solid #b00");
                $(".wrong_2").css("opacity" , "1");
            }
    });
    $("#quake_submit").click(function(){
    if(window.usernameendcheck === 1 && window.emailendcheck === 1 && window.passwordendcheck === 1 && window.conpasswordendcheck === 1){
        $('#quake_submit').attr("disabled", false);
    }else{
        $('#quake_submit').attr("disabled", true);
    }
        });
    
    /*
    ============================
        edit profile display
    ============================
    */
    $("#frist_name").keyup(function(){
            var input = $('#frist_name').val();
            $("#frist_name_word").text(input);
        });
    $("#last_name").keyup(function(){
            var input = $('#last_name').val();
            $("#last_name_word").text(" " + input);
        });
     $("#quake_company").keyup(function(){
            var input = $('#quake_company').val();
            $("#quake_company_word").text(input);
        });
    $("#quake_email").keyup(function(){
            var input = $('#quake_email').val();
            $("#quake_email_word").text(input);
        });
    $("#quake_line_1").keyup(function(){
            var input = $('#quake_line_1').val();
            $("#quake_line_1_word").text(input);
        });
    $("#quake_line_2").keyup(function(){
            var input = $('#quake_line_2').val();
            $("#quake_line_2_word").text(input);
        });
    $("#quake_city").keyup(function(){
            var input = $('#quake_city').val();
            $("#quake_city_word").text(input);
        });
    $("#quake_country").keyup(function(){
            var input = $('#quake_country').val();
            $("#quake_country_word").text(input);
        });
    
    
    $(".sidebar").on("click", function(){
        $('.sidebar_arrow').toggleClass("glyphicon-menu-up");
        $('.main_sidebar').toggleClass("main_sidebar_on");
        $('.sidebar').toggleClass("sidebar_on");
        $('.sidebar_overlay').toggleClass("sidebar_overlay_on");
    });
    $(".sidebar_overlay").on("click", function(){
        $('.sidebar_arrow').toggleClass("glyphicon-menu-up");
        $('.main_sidebar').toggleClass("main_sidebar_on");
        $('.sidebar').toggleClass("sidebar_on");
        $('.sidebar_overlay').toggleClass("sidebar_overlay_on");
    });
    $("#input_val").keyup(function(){
            var input = $('#input_val').val();
            var profit = input * 1/100;
            var totl_return = profit * 60 ;
            $("#profit").text("$" + profit);
            $("#total_return").text("$" + totl_return);
        });
    $(".calcaulater_color").on("click", function(){
        $('.calcaulater_color').toggleClass("calcaulater_color_on");
        $('.calcaulater').toggleClass("calcaulater_on");
        $('.sidebar_overlay_10').toggleClass("sidebar_overlay_on_10");
    });
    $(".sidebar_overlay_10").on("click", function(){
        $('.calcaulater_color').toggleClass("calcaulater_color_on");
        $('.calcaulater').toggleClass("calcaulater_on");
        $('.sidebar_overlay_10').toggleClass("sidebar_overlay_on_10");
    });
    function book_suggestion()
{
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
     xhr.open("POST", "show_admin_message.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send();
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       //alert(xhr.responseText);	   
	  document.getElementById("profile_body").innerHTML = xhr.responseText;
          console.log('medo');
      } else {
        alert('There was a problem with the request.');
      }
     }
	}
}
    $("path").first().css("fill","rgba(255, 255, 255, .4)");
});

var copyBtn = document.querySelector('#copy_btn');
copyBtn.addEventListener('click', function () {
  var urlField = document.querySelector('#url_field');
  // select the contents
  urlField.select();
   
  document.execCommand('copy'); // or 'cut'
}, false);

