<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<center><h2>Modal Login Form</h2></center>


<div>
    <center>
        <form action="/login" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            USERNAME : <input type="text" name="username"></br>
            PASSWORD : <input type="password" name="password"></br>

            <input type="submit" name="login" value="Login">

        </form>

    </center>
</div>


</body>
</html>




<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13/1/2019
 * Time: 2:49 AM
 */







