//Test
document.getElementById("demo").innerHTML = 5 + 6;

//Test
function myFunction2() {
    document.getElementById("Game").innerHTML = "You can buy any games here!";
}



//Submit Function + check the blank box
function myFunction4() {
	    var x = document.forms["info"]["mail"].value;
    if (x == "") {
        alert("Please type your Email !");
        return false;
		
    }
	
	else {
		 window.alert("Received your message.We will give reply within 7days.Thank You!Redirecting to home page........");
		 window.location.assign("/index");
        }
}





function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByClassName("modal-title");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}


// loginPage Function
var loginPage = document.getElementById('id01');


window.onclick = function(event) {
    if (event.target == loginPage) {
        modal.style.display = "none";
    }
}

$(".nav a").on("click", function(){
    $(".nav").find(".active").removeClass("active");
    $(this).parent().addClass("active");
 });
