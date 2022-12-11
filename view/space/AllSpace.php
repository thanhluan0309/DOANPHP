<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garoon - All space</title>
</head>

<body>
    <?php
    include "../layout/header.php";
    ?>
    <div class="ms-3 me-3">

        <div class="alert alert-info mt-2 mb-2" role="alert">
            All Space
        </div>
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createSpace">Create Space</button>
        <div class="modal fade" id="createSpace" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Space</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="SpaceID" class="col-form-label">Space ID:</label>
                                <input type="text" class="form-control" id="SpaceID">
                            </div>
                            <div class="mb-3">
                                <label for="SpaceName" class="col-form-label">Space Name:</label>
                                <input type="text" class="form-control" id="SpaceName"></input type="text">
                            </div>
                            <div class="mb-3">
                                <label for="Title" class="col-form-label">Title:</label>
                                <input type="text" class="form-control" id="Title"></input type="text">
                            </div>
                            <div class="mb-3">
                                <label for="Status" class="col-form-label">Status:</label>
                                <select id="Status" class="form-select" aria-label="Default select example">
                                    <option value="false" selected>Public</option>
                                    <option value="true">Private</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="Members" class="col-form-label">Members:</label>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="height: 200px; width: 50%; overflow-y: scroll; border: 1px solid #ced4da; border-radius: 0.25rem;"
                                        id="first">
                                    </div>
                                    <div
                                        style="display: flex; flex-direction: column; margin: 0 8px; justify-content: space-around;">
                                        <button style="border: 1px solid #ced4da; border-radius: 0.25rem;"
                                            id="moveRight">>></button>
                                        <button style="border: 1px solid #ced4da; border-radius: 0.25rem;"
                                            id="moveLeft">
                                            <<< /button>
                                    </div>
                                    <div style="height: 200px; width: 50%; overflow-y: scroll; border: 1px solid #ced4da; border-radius: 0.25rem;"
                                        id="second"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submit" type="button" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="spaces">
            <div class="col-3 mb-1">
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let content = "";
        let users = "";
        const getAllSpace = () => {
            fetch('http://localhost:6969/api/space', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRXhpc3QiOiI2Mzg2M2Q0YWRhZWNiNTY0N2MyNzcxMzAiLCJpYXQiOjE2Njk4MTk1NTN9.VD2e_VALaTCnFacFZJAF2a1hy_XDsmWLLQ5eV1dvnmM'
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    data.data.forEach(item => {
                        if (item.title == "") {
                            item.title = "&nbsp;"
                        }
                        content += `<div class="col-3 mb-1">
                                    <div class="card">
                                        <h5 class="card-header">Space ID: ${item.spaceID}</h5>
                                        <div class="card-body">
                                            <h5 class="card-title">${item.spaceName}</h5>
                                            <p class="card-text">${item.title}</p>
                                            <a href="http://localhost/DOANPHP/DOANPHP/view/space/Space.php?id=${item.spaceID}" class="btn btn-primary">View Space</a>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    document.getElementById('spaces').innerHTML = content;
                    console.log('Success:', data);
                })
                .catch((error) => {
                    // console.error('Error:', error);
                });
        }
        const getAllUser = () => {
            fetch('http://localhost:6969/user/all', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRXhpc3QiOiI2Mzg2M2Q0YWRhZWNiNTY0N2MyNzcxMzAiLCJpYXQiOjE2Njk4MTk1NTN9.VD2e_VALaTCnFacFZJAF2a1hy_XDsmWLLQ5eV1dvnmM'
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    data.data.forEach(item => {
                        users += `<div id="${item._id + '1'}">
                                    <input type="checkbox" class="btn-check" id="${item._id}" value="${item._id}" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="${item._id}"
                                        style="width: 100%;">${item.username}</label><br>
                                </div>`;
                    });
                    document.getElementById('first').innerHTML = users;
                    console.log('Success:', data);
                })
                .catch((error) => {
                    // console.error('Error:', error);
                });
        }
        const createSpace = (payload) => {
            fetch('http://localhost:6969/api/space', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRXhpc3QiOiI2Mzg2M2Q0YWRhZWNiNTY0N2MyNzcxMzAiLCJpYXQiOjE2Njk4MTk1NTN9.VD2e_VALaTCnFacFZJAF2a1hy_XDsmWLLQ5eV1dvnmM'
                },
                body: JSON.stringify(payload)
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success == true) {
                        window.location.reload();
                    } else {
                        console.log(data.message);
                    }
                })
                .catch((error) => {
                    // console.error('Error:', error);
                });
        }
        document.addEventListener('DOMContentLoaded', () => {
            getAllSpace();
            getAllUser();
        })
        document.getElementById('moveRight').addEventListener('click', (e) => {
            const first = document.getElementById('first');
            const second = document.getElementById('second');

            const secondArr = [];
            e.preventDefault();
            // const arrUsersFirst = document.querySelectorAll('#first input[type=checkbox]');
            const arrUsersFirst = first.childNodes;
            // console.log(arrUsersFirst);
            for (let i = 0; i < arrUsersFirst.length; i++) {
                let item = arrUsersFirst[i];
                // console.log(item);
                if (arrUsersFirst[i].querySelector('input[type=checkbox]').checked) {
                    // console.log(arrUsersFirst[i]);
                    secondArr.push(arrUsersFirst[i])
                }
            }
            // console.log(secondArr);
            secondArr.forEach(item => {
                console.log(item);
                second.appendChild(item);
            })
            second.childNodes.forEach(item => {
                item.querySelector('input[type=checkbox]').checked = false;
            })
        })
        document.getElementById('moveLeft').addEventListener('click', (e) => {
            const first = document.getElementById('first');
            const second = document.getElementById('second');

            const firstArr = [];
            e.preventDefault();
            // const arrUsersFirst = document.querySelectorAll('#first input[type=checkbox]');
            const arrUsersSecond = second.childNodes;
            console.log(arrUsersSecond);
            for (let i = 0; i < arrUsersSecond.length; i++) {
                let item = arrUsersSecond[i];
                console.log(item);
                if (arrUsersSecond[i].querySelector('input[type=checkbox]').checked) {
                    console.log(arrUsersSecond[i]);
                    firstArr.push(arrUsersSecond[i])
                }
            }
            console.log(firstArr);
            firstArr.forEach(item => {
                console.log(item);
                first.appendChild(item);
            })
            first.childNodes.forEach(item => {
                item.querySelector('input[type=checkbox]').checked = false;
            })
        })
        document.getElementById('submit').addEventListener('click', (e) => {
            e.preventDefault();
            let SpaceID = document.getElementById('SpaceID').value;
            let SpaceName = document.getElementById('SpaceName').value;
            let Title = document.getElementById('Title').value;
            let Status = Boolean(document.getElementById('Status').value === "true");
            let Members = document.getElementById('second').childNodes;
            let members = []
            Members.forEach(item => {
                members.push(item.querySelector('input[type=checkbox]').value)
            });
            let payload = {
                spaceID: SpaceID,
                spaceName: SpaceName,
                title: Title,
                private: Status,
                members: members
            }
            createSpace(payload);
        })
    </script>
</body>


</html>