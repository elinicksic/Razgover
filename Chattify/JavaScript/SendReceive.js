function sendMessage(msg, gid, successFunction)
{
    $.ajax({
        url:'send.php',
        method:'POST',
        data:{
            gid: gid,
            msg: msg
        },
        success: successFunction()
    });
}

function loadMessages(gid){
    $.post("load.php", {gid:gid}, function(result){
        $("#output").html(result);
    });
}