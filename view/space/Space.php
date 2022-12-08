<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garoon - All space</title>
    <style>
        .label {
            display: inline;
            margin-top: 16px;
            padding: 0.2em 0.6em 0.3em;
            font-size: 18px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25em;
        }
        .label-black {
            display: inline;
            padding: 0.2em 0.3em;
            font-size: 18px;
            font-weight: 700;
            line-height: 1;
            color: #333;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25em;
        }
        .label-primary {
            background-color: #337ab7;
        }   
    </style>
</head>

<body>
    <?php
    include "../layout/header.php";
    ?>
    <div class="ms-3 me-3">

        <div class="alert alert-info mt-2 mb-2" role="alert" id="spaceID">
        </div>
        <div class="row">
            <div class="col-3 mt-3">
                <span class="label label-primary">Members</span>
                <div class="mt-4" style="display: flex; align-items: start; flex-direction: column;" id="members">
                </div>

            </div>
            <div class="col-5 mt-3">
                <span class="label label-primary">Comments</span>
                <div class="mt-4">
                    <div>
                        <div class="d-flex flex-start"  style="padding: 1rem 0;">
                            <div>
                                <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <p class="mb-0">
                                        March 07, 2021
                                    </p>
                                    <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                    <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                    <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                                </div>
                                <p class="mb-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it.
                                </p>
                            </div>
                        </div>
                        <hr class="my-0" />
                    </div>
                    <div>
                        <div class="d-flex flex-start"  style="padding: 1rem 0;">
                            <div>
                                <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <p class="mb-0">
                                        March 07, 2021
                                    </p>
                                    <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                    <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                    <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                                </div>
                                <p class="mb-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it.
                                </p>
                            </div>
                        </div>
                        <hr class="my-0" />
                    </div>
                    <div>
                        <div class="d-flex flex-start"  style="padding: 1rem 0;">
                            <div>
                                <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <p class="mb-0">
                                        March 07, 2021
                                    </p>
                                    <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                    <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                    <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                                </div>
                                <p class="mb-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it.
                                </p>
                            </div>
                        </div>
                        <hr class="my-0" />
                    </div>
                </div>
            </div>
            <div class="col-4 mt-3">
                <span class="label label-primary">Tasks</span>
                <div class="mt-4" style="display: flex; align-items: start; flex-direction: column;" id="tasks">   
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-light mt-3" style="width: 100%;">Add a task</button>
            </div>
        </div>
    <script>
        const getSpace = (spaceID) => {
            let members = "";
            let tasks = "";
            fetch(`http://localhost:6969/api/space/${spaceID}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRXhpc3QiOiI2Mzg2M2Q0YWRhZWNiNTY0N2MyNzcxMzAiLCJpYXQiOjE2Njk4MTk1NTN9.VD2e_VALaTCnFacFZJAF2a1hy_XDsmWLLQ5eV1dvnmM'
                },
            })
            .then((response) => response.json())
            .then((data) => {
                // data.data.forEach(item => {
                //     if (item.title == "") {
                //         item.title = "&nbsp;"
                //     }
                //     content += `<div class="col-3 mb-1">
                //                     <div class="card">
                //                         <h5 class="card-header">Space ID: ${item.spaceID}</h5>
                //                         <div class="card-body">
                //                             <h5 class="card-title">${item.spaceName}</h5>
                //                             <p class="card-text">${item.title}</p>
                //                             <a href="http://localhost/DOANPHP/view/space/Space.php?id=${item.spaceID}" class="btn btn-primary">View Space</a>
                //                         </div>
                //                     </div>
                //                 </div>`;
                // });
                data.space.members.forEach(item => {
                    members += `<div class="mb-3"><span class="label-black">${item.username}</span></div>`
                });
                data.space.tasks.forEach(item => {
                    tasks +=`<div class="card" style="width: 100%">
                                <div class="card-body">
                                    <h5 class="card-title">${item.taskName} ${item.success ? '<span class="badge bg-success">Complete</span>' : '<span class="badge bg-danger">Incomplete</span>'}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">${item.title}</h6>
                                    <p class="card-text">${item.description}</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>`
                })
                
                document.getElementById('members').innerHTML = members;
                document.getElementById('tasks').innerHTML = tasks;
                document.getElementById('spaceID').innerText ='Space: ' + data.space.spaceName;
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
        document.addEventListener('DOMContentLoaded', () => {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            getSpace(urlParams.get('id'));
        })
        
    </script>
</body>


</html>