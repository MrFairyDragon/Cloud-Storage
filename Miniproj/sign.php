<html>


<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script type="text/javascript">

        function do_login()
        {
            var name = document.getElementById("nameLogin").value;
            var pass = document.getElementById("passLogin").value;
            if (name != "" && pass != "")
            {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function ()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                        var res = String(xmlhttp.responseText);
                        var successResponse = res.split(".")[1];

                        if(successResponse == "success")
                        {
                            //alert("Success! " + this.responseText);
                            window.location.href = "uploader.php";
                        }
                        else
                        {
                            //alert("Failed to login: " + this.responseText);
                            alert("Wrong username/password, please try again");
                        }
                    }
                }
                xmlhttp.open("POST", "login.php?name=" + name + "&pass=" + pass);
                xmlhttp.send();
            }
            else
            {
                alert("Please fill in all the details");
            }
            return false;
        }
    </script>
</head>

<body>
<div class="login-container">
	<p1>Username</p1>
        <p2>Password</p2>
        <form class="myformclass" method="post" onsubmit="return do_login();">
            <input type="text" id="nameLogin" name="usernameLogin" />
            <input type="text" id="passLogin" name="passwordLogin" />
            <input type="submit" name= "login" value = "Log in" id="loginButton">
        </form>

        <form class="myformclass" method="post" action="sign-up.php">
            <input type="text" id="nameSignup" name="usernameSignUp" />
            <input type="text" id="passSignup" name="passwordSignUp" />
            <button>Register</button>
        </form>
</div>

<div class="animation-container">
	<img class="images" src="img/preview1.png">

</div>
</body>
</html>