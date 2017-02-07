<nav class="navbar navbar-inverse">


    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="icon.png" height="100%" width="auto" display="block" alt="icon">
        </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li <?php if (strpos($link, '/project') !== false) echo "class='active'" ?>>
                <a href="../project/overview.php">Projekt</a></li>
            <li <?php if (strpos($link, '/workpackages') !== false) echo "class='active'" ?>>
                <a href="../workpackages/overview.php">Arbeitspakete</a></li>
            <li <?php if (strpos($link, '/todos') !== false) echo "class='active'" ?>>
                <a href="../todos/personal.php">To-do</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

            <li><a href="#"> Aktuelles Projekt: - </a></li>
            <button class="btn btn-default navbar-btn"><a href="../project/overview.php"><span
                            class="glyphicon glyphicon-transfer"></span> Projekt wechseln</a></button>
            <button class="btn btn-default navbar-btn"><a href="#"><span class="glyphicon glyphicon-log-out"></span>
                    Logout</a></button>

        </ul>
    </div>
    <?php
    
    ?>
    

</nav>