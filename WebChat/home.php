<!DOCTYPE html>
<html>
    <head>
    	<title></title>
    	<style>
    		
    	</style>
    </head>
    <body>
        <div id="main">
            <h1 style="background-color: #6495ed;color: white;">Group Name</h1> <!-- Group name -->
            <div id="output">
        	    <!--Code...-->
            </div>
            <form method="post" action="send.php">
                <textarea name="msg" placeholder="Type in your message..." class="form-control"></textarea><br />
                <input type="submit" value="Send" />
            </form>
            <br />
            <form action="logout.php">
                <input style="width: 100%;background-color: #6495ed;color: white;font-size: 20px;" type="submit," name="Logout">
            </form>
        </div> 
    </body>
</html>