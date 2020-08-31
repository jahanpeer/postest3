

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <title>Contact form</title>
        <style>
            body{
                background: #ccc;     
            }

            #contact-form{
                background: #fff;
                padding: 20px;
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
		
        <div class="container">
		
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<a class="navbar-brand" href="#">Point Of Sale System</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
						</li>    
					</ul>
				</div>
			</nav>
		</div>
		
		<div class="container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="post" id="contact-form">
                    <h3>Feedback</h3>
                    <?php
                    session_start();

                    if (isset($_POST['name'])) {

                        if (empty(($_POST['name'])) || empty(($_POST['email'])) || empty(($_POST['msg'])) || empty(($_POST['captcha']))) {
                            echo "All the fields is required";
                        } else if ($_SESSION['catcha_text'] != $_POST['captcha']) {
                            echo "Catcha is not matched , Try again..";
                        } else {

                            // if everthing is fine we can store data in mysql database
                            //connect to the db
                            //$conn = new mysqli("localhost", 'root', '');
                            //$conn->select_db("project_inv");
							
							$connection=mysqli_connect("localhost","root","");
							$db=mysqli_select_db($connection,'project_inv');
							
							
                            // here you need to write insert query 

                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $msg = $_POST['msg'];
                            //$conn->query("INSERT INTO feedback (name , email, msg,) values ('$name' ,'$email','$msg')");
							$query="INSERT INTO `feedback`(`id`, `name`, `email`, `msg`) VALUES ('','$name','$email','$msg')";
							$query_run=mysqli_query($connection,$query);
                            echo "thanks for contacting us";
                        }
                    }
                    ?>

                    <br>
                    <div class="form-group">
                        Name
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        Email
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        Message
                        <textarea  id="msg" name="msg" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        Captcha
                        <input type="text" id="captcha" name="captcha" class="form-control">
                    </div>

                    <div class="form-group">
                        <img src="captcha.php" style="border: 1px solid #ccc;">
                        <a href="">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="form-group">
                        <input type="submit"value="Submit" class="col-md-12 btn btn-primary">
                        <div class="clearfix"></div>
                    </div>

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>







        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    </body>
</html>
