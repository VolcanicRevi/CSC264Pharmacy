
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pharmacy With Us</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>

<header>
    <h2 class="logo">Pharmacy With Us</h2>
  
</nav>
    <nav class="navigation">
        <button class="btnLogin-popup">Login</button> 
        <a href="LoginAdmin.php">Admin</a>
    </nav>
</header>

 <div class = "wrapper">
 <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>

    <div class="form-box login">

    <h2>Login</h2>
    <form action="login_user.php" method="post">
        <div class="input-box">
           <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
           <input type="username" name= "username" required>
           <label>Username</label>
        </div>
        <div class="input-box">
           <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
           <input type="password" name= "password" required>
           <label>Password</label>
        </div>
        <button type="submit" name='login' value="Login" class="btn">Login</button>
    </form>

    </div>

    <div class="form-box register">
    <h2>Registration</h2>
    <form action= "register_user.php" method="post">
        <div class="input-box">
           <span class="icon"><ion-icon name="mail"></ion-icon></span>
           <input type="text"  name= "email" required>
           <label>Email</label>
        </div>
        <div class="input-box">
           <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
           <input type="username"  name= "username" required>
           <label>Username</label>
        </div>
        <div class="input-box">
           <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
           <input type="password" name= "password" required>
           <label>Password</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox"> I agree to the terms & conditions </label>
        </div>
        <button type="submit" name="register" value= "Register" class="btn">Register</button>
        <div class="login-register">
            <p>Already Have an account? <a href="#" class="login-link">Login</a></p>
        </div>
    </form>

    </div>
    
 </div>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>

