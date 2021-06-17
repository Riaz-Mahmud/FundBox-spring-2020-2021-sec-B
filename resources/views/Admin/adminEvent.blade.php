<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light p-3 mb-2 bg-success text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">FundBox</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<h1 class="container p-3 mb-2 bg-secondary text-white">Create Event for All</h1>
    <div class="container">
        <form action="">
    <div class="mb-3">
  <label for="eventName" class="form-label">Event Name</label>
  <input type="text" class="form-control" id="inputEventName" >
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Event description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<label for="customRange1" class="form-label">Upload Image</label>
<div class="input-group mb-3">
    
  <input type="file" class="form-control" id="inputGroupFile02">
  <label class="input-group-text" for="inputGroupFile02">Upload</label>
</div>
<div class="row g-3">
  <div class="col">
      
    <input type="text" class="form-control" placeholder="Starting Date" aria-label="Starting Date">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Ending Date" aria-label="Ending Date">
  </div>
</div>
<label for="customRange1" class="form-label">Target Donation</label>
<input type="range" class="form-range" id="customRange1">
<button type="button" class="btn btn-success btn-lg">Create Event</button>
</form>
</div>
</body>
</html>