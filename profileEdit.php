<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile - Farming</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="login.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
    <link rel="stylesheet" href="indexfooter.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    <style>
        /* Custom styles */
        input[type="text"],
        input[type="email"],
        textarea {
            background-color: white; /* White background for input fields */
            color: #333; /* Dark text color */
            border: 1px solid #ccc; /* Light gray border */
            padding: 8px; /* Padding inside the input fields */
            width: 100%; /* Full width */
        }
        
        ::placeholder {
            color: #888; /* Gray placeholder text color */
        }
    </style>
</head>

<body>
    <?php require 'menu.php'; ?>

    <!-- Banner and Header -->
    <section id="banner" class="wrapper">
        <div class="container">
            <h2>Edit Profile - Farming</h2>
            <!-- Your profile editing form -->
            <div class="row uniform">
                <div class="12u$">
                    <form action="update_profile.php" method="post">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="fname" id="fname" value="<?php echo isset($user['fname']) ? $user['fname'] : ''; ?>" placeholder="Full Name" required />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
                                <input type="text" name="fusername" id="fusername" value="<?php echo isset($user['fusername']) ? $user['fusername'] : ''; ?>" placeholder="Username" required />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="email" name="femail" id="femail" value="<?php echo isset($user['femail']) ? $user['femail'] : ''; ?>" placeholder="Email Address" required />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
                                <input type="text" name="fmobile" id="fmobile" value="<?php echo isset($user['fmobile']) ? $user['fmobile'] : ''; ?>" placeholder="Mobile Number" required />
                            </div>
                            <div class="12u$">
                                <textarea name="faddress" id="faddress" placeholder="Address" rows="4"><?php echo isset($user['faddress']) ? $user['faddress'] : ''; ?></textarea>
                            </div>
                            <div class="12u$">
                                <input type="submit" value="Save Changes" class="button special" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php require 'footer.php'; ?>

</body>

</html>
