<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <button onclick="redirect()">Schedules</button>
</body>
<script>
    const redirect = () => {
        window.location.href = "http://localhost/DOANPHP/view/schedule.php?month=" + <?php echo date("m") ?>;
        localStorage.setItem("reload", true)
    }
</script>

</html>