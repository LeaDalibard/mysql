<?php require 'includes/header.php'?>
<!doctype html>
<html lang="en">
<head>
    <title>Insert</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>



<section class="container">
    <h2> Register</h2>
    <span class="error  text-danger"><?php if(isset($message)){echo $message;};?></span>
    <form action="index.php" method="post">
        <p><span class="error text-danger">* required field</span></p>
        <p><b>First name</b> : <input type="text" name="first_name" value="<?php echo $_SESSION["first_name"]; ?>" /> <span class="error text-danger">*</span>
        </p>
        <p><b>Last name</b> : <input type="text" name="last_name"  value="<?php echo $_SESSION["last_name"]; ?>"/> <span class="error text-danger">*</span>
        </p>
        <p><b>Email : </b><input type="text" name="email" value="<?php echo $_SESSION["email"]; ?>"/> <span class="error text-danger">*</span></p>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
        <span class="error text-danger">*</span></p>
        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
        <span class="error text-danger">*</span></p>
        <hr>


        <p><input type="submit" value="Register"></p>
    </form>


</section>






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
