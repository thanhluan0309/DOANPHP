<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="schedule.css">
</head>

<body>
    <?php include './navbar.php'; ?>


    <script>
        document.cookie = `username=${localStorage.getItem("username")}`;
        $(document).ready(function() {
            if (localStorage.getItem("reload") === "true") {
                localStorage.setItem("reload", false)
                window.location.reload();
            }
        });
    </script>
    <?php
    include("../callApi/schedulecallApi.php");
    include("../model/schedule.php");

    $schedulebehavior = new scheduleCallApi();

    $make_call = $schedulebehavior->getallschedule('GET', 'http://localhost:6969/schedule/', false);


    $schedulepublic = json_decode($make_call, true)['schedulepublic'];
    $scheduleprivate = json_decode($make_call, true)['scheduleprivate'];

    $isuser = $_COOKIE['username'];
    $listpublic = array();
    $listprivate = array();

    foreach ($scheduleprivate as $obj) {
        $listscheduleprivate = new scheduleprivate();

        $listscheduleprivate->_id = $obj['_id'];
        $listscheduleprivate->title = $obj['title'];
        $listscheduleprivate->date = $obj['date'];
        $listscheduleprivate->content = $obj['content'];
        $listscheduleprivate->ispublic = $obj['ispublic'];
        if (in_array($isuser, $obj['ListUserAccess'])) {
            array_push($listprivate, $listscheduleprivate);
        }
    }

    foreach ($schedulepublic as $obj) {
        $listschedulepublic = new schedule();
        $listschedulepublic->_id = $obj['_id'];
        $listschedulepublic->title = $obj['title'];
        $listschedulepublic->date = $obj['date'];
        $listschedulepublic->content = $obj['content'];
        $listschedulepublic->ispublic = $obj['ispublic'];
        array_push($listpublic, $listschedulepublic);
    }
    ?>

    <div style="margin-top: 23px" class="canvas">

        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            Thông tin lưu trữ
        </button>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Xem tháng
        </button>
        <?php
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($actual_link);
        parse_str($parts['query'], $query);

        $month = $query['month'];

        $n;
        if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
            echo "Tháng " . $month  . " này có 31 ngày" . "<br>";
            $n = 31;
        } else {
            $n = 30;
            echo "Tháng " . $month  . " này có 30 ngày" . "<br>";
        }

        ?>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <?php
            for ($i = 1; $i <= 12; $i++) {
            ?>
                <button class="Button" onclick="window.location.href = 'http://localhost/DOANPHP/view/schedule.php?month=' + <?php echo $i ?>"><?php echo $i ?></button>
            <?php } ?>
        </ul>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="mt-3">
                    <ul>
                        <li><a class="dropdown-item" href="#">🕧 late</a></li>
                        <li><a class="dropdown-item" href="#">📆 Off</a></li>
                        <li><a class="dropdown-item" href="#">📚 Meeting</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div style="height: 1500px" class="FormSchedule">
        <?php
        $listall = array_merge($listprivate, $listpublic);

        for ($i = 1; $i <= $n; $i++) {
            echo '<div class="schedule shadow border">
            <div class="schedule-Header border">
                <span id="date' . $i . '/' . $month . '/' . '2022" style="margin: auto">' . $i . '/' . $month . '/2022</span>
            </div>
            <div class="schedule-Body">
                <div style="cursor: pointer" id="' . $i . '/' . $month . '/' . '2022" onclick="gotoaddschedule(event)" class="schedule-Body_edit">✏

                </div>
                <br />
                <ul class="schedule-Body_listItem">'; ?>
        <?php
            $chuoi = $i . "/" . $month . "/" . "2022";
            foreach ($listall as $car) {
                if ($chuoi === $car->date) {
                    echo '<li value="' . $car->ispublic . '" data-value="' . $car->date . '"  onclick="editschedule(event)" id="' . $car->_id . '" class="schedule-Body_Item">
                        ' . $car->title . '
                        <hr />
                    </li>';
                }
            }
            echo ' </ul>
                </div>
            </div>';
        }
        ?>
        <script>
            const editschedule = (event) => {
                window.location.href = `http://localhost/DOANPHP/view/DetailSchedule.php?id=${event.target.id}&date=${document.getElementById(event.target.id).getAttribute('data-value')}&ispublic=${document.getElementById(event.target.id).getAttribute('value')}`;
            }
            const gotoaddschedule = (event) => {
                window.location.href = "http://localhost/DOANPHP/view/addschedule.php?date=" + event.target.id;
            }
        </script>
    </div>

</body>

</html>