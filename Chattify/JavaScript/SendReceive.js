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
        msgObj = JSON.parse(result);
        var outputVar = "";
        for(x = 0; x < msgObj.length; x++){
            if(msgObj[x].isCurrentUser){
                //It is the current user
                outputVar += "<div class='media'> " +
                    "<div class='media-body'>" +
                    "<h4 class='media-heading'>" + msgObj[x].sender + "</h4>" +
                    "<p>" + msgObj[x].msg + "</p>" +
                    "</div>" +
                    "<div class='media-right'>" +
                    "<img src='https://t4.ftcdn.net/jpg/02/15/84/43/240_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg' class='media-object' style='width:60px'>\n" +
                    "</div>" +
                    "</div>";
            } else {
                //Somebody else
                outputVar += "<div class='media'> " +
                    "<div class='media-left'>" +
                    "<img src='https://t4.ftcdn.net/jpg/02/15/84/43/240_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg' class='media-object' style='width:60px'>" +
                    "</div>" +
                    "<div class='media-body'>" +
                    "<h4 class='media-heading'>" + msgObj[x].sender + "</h4>" +
                    "<p>" + msgObj[x].msg + "</p>" +
                    "</div>" +
                    "</div>";
            }
            $("#output").html(outputVar);
        }

    });
}