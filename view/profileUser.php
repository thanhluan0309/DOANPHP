<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./profilecss.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <style>
        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 40px;
            right: 500px;
            border: 3px solid black;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: #EEEEEE;
        }

        /* Full-width input fields */
        .form-container input[type=text],
        .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: 1px solid white;
            background: white;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }
    </style>
</head>
<script src="../callApi/userCallApi.js">
</script>
<?php include './navbar.php'; ?>
<body style="background: rgb(225 220 220 / 25%);">
    <div class="form-popup" id="myForm">
        <div class="form-container" method="post">
            <h5 style="text-align: center;">Change password</h5>

            <label for="email"><b>Password</b></label>
            <input type="password" placeholder="Current Password" id="password" required>

            <label for="psw"><b>New password</b></label>
            <input type="password" placeholder="New Password" id="new_password" required>

            <label for="psw"><b>Re-new password</b></label>
            <input type="password" placeholder="Repeat New Password" id="re-new_password" required>

            <button class="btn" type="button" onclick="handleeditpass()" id="submit">Change</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </div>
    </div>
    <div class="container rounded bg-white mt-5 mb-5" id="bodybackground">
        <div class="row">
            <div class="col-sm-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">
                        <script>
                            document.write(localStorage.getItem('username'));
                        </script>
                    </span>
                    
                </div>
            </div>
            <div class="col-sm-9 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">ID</label>
                            <h4 disabled="true" type="text" class="form-control" style="background-color:beige">
                                <script>
                                    document.write(localStorage.getItem('id'));
                                </script>
                            </h4>
                        </div>
                        <div class="col-md-6"><label class="labels">Password</label>
                            <button class="form-control" onclick="openForm()">Change passwrod</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
<script> 
const handleeditpass = async () => {
    if(document.getElementById("new_password").value!=document.getElementById("re-new_password").value)
    {
        return alert("re-new password not true");
    }
    const formchangepass = {
            username: localStorage.getItem('username'),
            password: document.getElementById('password').value,
            newpassword: document.getElementById('new_password').value
        }
    const res = await changepassword(formchangepass)
    if (res.success) {
            alert(`${res.message}`)
            localStorage.setItem("password",res.userLogin.password)
        } else {
            alert(`${res.message}`)
        }
    }
</script>
<script>
   
    function openForm() {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("bodybackground").style.backgroundColor = "black"
        document.getElementById("bodybackground").style.opacity = 0.2;
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("bodybackground").style.backgroundColor =null;
        document.getElementById("bodybackground").style.opacity = 1;
    }
</script>

</html>