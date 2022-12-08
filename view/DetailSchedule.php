<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Student Registration Form In Bootstrap 5 </title>
  <style>
    body {
      padding: 0;
      margin: 0;
      font-family: "Nunito Sans";
      background-color: #F4BE2C;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    p {
      margin: 0;
      text-transform: capitalize;
      font-weight: bold;
    }

    th {
      padding: 10px !important;
    }

    .table {
      margin-bottom: 0px;
    }

    .dropdown-toggle {
      background-color: #fff;
    }

    .table>:not(caption)>*>* {
      border-color: #F4BE2C;
      vertical-align: middle;
      white-space: nowrap;
    }

    .table>:not(:first-child) {
      border-top: #F4BE2C;
    }

    .table>thead {
      background-color: #F4BE2C;
      color: #fff;
    }

    .row {
      align-items: center;
    }

    .form-control {
      line-height: 2;
      border: 1px solid #ddd;
      border-radius: 2px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #F4BE2C;
    }

    .form-check-input:checked {
      background-color: #F4BE2C;
      border-color: #F4BE2C;
    }

    .form-check-input:focus {
      box-shadow: none;
    }

    .form-control:hover {
      border-color: #F4BE2C;
    }

    .bg-custom {
      border: 1px solid #F4BE2C;
    }

    .btn-custom {
      border-color: #F4BE2C;
      color: #F4BE2C;
    }

    .btn-custom:hover {
      background-color: #F4BE2C;
      color: #fff;
      box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
    }

    .row.m-0 {
      border-bottom: 1px solid #f4be2b;
      margin-bottom: 15px !important;
      background: #f4be2b;
      font-weight: 600;
      color: #fff;
    }

    .row.mb-2 {
      margin: 0;
    }

    .col-lg-4 p {
      font-size: 12px;
    }


    @media(max-width: 992px) {
      form {
        width: 80%;
      }
    }

    @media(max-width: 575px) {
      form {
        width: 100%;
      }
    }
  </style>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<script src="../callApi/schedulecallApi.js"></script>

<body>
  <?php include("../callApi/schedulecallApi.php");
  include("../model/schedule.php");

  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $parts = parse_url($actual_link);
  parse_str($parts['query'], $query);

  $schedulebehavior = new scheduleCallApi();

  $make_call = $schedulebehavior->getallschedule('GET', 'http://localhost:6969/schedule/' . $query['id'], false);




  $schedule = json_decode($make_call, true)['schedulepublic'];

  ?>
  <?php include './navbar.php'; ?>


  <div class="container  mt-5 mb-5">
    <form class="bg-light p-4 m-auto" action="#">
      <div class="row mb-3">
        <div class="col-lg-2">
          <p>Tiêu đề</p>
        </div>
        <div class="col-lg-5">
          <input disabled type="text" class="form-control" value="<?php echo $schedule['title']; ?>" placeholder="First Name" required>
        </div>
        <div class="col-lg-4">
          <p>(max 30 characters a-z and A-Z)</p>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-2">
          <p>Danh sách người tham gia</p>
        </div>
        <div class="col-lg-5">
          <?php
          foreach ($schedule['ListUserAccess'] as $key => $value) {
            echo "<i style='color:blue' class='fa fa-user-o' aria-hidden='true'></i> &nbsp" . $value . "&ensp;";
          }
          ?>
        </div>
        <div class="col-lg-4">
          <p>(max 30 characters a-z and A-Z)</p>
        </div>
      </div>


      <div class="row mb-3">
        <div class="col-lg-2">
          <p>content</p>
        </div>
        <div class="col-lg-7">
          <textarea id="content" class="form-control" rows="5"></textarea>
        </div>
      </div>
      <script>
        content.value = "<?php echo $schedule['content'] ?>";
      </script>


      <button type="button" onclick="window.location.href=`http://localhost/DOANPHP/view/Schedule.php?month=<?php echo date('m') ?>`" class="btn btn-custom btn-lg btn-block">Go back</button>
      <button class="button" value="<?php echo  $query['id'] ?>" onclick="editschedule(event)" type="button">✏</button>
      <button type="button" value="<?php echo  $query['id'] ?>" onclick="removeschedule(event)">❌</button>

      <script>
        const removeschedule = async (event) => {
          if (confirm('Bạn có chắc sẽ hủy lịch không ???')) {
            await deletedSchedule(event.target.value)
          }
          window.location.href = 'http://localhost/DOANPHP/view/Schedule.php?month=<?php echo date('m') ?>'
        }

        const editschedule = (event) => {
          window.location.href = `http://localhost/DOANPHP/view/Editschedule.php?id=${event.target.value}&date=<?php echo $query['date'] ?>&ispublic=<?php echo $query['ispublic'] ?>`;
        }
      </script>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>