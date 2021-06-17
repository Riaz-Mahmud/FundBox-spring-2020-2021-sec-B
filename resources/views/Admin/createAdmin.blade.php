<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> --}}
</head>
<body>
  {{-- Navbar --}}
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

    <div class="container">
<form class="row g-3">
  <div class="col-md-6">
    <label for="adminName" class="form-label">Name</label>
    <input type="text" class="form-control" id="adminName">
  </div>
  <div class="col-md-6">
    <label for="adminEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="adminEmail">
  </div>
  <div class="col-12">
    <label for="adminPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="adminPassword">
  </div>
  <div class="col-12">
    <label for="adminConfirm" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="adminConfirm" >
  </div>
  <div class="col-md-6">
    <label for="inputContact" class="form-label">Contact</label>
    <input type="text" class="form-control" id="inputContact">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Create Admin</button>
  </div>
</form>
</div>

</body>
</html>