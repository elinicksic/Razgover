function trySignup(uname, pass, passconf, email)
{
    $.ajax({
        url:'http://localhost/Chattify/Chattify/include/signup.inc.php',
        method:'POST',
        data:{
            uname: uname,
            pass: pass,
            passconf: passconf,
            email: email
        },
        success: function(result){
            if(result != ''){
                $("#alerts").append("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error </strong>".concat(result, "</div>"));
            }else{
                window.location.replace("home.php");
            }
        }
    });

}