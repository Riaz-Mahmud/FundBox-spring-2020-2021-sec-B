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
<div class="container">
  <h1 class="container p-3 mb-2 bg-secondary text-white">Block Organisation</h1>
  
<table class="table table-striped">
  <thead>
      <tr>
        <th>Events</th>
        <th>Organisation</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Event 1</td>
        <td>ORG 1</td>
        <td><a href="#" class="btn btn-success "  >Listed</a></td>
      </tr>
      <tr>
        <td>Event 2</td>
        <td>ORG 2</td>
        <td><a href="#" class="btn btn-success "  >Listed</a></td>
      </tr>
      <tr>
        <td>Event 3</td>
        <td>ORG 3</td>
        <td><a href="#" class="btn btn-success "  >Listed</a></td>
      </tr>
    </tbody>
</table>
<div class="card-footer">
    Card footer
  </div>

</div>
</div>
</body>
</html>