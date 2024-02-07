<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap and Icon Example</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Font Awesome CSS (You can get your kit code from https://fontawesome.com/start) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...your-sha512-code-here..." crossorigin="anonymous" />

  <style>
    /* Add your custom styles here */
    body {
      padding: 20px;
    }
  </style>
</head>
<body>
<div class="container mt-5">
  <a href="#" class="btn btn-primary">
  <i class="fas fa-home"></i></i>Home
  </a>
</div>

  <div class="container">
    <h1>Bootstrap and Icon Example</h1>

    <!-- Bootstrap Alert -->
    <div class="alert alert-primary" role="alert">
      This is a Bootstrap alert!
    </div>

    <!-- Bootstrap Button -->
    <button type="button" class="btn btn-success">
      Bootstrap Button
    </button>

    <!-- Font Awesome Icons -->
    <i class="fas fa-rocket"></i> Font Awesome Rocket Icon
    <i class="bi bi-airplane-engines"></i> Font Awesome Pencil Icon

    <!-- Bootstrap Card with Icons -->
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title">Card Title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
        <i class="fas fa-pencil-alt ml-2"></i> <!-- Pencil Icon next to the button -->
      </div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Bootstrap JS and Popper.js (for Bootstrap components that require JavaScript) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
