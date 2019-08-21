//start the people in group var empty
var peopleingroup = "";
$(document).ready(function(){
    //hide the create group view when page loads (needs work to make it before page shows. You can see a quick flash of it)
    $("#creategroupview").hide();

    //when the form for adding a user to the group is finished
    $("#addpersonform").submit(function(){

        //remove any spaces then check for an empty field
        var usernameinbox = $("#AddUsernameBox").val().trim();
        if(usernameinbox != ''){
            //if the value entered it not empty add the user to the peopleingroup var separated with a comma
            $("#peoplelist").append("<li>" + usernameinbox + "</li>");
            peopleingroup += usernameinbox + ",";
            //clear the Username field
            $("#AddUsernameBox").val("");
        }
    });
    //When the group with all the users and name is submitted
    $("#submitgroup").click(function(){
        //store the group name from the field into a var
        var groupname = $("#groupnamebox").val();
        //send the group to the server with ajax
        $.ajax({
            url:'addgroup.php',
            method:'POST',
            data:{
                name: groupname,
                people: peopleingroup
            },
            //if it succeeds clear all the fields, switch to the message view, and reload the groups
            success:function(data){
                loadMessages(currentGroup);
                clearAllFields();
                changeView(0);
                $("#sidenav").load("load_groups.php");

            }
        });
    });
    //if the cancel button is pressed, clear the fields and switch to the messages view
    $("#cancelgroupcreate").click(function()
    {
        clearAllFields();
        changeView(0);
    });
});

//some other functions
function clearAllFields()
{
    $("#groupnamebox").val('');
    $("#AddUsernameBox").val('');
    $("#peoplelist").empty();
}