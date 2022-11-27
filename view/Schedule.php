<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="stylesheet" href="Schedule.css">
</head>

<body>
    <?php include("./setupBootstrap.php") ?>

    <div class="canvas">

        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            Thông tin lưu trữ
        </button>

        <button class="btn btn-primary">"< </button>
                <button class="btn btn-primary"> >" </button>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Xem tuần
                </button>
                <?php
                $month = date("m");
                $n;
                if ($month === 1 || $month === 3 || $month === 7) {
                    echo "Tháng này có 31" . $month  . "<br>";
                    $n = 31;
                } else {
                    $n = 30;
                    echo "Tháng này có 30"  . "<br>";
                }

                ?>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
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
    <div class="FormSchedule">
        <?php

        for ($i = 1; $i <= $n; $i++) {
            echo '<div class="schedule shadow border">
            <div class="schedule-Header border">
                <span style="margin: auto">' . $i . '/11/2022</span>

            </div>
            <div class="schedule-Body">
                <div class="schedule-Body_edit">✏

                </div>
                <br />
                <ul class="schedule-Body_listItem">
                    <li class="schedule-Body_Item">
                        luan - offf
                        <hr />
                    </li>
                    <li class="schedule-Body_Item">
                        luan - tang luong
                        <hr />
                    </li>
                </ul>
            </div>
        </div>';
        }
        ?>
    </div>

</body>

</html>