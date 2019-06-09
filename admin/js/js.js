jQuery(document).ready(function($){
$(".admin_side_bar_menu").on("click", function(){
        $('.admin_main_menu').toggleClass("admin_main_menu_on");
        $('.admin_side_bar_menu').fadeToggle(100);
        $('.cross').fadeToggle(2000);
        $('.sidebar_overlay_pro_1').toggleClass("sidebar_overlay_pro_on_1");
    });
    $(".sidebar_overlay_pro_1").on("click", function(){
        $('.admin_main_menu').toggleClass("admin_main_menu_on");
        $('.admin_side_bar_menu').fadeToggle(2000);
        $('.cross').fadeToggle(1000);
        $('.sidebar_overlay_pro_1').toggleClass("sidebar_overlay_pro_on_1");
    });
     $(".cross").on("click", function(){
        $('.admin_main_menu').toggleClass("admin_main_menu_on");
        $('.admin_side_bar_menu').fadeToggle(2000);
        $('.cross').fadeToggle(1000);
        $('.sidebar_overlay_pro_1').toggleClass("sidebar_overlay_pro_on_1");
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
    $("table a").click(function(){
        window.myId = $(this).attr("id");
        $("#" + myId + "_show").toggleClass("generaly_user_info_on");
        $('.sidebar_overlay_pro').toggleClass("sidebar_overlay_pro_on");
        console.log(window.myId);
    });
    $(".sidebar_overlay_pro").on("click", function(){
        $("#" + window.myId + "_show").toggleClass("generaly_user_info_on");
        $(".sidebar_overlay_pro").toggleClass("sidebar_overlay_pro_on");
        console.log(window.myId);
    });
    $(".prorfile_colse").on("click", function(){
         $("#" + window.myId + "_show").toggleClass("generaly_user_info_on");
        $(".sidebar_overlay_pro").toggleClass("sidebar_overlay_pro_on");
        console.log("medo");
    });
    if(window.location.href.indexOf("?num") == 65){
        window.depid = window.location.href.substring(window.location.href.indexOf("&user") + 6);
        $("#" + window.depid + "_show").toggleClass("generaly_user_info_on");
        $('.sidebar_overlay_pro').toggleClass("sidebar_overlay_pro_on");
        console.log(window.depid);
    }
    if(window.location.href.indexOf("?num") == 54){
        window.depid = window.location.href.substring(window.location.href.indexOf("&user") + 6);
        $("#" + window.depid + "_show").toggleClass("generaly_user_info_on");
        $('.sidebar_overlay_pro').toggleClass("sidebar_overlay_pro_on");
        console.log(window.depid);
    }
    $(".prorfile_colse").on("click", function(){
        $("#" + window.depid + "_show").toggleClass("generaly_user_info_on");
        $(".sidebar_overlay_pro").toggleClass("sidebar_overlay_pro_on");
        $(".sidebar_overlay_pro").toggleClass("sidebar_overlay_pro_on");
        console.log("medo");
    });

});
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
    console.log('medo');
}