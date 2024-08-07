<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pleaseeeeeee</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br>
<br>
    <div class="cont">
        <div class="form sign-in">
        <form action="api.php" method="post">   
        <input type="hidden" value="login" name="act">
        <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input type="email" name="email"/>
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="pass"/>
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="submit" class="submit">Sign In</button>
            </form> 
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <form action="api.php" method="post">
                    <input type="hidden" value="reg" name="act">
                <h2>Create your Account</h2>
                <label>
                    <span>FirstName</span>
                    <input type="text" name="firstName"/>
                </label>
                <label>
                    <span>LastName</span>
                    <input type="text" name="lastName"/>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email"/>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="pass"/>
                </label>
                <button type="submit" class="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
</body>
</html>