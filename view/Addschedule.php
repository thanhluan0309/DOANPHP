<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./Schedule.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Add Schedule</title>

</head>
<script src="../callApi/userCallApi.js"></script>
<?php
include("../callApi/userCallApi.php");

$usercall = new userCallApi();
// $data_array =  array(
//   "username"        => "luan123",
//   "password"        => "luan",
// );
$make_call = $usercall->callAPI('GET', 'http://localhost:6969/user/', false);
$data = json_decode($make_call, true)['alluser'];

?>


<body>
  <div class="container  mt-5 mb-5">
    <form class="bg-light p-4 m-auto" action="#">
      <div class="row mb-3">
        <div class="col-lg-2">
          <p>TITLE</p>
        </div>
        <div class="col-lg-5">
          <input type="text" class="form-control" placeholder="First Name" required>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-lg-2">
          <p>LIST USER JOIN</p>
        </div>


        <div class="col-lg-2">
          <label for="listuser">Được chấp thuận</label>
          <textarea id="listuserAccess" class="form-control" rows="5"></textarea>
        </div>

        <div class="col-lg-2">
          <label for="listuser">Danh sách thành viên</label>
          <textarea id="listuser" class="form-control" rows="5"></textarea>
        </div>

        <?php
        $ids = array();
        foreach ($data as $obj) {
          $ids[] = $obj['username'];
        ?>
          <script>
            listuser.value += `<?php echo $obj['username'] ?>`
            listuser.value += `\n`;
          </script>
        <?php
        }
        ?>


      </div>
      <div class="row mb-3">
        <div class="col-lg-2">
          <p>SERCURITY</p>
        </div>
        <div class="col-lg-5 d-flex">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              public
            </label>
          </div>
          <div class="form-check mx-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              private
            </label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-2">
          <p>CONTENT</p>
        </div>
        <div class="col-lg-7">
          <textarea class="form-control" rows="5"></textarea>
        </div>
      </div>

      <button type="button" class="btn btn-custom btn-lg btn-block">Send Now</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>