

<?php
	session_start();

	require 'db.php';

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: Login/error.php");
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		if(isset($_POST['comment']) AND $_POST['comment'] != "")
		{
			$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
			$result = mysqli_query($conn, $sql);

			while($row = $result->fetch_array())
			{
				$check = "submit".$row['blogId'];
				if(isset($_POST[$check]))
				{
					$blogId = $row['blogId'];
					break;
	 			}
			}

			$comment = dataFilter($_POST['comment']);
			if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
			{
				$commentUser = $_SESSION['Username'];
				$pic = $_SESSION['picName'];
			}
			else {
				$commentUser = "Anonymous";
				$pic = "profile0.png";
			}
			if(isset($blogId))
			{
				$sql = "INSERT INTO blogfeedback (blogId, comment, commentUser, commentPic)
						VALUES ('$blogId' ,'$comment', '$commentUser', '$pic');";
				$result = mysqli_query($conn, $sql);
			}
		}

		else
		{
			$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
			$result = mysqli_query($conn, $sql);

			while($row = $result->fetch_array())
			{
				$check = "like".$row['blogId'];
				if(isset($_POST[$check]))
				{
					$blogId = $row['blogId'];
					break;
				}
			}
			$likeCheck = "isLiked".$blogId;
			if(!isset($_SESSION[$likeCheck]) OR $_SESSION[$likeCheck] == 0)
			{
				$id = $_SESSION['id'];
				$sql = "SELECT * FROM likedata WHERE blogId = '$blogId' AND blogUserId = '$id'";
				$result = mysqli_query($conn, $sql);
				$num_rows = mysqli_num_rows($result);
				if($num_rows == 0)
				{
					$sql = "INSERT INTO likedata (blogId, blogUserId)
							VALUES('$blogId', '$id')";
					$result = mysqli_query($conn, $sql);
					$sql = "UPDATE blogdata SET likes = likes + 1 WHERE blogId = '$blogId'";
					$result = mysqli_query($conn, $sql);
					$_SESSION[$likeCheck] = 1;
				}
			}
		}
	}

	function dataFilter($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
	$result = mysqli_query($conn, $sql);

	function formatDate($date)
	{
		return date('g:i a', strtotime($date));
	}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>AgroCulture : Blogs</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		<link rel="stylesheet" href="Blog/commentBox.css" />
	</head>
	<body class="subpage">

		<?php
			require 'menu.php';

		?>




<div id="aboutUs" style="font-family: Arial, sans-serif; padding: 20px; max-width: 800px; margin: 0 auto;">
    <center>
    <h1 style="font-size: 2em; margin-bottom: 20px;">About Us</h1>
    </center><br><br>

    <div>
        <h3 style="font-size: 1.5em; margin-bottom: 10px;">Farming &copy; </h3>
        <!-- <div>
            <a href="index.php"><img src="images/logo.png" width="200px"></a>
        </div> -->
        <br />
        <p style="line-height: 1.6; margin-bottom: 10px;">Your product Our market !!!</p>
        <br />
    </div>

    <div>
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <i class="fa fa-map-marker" style="font-size: 1.2em; margin-right: 10px;"></i>
            <p style="margin-left: 10px; font-size: 1em;">Farming market<span>Sullia</span></p>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <i class="fa fa-phone" style="font-size: 1.2em; margin-right: 10px;"></i>
            <p style="margin-left: 10px; font-size: 1em;">7022887988</p>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <i class="fa fa-envelope" style="font-size: 1.2em; margin-right: 10px;"></i>
            <p style="margin-left: 10px; font-size: 1em;"><a href="mailto:farming@gmail.com" style="color: #1a73e8; text-decoration: none;">farming@gmail.com</a></p>
        </div>
    </div>

    <div>
        <p style="line-height: 1.6; margin-bottom: 10px;">
            <span><b>About Farming</b></span>
            Farming is e-commerce trading platform for grains & groceries...
        </p>
        <div>
            <a href="#" style="display: inline-block; margin: 5px; padding: 10px; background-color: #f1f1f1; border-radius: 5px; color: #333; text-decoration: none;">
                <i class="fa fa-facebook" style="font-size: 1.5em; margin-right: 15px;"></i>
            </a>
            <a href="#" style="display: inline-block; margin: 5px; padding: 10px; background-color: #f1f1f1; border-radius: 5px; color: #333; text-decoration: none;">
                <i class="fa fa-instagram" style="font-size: 1.5em; margin-right: 15px;"></i>
            </a>
            <a href="#" style="display: inline-block; margin: 5px; padding: 10px; background-color: #f1f1f1; border-radius: 5px; color: #333; text-decoration: none;">
                <i class="fa fa-youtube" style="font-size: 1.5em; margin-right: 15px;"></i>
            </a>
        </div>
    </div>
</div>



	</body>
</html>

