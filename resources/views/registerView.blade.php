<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
    </head>  
    <body>
        <h1>WEERATHUNGA GARMENTS</h1>
        <h2>Enter Your Details</h2>
        <form method="post" action="{{route('registerUser')}}">
            @csrf
            <label for="name">Username:</label><br>
            <input required type="text" id="user_name" name="name" placeholder="Username"><br>
            <label for="email">Email:</label><br>
            <input required type="email" id="user_email" name="email" placeholder="Email Address">
            <label for="password">Password:</label><br>
            <input required type="password" id="user_password" name="password" placeholder="Password">
            <label for="password_confirmation">Email:</label><br>
            <input required type="password" id="user_confirm_password" name="password_confirmation" placeholder="Confirm Password">
            <input type="submit">
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body> 
</html>