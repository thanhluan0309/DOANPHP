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
        <div class="modal fade" id="editSpace" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Space</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="SpaceID" class="col-form-label">Space ID:</label>
                                <input type="text" class="form-control" id="SpaceID" readonly>
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
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="height: 200px; width: 50%; ">
                                        User
                                        <div id="first" style="height: 100%;overflow-y: scroll; border: 1px solid #ced4da; border-radius: 0.25rem;">
                                        </div>
                                    </div>
                                    <div
                                        style="display: flex; flex-direction: column; margin: 0 8px; justify-content: space-around;">
                                        <button style="border: 1px solid #ced4da; border-radius: 0.25rem;" id="moveRight">>></button>
                                        <button style="border: 1px solid #ced4da; border-radius: 0.25rem;" id="moveLeft"><<</button>
                                    </div>
                                    <div style="height: 200px; width: 50%; ">
                                    Members
                                        <div id="second" style="height: 100%; overflow-y: scroll; border: 1px solid #ced4da; border-radius: 0.25rem;"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitEditSpace" type="button" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 mt-3">
                <span class="label label-primary">Members</span>
                <div class="mt-4" style="display: flex; align-items: start; flex-direction: column;" id="members">
                </div>

            </div>
            <div class="col-5 mt-3">
                <span class="label label-primary">Comments</span>
                <div class="mt-2" id="comments">
                </div>
                <div class="form-outline mt-3">
                    <textarea class="form-control" id="txtMessage" rows="2"></textarea>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary" id="postCmt">Post</button>
                    <button class="btn btn-light" id="cancelCmt">Cancel</button>
                </div>
            </div>
            <div class="col-4 mt-3">
                <span class="label label-primary">Tasks</span>
                <div class="card mt-2">
                    <form class="ms-2 me-2">
                        <div class="mb-1" style="display: none;">
                            <input type="text" class="form-control" id="TaskID" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="TaskName" class="col-form-label">Space Name:</label>
                            <input type="text" class="form-control" id="TaskName"></input type="text">
                        </div>
                        <div class="mb-1">
                            <label for="TaskTitle" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="TaskTitle"></input type="text">
                        </div> 
                        <div class="mb-1">
                            <label for="TaskDescription" class="col-form-label">Description:</label>
                            <input type="text" class="form-control" id="TaskDescription"></input type="text">
                        </div>
                        <div class="mb-1">
                            <label for="Complete" class="col-form-label">Status: </label>
                            <select id="Complete" class="form-select" aria-label="Default select example">
                                <option value="true" selected>Complete</option>
                                <option value="false">Incomplete</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <button class="btn btn-info" id="addTask">Add</button>
                            <button class="btn btn-success" id="editTask">Edit</button>
                        </div>  
                    </form>
                </div>
                <div class="mt-4" style="display: flex; align-items: start; flex-direction: column;" id="tasks"> 
                </div>
                
            </div>
        </div>
    </div>
    
    <script>
        const chooseTask = (TaskID, TaskName, Title, Description, Status) => {
            document.getElementById('TaskID').value = TaskID;
            document.getElementById('TaskName').value = TaskName;
            document.getElementById('TaskTitle').value = Title;
            document.getElementById('TaskDescription').value = Description;
            document.getElementById('Complete').value = Status;
        }
        const clearDataTask = () => {
            document.getElementById('TaskID').value = '';
            document.getElementById('TaskName').value = '';
            document.getElementById('TaskTitle').value = '';
            document.getElementById('TaskDescription').value = '';
            document.getElementById('Complete').value = true;
        }
        const addATask = (payload) => {
            fetch('http://localhost:6969/api/task', {
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
                    const queryString = window.location.search;
                    const urlParams = new URLSearchParams(queryString);
                    getSpace(urlParams.get('id'));
                } else {
                    console.log(data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
        const editATask = (taskID, payload) => {
            fetch(`http://localhost:6969/api/task/${taskID}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRXhpc3QiOiI2Mzg2M2Q0YWRhZWNiNTY0N2MyNzcxMzAiLCJpYXQiOjE2Njk4MTk1NTN9.VD2e_VALaTCnFacFZJAF2a1hy_XDsmWLLQ5eV1dvnmM'
                },
                body: JSON.stringify(payload)
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success == true) {
                    const queryString = window.location.search;
                    const urlParams = new URLSearchParams(queryString);
                    getSpace(urlParams.get('id'));
                } else {
                    console.log(data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
        const deleteATask = (taskID) => {
            fetch(`http://localhost:6969/api/task/${taskID}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRXhpc3QiOiI2Mzg2M2Q0YWRhZWNiNTY0N2MyNzcxMzAiLCJpYXQiOjE2Njk4MTk1NTN9.VD2e_VALaTCnFacFZJAF2a1hy_XDsmWLLQ5eV1dvnmM'
                }
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success == true) {
                    const queryString = window.location.search;
                    const urlParams = new URLSearchParams(queryString);
                    getSpace(urlParams.get('id'));
                    alert('Delete task success');
                } else {
                    console.log(data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
        const deleteSpace = (spaceID) => {
            fetch(`http://localhost:6969/api/space/${spaceID}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRXhpc3QiOiI2Mzg2M2Q0YWRhZWNiNTY0N2MyNzcxMzAiLCJpYXQiOjE2Njk4MTk1NTN9.VD2e_VALaTCnFacFZJAF2a1hy_XDsmWLLQ5eV1dvnmM'
                }
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success == true) {
                    alert('Delete space success');
                    window.location.href = 'http://localhost/DOANPHP/view/space/AllSpace.php'
                } else {
                    console.log(data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
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
        const editSpace = (spaceID, payload) => {
            fetch(`http://localhost:6969/api/space/${spaceID}`, {
                method: 'PUT',
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
                console.error('Error:', error);
            });
        }
        const getSpace = (spaceID) => {
            let members = "";
            let comments = "";
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
                membersInSpace = "";
                userNotInSpace = "";
                localStorage.setItem('_id', data.space._id);
                document.getElementById('SpaceID').value = data.space.spaceID
                document.getElementById('SpaceName').value = data.space.spaceName
                document.getElementById('Title').value = data.space.title
                document.getElementById('Status').value = data.space.private
                data.space.members.forEach(item => {
                    members += `<div class="mb-3"><span class="label-black">${item.username}</span></div>`
                });
                data.space.members.forEach(item => {
                    membersInSpace += `<div id="${item._id + '1'}">
                                    <input type="checkbox" class="btn-check" id="${item._id}" value="${item._id}" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="${item._id}"
                                        style="width: 100%;">${item.username}</label><br>
                                </div>`;
                });
                data.userNotInSpace.forEach(item => {
                    userNotInSpace += `<div id="${item._id + '1'}">
                                    <input type="checkbox" class="btn-check" id="${item._id}" value="${item._id}" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="${item._id}"
                                        style="width: 100%;">${item.username}</label><br>
                                </div>`;
                });
                data.space.comments.forEach(item => {
                    let dateCmt =  new Date(item.createdAt);
                    let frmatDate = `${dateCmt.toLocaleString('default', { month: 'long' })} ${dateCmt.toLocaleString('default', { day: '2-digit' })}, ${dateCmt.toLocaleString('default', { year: 'numeric' })} ${dateCmt.toLocaleString('default', { hour: '2-digit', minute: '2-digit' })}`;
                    comments += `<div>
                                    <div class="d-flex flex-start"  style="padding: 1rem 0;">
                                        <div>
                                            <h6 class="fw-bold mb-1">${item.cmtBy.username}</h6>
                                            <div class="d-flex align-items-center mb-3">
                                                <p class="mb-0">
                                                    ${frmatDate}
                                                </p>
                                                <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                                <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                                <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                                            </div>
                                            <p class="mb-0">
                                                ${item.content}
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                </div>`
                })
                data.space.tasks.forEach(item => {
                    tasks +=`<div class="card" style="width: 100%">
                                <div class="card-body">
                                    <h5 class="card-title">${item.taskName} ${item.success ? '<span class="badge bg-success">Complete</span>' : '<span class="badge bg-danger">Incomplete</span>'}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">${item.title}</h6>
                                    <p class="card-text">${item.description}</p>
                                    <button class="btn btn-primary" onclick="chooseTask('${item._id}','${item.taskName}','${item.title}','${item.description}',${item.success})">Choose</button>
                                    <button class="btn btn-danger" onclick="deleteATask('${item._id}')">Delete</button>
                                </div>
                            </div>`
                })
                document.getElementById('first').innerHTML = userNotInSpace;
                document.getElementById('second').innerHTML = membersInSpace;
                document.getElementById('members').innerHTML = members;
                document.getElementById('comments').innerHTML = comments;
                document.getElementById('tasks').innerHTML = tasks;
                document.getElementById('spaceID').innerHTML =`Space: ${data.space.spaceName} <button class="btn btn-success" style="margin-left: 8px" data-bs-target="#editSpace" data-bs-toggle="modal"><img src="./edit.png" width="18"/></button><button class="btn btn-danger" style="margin-left: 8px" onclick="deleteSpace('${spaceID}')"><img style="filter: invert(100%);" src="./trash.png" width="18"/></button>`;
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
        const postComment = () => {
            const payload = {
                content: document.getElementById('txtMessage').value,
                space: localStorage.getItem('_id')
            }
            fetch(`http://localhost:6969/api/comment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRXhpc3QiOiI2Mzg2M2Q0YWRhZWNiNTY0N2MyNzcxMzAiLCJpYXQiOjE2Njk4MTk1NTN9.VD2e_VALaTCnFacFZJAF2a1hy_XDsmWLLQ5eV1dvnmM'
                },
                body: JSON.stringify(payload)
            })
            .then((response) => response.json())
            .then((data) => {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                getSpace(urlParams.get('id'));
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
        document.addEventListener('DOMContentLoaded', () => {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            getSpace(urlParams.get('id'));
            console.log(localStorage.getItem('_id'));
        })
        document.getElementById('postCmt').addEventListener('click', ()=>{
            postComment();
            document.getElementById('txtMessage').value = ""
        })
        document.getElementById('cancelCmt').addEventListener('click', ()=>{
            document.getElementById('txtMessage').value = ""
        })
        document.getElementById('submitEditSpace').addEventListener('click', (e) => {
            e.preventDefault();
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
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
            editSpace(urlParams.get('id'), payload);
        })
        document.getElementById('addTask').addEventListener('click', (e) => {
            e.preventDefault();
            let TaskName = document.getElementById('TaskName').value;
            let Title = document.getElementById('TaskTitle').value;
            let Description = document.getElementById('TaskDescription').value;
            let Status = Boolean(document.getElementById('Complete').value === "true");
            let payload = {
                taskName: TaskName,
                title: Title,
                description: Description,
                success: Status,
                space: localStorage.getItem('_id')
            }
            addATask(payload);
            clearDataTask();
        })
        document.getElementById('editTask').addEventListener('click', (e) => {
            e.preventDefault();
            let TaskID = document.getElementById('TaskID').value
            let TaskName = document.getElementById('TaskName').value;
            let Title = document.getElementById('TaskTitle').value;
            let Description = document.getElementById('TaskDescription').value;
            let Status = Boolean(document.getElementById('Complete').value === "true");
            let payload = {
                taskName: TaskName,
                title: Title,
                description: Description,
                success: Status,
                space: localStorage.getItem('_id')
            }
            editATask(TaskID, payload);
            clearDataTask();
        })
    </script>
</body>


</html>