<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<style>
    .dasboard {

        width: 100%;
        display: flex;
        margin-top: 10%;
    }

    .dashboard-itemSchedules {
        margin: auto;
        width: 200px;
        height: 200px;
        background-image: url('https://cdn-icons-png.flaticon.com/512/470/470326.png');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .dashboard-itemSpace {
        margin: auto;
        width: 200px;
        height: 200px;
        background-image: url('https://png.pngtree.com/png-clipart/20190619/original/pngtree-vector-space-icon-png-image_3990018.jpg');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

<body>
    <?php include './navbar.php'; ?>

    <div class="dasboard">
        <button class="border shadow dashboard-itemSpace" onclick=""></button>
        <button class="border shadow dashboard-itemSchedules" onclick="redirect()"></button>
    </div>
</body>
<script>
    const redirect = () => {
        window.location.href = "http://localhost/DOANPHP/view/schedule.php?month=" + <?php echo date("m") ?>;
        localStorage.setItem("reload", true)
    }
</script>

</html>