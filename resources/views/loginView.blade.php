<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
    </head>  
    <body>
        <h1>WEERATHUNGA GARMENTS</h1>
        <h2>Enter Your Login Credentials</h2>
        <form method="post" action="{{route('loginUser')}}">
            @csrf
            <label for="email">Email:</label><br>
            <input required type="email" id="email" name="email" placeholder="Email"><br>
            <label for="password">Password:</label><br>
            <input required type="password" id="user_password" name="password" placeholder="Password">
            <input type="submit">
        </form>
    </body> 
</html>