<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-warning bg-warning" aria-label="Ninth navbar example">
        <div class="container-xl">
            <h1 class="navbar-brand" href="#">Garoon</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07XL">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" style="color:black" aria-current="page" href="http://localhost/DOANPHP/view/dashboard.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a id="setusername" class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                    </li>
                    <script>
                        document.getElementById('setusername').innerHTML = `well come back ${localStorage.getItem('username')}`;
                    </script>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">Setting</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                            <li class="dropdown-item" onclick="logout()">Logout</li>
                            <li class="dropdown-item" onclick="profile()">Profile</li>
                        </ul>
                    </li>
                </ul>
                <form>
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>
    <script>
        const logout = () => {
            window.location.href = "http://localhost/DOANPHP/view/login.php";
            localStorage.clear();
        }
        const profile = () => {
            window.location.href = "http://localhost/DOANPHP/view/profileUser.php";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>