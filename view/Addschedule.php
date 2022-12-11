<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./Schedule.css">
  <link rel="stylesheet" href="./Schedule2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Add Schedule</title>

</head>
<script src="../callApi/userCallApi.js"></script>
<script src="../callApi/schedulecallApi.js"></script>
<?php
include("../callApi/userCallApi.php");
include("../callApi/schedulecallApi.php");
$usercall = new userCallApi();
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
          <select id="cars">
            <option value="Late">🕧 Late</option>
            <option value="Off">📆 Off</option>
            <option value="Meeting">📚 Meeting</option>
          </select>
          <input id="title" type="text" required />
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-lg-2">
          <p>LIST USER JOIN</p>
        </div>
        <div class="col-lg-2">
          <label for="listusernone">Chưa chấp thuận</label>
          <ul id="listusernone" class="cssforlistuser col-lg-12">
            <?php
            $ids = array();
            foreach ($data as $obj) {
              $ids[] = $obj['username'];
            ?>
              <li id="<?php echo $obj['username'] ?>" onclick="handlegetid(event)" class="cssforitemuser">
                <?php echo  $obj['username'] ?>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
        <div class="col-lg-2">
          <label for="listuser">Được chấp thuận</label>
          <ul id="listuser" class="cssforlistuser col-lg-12">
          </ul>
        </div>
        <script src="./addSchedulehandle.js">
        </script>
      </div>
      <div class="row mb-3">
        <div class="col-lg-2">
          <p>SERCURITY</p>
        </div>
        <div class="col-lg-5 d-flex">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="public" checked>
            <label class="form-check-label" for="public">
              public
            </label>
          </div>
          <div class="form-check mx-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="private">
            <label class="form-check-label" for="private">
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
          <textarea id="content" class="form-control" rows="5"></textarea>
        </div>
      </div>

      <button type="button" onclick="onhandleSend()" class="btn btn-custom btn-lg btn-block">Send Now</button>
    </form>
    <script>
      const onhandleSend = async () => {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const list = document.getElementById('listuser').getElementsByTagName('li');
        const date = urlParams.get('date');
        const arraylistuser = [];
        for (let i = 0; i <= list.length - 1; i++) {
          if (list[i].innerHTML !== "") {

            arraylistuser.push(list[i].innerHTML.trim());
          }

        }
        const formaddschedule = {
          title: document.getElementById('cars').value + " - " + document.getElementById('title').value,
          content: document.getElementById('content').value,
          date: date,
          ispublic: document.getElementById('public').checked,
          ListUserAccess: arraylistuser
        }
        const respone = await addschedule(formaddschedule);
        alert(`${respone.message}`)
        if (respone.success) {
          return window.location.href = "http://localhost/DOANPHP/view/schedule.php";
        }
      }
    </script>
    <!-- call Api with php -->
    <!-- <script>
      const onhandleSend = () => {

        const list = document.getElementById('listuser').getElementsByTagName('li');
        const arraylistuser = [];
        for (let i = 0; i <= list.length - 1; i++) {
          arraylistuser.push(list[i].id);

        }
        document.cookie = `ispublic=${document.getElementById('public').checked}`
        document.cookie = `title=${document.getElementById('cars').value}`
        document.cookie = `content=${content.value}`
        document.cookie = `ListUserAccess=${arraylistuser}`
        console.log("check", arraylistuser)
       
        $ispublic = $_COOKIE['ispublic'];
        $title = $_COOKIE['title'];
        $content = $_COOKIE['content'];
        $ListUserAccess = $_COOKIE['ListUserAccess'];

        $schedulecallapi = new scheduleCallApi();
        $data_array =  array(
          "title"        => $title,
          "ispublic"        => $ispublic,
          "content"        => $content,
          "ListUserAccess"        => $ListUserAccess,
        );
        $make_call = $schedulecallapi->addschedule('POST', 'http://localhost:6969/schedule/', $data_array);

        
      }
    </script>
    -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>