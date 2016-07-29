<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>
        <script src="/js/myfile.js"></script>
        <!-- http://getbootstrap.com/ -->
        

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="header1" style="background-color:#0A436E;">
                <br>
                    <a href="/"><img style="width:200px" alt="C$50 Finance" src="/img/download.png"/></a>
                 
                </div>
                
                <nav>
                <div id="menu">
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav1">
                        <li><a href="quote.php">Quote</a></li>
                        <li><a href="buy.php">Buy</a></li>
                        <li><a href="sell.php">Sell</a></li>
                        <li><a href="history.php">History</a></li>
                        <li ><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                    
                <?php endif ?>
                </div>
                </nav>
                
            </div>

            <div id="middle">
