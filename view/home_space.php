<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home - Space</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
   .card {
      margin: 10px;
      max-width: 45%;
      box-shadow: 5px 5px #00BFFF;
   }

   .table {
      margin: 10px;
   }
</style>

<body style="background-color: #00BFFF ;">
   <nav class="navbar navbar-expand-lg  " style="background-color: #00FFFF; ">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">HOME </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Space</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Schedule</a>
               </li>

            </ul>
         </div>
      </div>
   </nav>
   <div class="wrapper" style="column-gap: 10cm ; ">
      <div class="table-content" style="display: flex; justify-content: center;">
         <table class="table table-dark table-striped" style="margin:10px ;">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
               </tr>
            </thead>
            <thbody>
               <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
               </tr>
               <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
               </tr>
               <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
               </tr>
            </thbody>
         </table>
      </div>
      <div class="content" style="display: flex ;">
         <div class="space-content"
            style="display: flex ; flex-wrap: wrap; max-width: 30%; background-color: white;border-radius: 1%; margin: 10px; ">
            <div class="card" style="width: 18rem;">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                     card's
                     content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
               </div>
            </div>
            <div class="card" style="width: 18rem;">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                     card's
                     content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
               </div>
            </div>
            <div class="card" style="width: 18rem;">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                     card's
                     content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
               </div>
            </div>
            <div class="card" style="width: 18rem;">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                     card's
                     content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
               </div>
            </div>
            <div class="card" style="width: 18rem;">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                     card's
                     content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
               </div>
            </div>
            <div class="card" style="width: 18rem;">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                     card's
                     content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
               </div>
            </div>
            <div class="card" style="width: 18rem;">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                     card's
                     content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
               </div>
            </div>
         </div>
         <div class="select-agent col-md-4" style="background-color: white; margin: 10px; border-radius: 1%;  ">
            <form style="margin: 10px ;">
               <label
                  style="color: blue;  display: block;text-align: center; ; font-size: 24px ;font-weight: 800; ">SELECT
                  USER</label>
               <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
               </div>
               <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
               </div>
               <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>
</body>

</html>