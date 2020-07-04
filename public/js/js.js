$(document).ready(function () {

    $('#task').submit(function () {
        name = $("#usrins").val();
        email = $("#emailins").val();
        task = $("#taskins").val();
        
         if (name == '' || email == '' || task == '') {
          $('#usrins, #emailins, #taskins').each(function() {
            if ($(this).val() == '') {
              $(this).css("border", "2px solid red");  
            }
          });

            alert("Please fill all fields");
            return false;

        }
        
        if (validateEmail()) {
            $("#emailins").css("border", "2px solid green");
        } else {
            $("#emailins").css("border", "2px solid red");
            alert("Please fill validate email");
            return false;

        }

    });

    $('#auth').submit(function () {
        name = $(".user").val();
        pass = $(".pass").val();

        if (name.length == 0 || pass.length == 0) {

            alert("Please fill all fields");
            return false;

        }

        if (name !== 'admin' || pass !== '123') {

            alert("Username or password is wrong");
            return false;

        }

    });




})


function validateEmail() {

    var email = $("#emailins").val();

    var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if (reg.test(email)) {
        return true;
    } else {
        return false;
    }

}


