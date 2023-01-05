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
<?php include("../callApi/schedulecallApi.php");
include("../model/schedule.php");
include("../callApi/userCallApi.php");
$usercall = new userCallApi();
$make_call = $usercall->callAPI('GET', 'http://localhost:6969/user/', false);
$data = json_decode($make_call, true)['alluser'];


$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
parse_str($parts['query'], $query);

$schedulebehavior = new scheduleCallApi();

$make_call = $schedulebehavior->getallschedule('GET', 'http://localhost:6969/schedule/' . $query['id'], false);


$schedule = json_decode($make_call, true)['schedulepublic'];




$list = array();
foreach ($data as $obj) {
    array_push($list, $obj['username']);
}
$listnonaccess = array_diff($list, $schedule['ListUserAccess']);

?>


<body>
    <?php include './navbar.php'; ?>


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
                    <input id="title" value="<?php echo $schedule['title'] ?>" type="text" required />
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
                        foreach ($listnonaccess as $key => $value) {
                        ?>
                            <li id="<?php echo $value ?>" onclick="handlegetid(event)" class="cssforitemuser">
                                <?php echo $value ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <label for="listuser">Được chấp thuận</label>
                    <ul id="listuser" class="cssforlistuser col-lg-12">
                        <?php
                        $ids = array();
                        foreach ($schedule['ListUserAccess'] as $key => $value) {
                        ?>
                            <li id="<?php echo $value ?>" onclick="handlegetid2(event)" class="cssforitemuser">
                                <?php echo $value ?>
                            </li>
                        <?php
                        }
                        ?>
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
                    <?php if ($query['ispublic'] == 1) {
                        echo '<div class="form-check">
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
                    </div>';
                    } else {
                        echo '<div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="public" >
                        <label class="form-check-label" for="public">
                            public
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="private" checked>
                        <label class="form-check-label" for="private">
                            private
                        </label>
                    </div>';
                    }

                    ?>

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>CONTENT</p>
                </div>
                <div class="col-lg-7">
                    <textarea id="content" value="asdasd" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <script>
                content.value = `<?php echo $schedule['content'] ?>`
            </script>
            <button type="button" onclick="onhandleSend()" class="btn btn-custom btn-lg btn-block">Save change</button>
        </form>
        <script>
            const onhandleSend = async () => {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const list = document.getElementById('listuser').getElementsByTagName('li');
                const date = urlParams.get('date');
                const getid = urlParams.get('id');
                const arraylistuser = [];
                for (let i = 0; i <= list.length - 1; i++) {
                    if (list[i].innerHTML !== "") {

                        arraylistuser.push(list[i].innerHTML.trim());
                    }

                }
                const formaddschedule = {
                    id: getid,
                    title: document.getElementById('cars').value + " - " + document.getElementById('title').value,
                    content: document.getElementById('content').value,
                    date: date,
                    ispublic: document.getElementById('public').checked,
                    ListUserAccess: arraylistuser
                }
                try {
                    const respone = await updateSchedule(formaddschedule);
                    alert(`${respone.message}`)
                    if (respone.success) {
                        return window.location.href = "http://localhost/DOANPHP/view/schedule.php?month=" + <?php echo date("m") ?>;
                    }
                } catch (error) {
                    console.log(error)
                }



            }
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>