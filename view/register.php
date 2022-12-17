<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="logincss.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<script src="../callApi/userCallApi.js">
</script>

<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <div class="login">Register</div>
                <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
            </div>
            <div class="right">
                <svg viewBox="0 0 320 300">
                    <defs>
                        <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992" x2="307" y2="193.49992" gradientUnits="userSpaceOnUse">
                            <stop style="stop-color:#ff00ff;" offset="0" id="stop876" />
                            <stop style="stop-color:#ff0000;" offset="1" id="stop878" />
                        </linearGradient>
                    </defs>
                    <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                </svg>
                <div style="margin-top: 2px" class="form">
                    <label for="username">username</label>
                    <input type="text" id="username">
                    <label for="password">Password</label>
                    <input type="password" id="password">
                    <label for="repassword">Re-password</label>
                    <input type="password" id="repassword">
                    <a href="/DOANPHP/view/login.php">login</a>
                    <input type="button" onclick="handleRegister()" id="submit" value="Submit">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<script>
    const handleRegister = async () => {
        const formRegsiter = {
            username: document.getElementById('username').value,
            password: document.getElementById('password').value
        }
        if (formRegsiter.password !== document.getElementById("repassword").value) {
            alert('password not uniformity')
            return;
        }
        const res = await register(formRegsiter);
        if (res.success) {
            alert(`${res.message}`)
            window.location.href = "http://localhost/DOANPHP/view/login.php";
        } else {
            alert(`${res.message}`)
        }
    }
</script>

</html>