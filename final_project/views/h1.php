
<!DOCTYPE html>

<html>

    <head>

       

        <link href="../public/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="../public/js/jquery-1.11.3.min.js"></script>
       <script src="../public/js/myfile.js"></script>
		 <script src="../public/js/bootstrap.min.js"></script>
        <!-- http://getbootstrap.com/ -->
        

        <script src="../public/js/scripts.js"></script>
		
		


		

    </head>

    <body onload="myfun()">

        <div class="container">

            <div id="header1" style="background-color:#0A436E;">
                <br>
                    <a href="../public/index.php"><h2>ADMISSION SYSTEM</a>
                 
                </div>
                
                <nav>
                <div id="menu">
                <?php if ((!empty($_SESSION["id"])) && $_SESSION["id"]!=-1): ?>
                    <ul class="nav1">
                        <li><a href="document_upload.php">Upload Document</a></li>
                        <li><a href="verified_upload.php">Verfied Document</a></li>
                        <li><a href="merit_list.php">Merit List</a></li>
                        <li><a href="confirm.php">Confirm Admission</a></li>
                        <li ><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                    
                <?php endif ?>
                </div>
                </nav>
                
            </div>

            <div id="middle">
