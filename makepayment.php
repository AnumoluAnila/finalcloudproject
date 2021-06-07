
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <!-- <link rel="stylesheet" href="medicine.css"> -->
</head>
<style>
.card{
    position:relative;
    top:160px;
}
.btn{
    align-items: center;
    margin-left:120px;
}
</style>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                 <div class="container"> 
                    <!-- <a class="navbar-brand" href="#">PMS</a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                  <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                <ul class="navbar-nav ml-auto"> 
                    <!-- <li class="nav-item active mr-3">
                        <a class="nav-link" href="customer.php">Home </a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="about.php">AboutUs</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="medicine.php">Medicine</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="mycart.php">Cart</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="orderpage.php">Orders</a>
                    </li> -->
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="mycart.php">Back</a>
                    </li>
                </ul> 
                <!-- </div>       -->
                 </div> 
              </nav>
              <div class="container">
        <div class="row">
        <div class="col-lg-4 m-auto">
        <div class="card mt-5 mt-5">
        <div class="card-title">
        <h2 class="text-center py-2">Make payment</h2>
        <hr>
        <div>
              <div class="card-body ">
            <form  method="POST" action="order.php">
                <input type="text" name="Uname" placeholder="Card Number" class="form-control mb-2" required>
                <input type="text" name="Email" placeholder="CVV" class="form-control mb-2" required>
                <label class="mt-3 text-primary font-weight-bold"><?php echo "Total Price  Rs ".$_POST['total'] ?></label>
                <button class="btn btn-primary mt-3" name="order">payment</button>
            </form>

        </div>
</div>
</body>
</html>     