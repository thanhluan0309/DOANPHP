<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<script src="../callApi/userBehavior.js">
</script>
<script>
    temp("asdasdas");
</script>

<body>
    <h1>login</h1>
    <?php echo "My first PHP script!";    ?>
    <?php require('../model/user.php');
    $user = new User("luan", "password no one known");
    ?>

    <div>User name : <?php echo $user->getName() ?></div>
    <div>password : <?php echo $user->getpassword() ?></div>
</body>

</html>