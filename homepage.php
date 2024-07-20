<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "includes/htmlHead.php";
  include "cdn/cdn.php";
  ?>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .main-con {
      background-image: url('image/image.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-shadow: 1px 1px 2px #000;
    }

    .title-con h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .title-con p {
      font-size: 1.5rem;
      margin-bottom: 2rem;
    }

    .action-con button {
      margin: 0.5rem;
    }

    .form-control,
    .form-check-input,
    .form-select {
      border: 1px solid black !important;
    }

    .modal-header h1 {
      font-size: 1.5rem;
    }

    .toast-container {
      top: 1rem;
      right: 1rem;
    }
    .con-wrap{
      background-color: rgba(1, 13, 0, 0.70);
      padding: 7rem;
      width: 100%;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <?php include 'modal/modal.php'; ?>

  <!-- TOAST -->
  <div class="toast-container position-fixed p-3" style="z-index: 999">
    <div id="custom-toast" class="toast alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto" id="toast-title">added successful</strong>
        <small>Just now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <p id="toast-msg">new record</p>
      </div>
    </div>
  </div>

  <div class="main-con text-center">
    <div class="con-wrap">
    <div class="title-con">
      <h1>TRIKE TALK</h1>
      <p>Revolutionizing Transportation for Tricycles</p>
    </div>
    <div class="action-con">
      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUpModal">Sign up</button>
    </div>
    </div>
   
  </div>

  <script>
    document.getElementById('showpassword').addEventListener('click', function () {
      var password = document.getElementById('login_password');
      password.type = password.type === 'password' ? 'text' : 'password';
    });

    document.querySelectorAll('.form-control').forEach(input => {
      input.addEventListener('click', () => {
        document.querySelector('.alert').style.display = 'none';
      });
    });
  </script>
</body>

</html>
