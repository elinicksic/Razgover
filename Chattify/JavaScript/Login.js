function tryLogin(uname, pass)
{
    $.ajax({
        url:'http://localhost/Chattify/Chattify/include/login.inc.php',
        method:'POST',
        data:{
            uname: uname,
            pass: pass
        },
        success: function(result){
            if(result == "0"){
                $("#alerts").append("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error</strong> Username or password is incorrect!</div>");
            }else if(result == "1"){
                window.location.replace("home.php");
            }
        }
    });

}