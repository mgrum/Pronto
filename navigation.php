<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Navigation ausklappen</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">
            <img src="../resources/images/logo_nav.png" height="100%" width="auto" display="block" alt="Pronto">
        </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li <?php if (strpos($link, '/project') !== false) echo "class='active'" ?>>
                <a href="../project/overview.php">Projekt</a></li>
            <li <?php if (strpos($link, '/workpackages') !== false) echo "class='active'" ?>>
                <a href="../workpackages/list.php">Arbeitspakete</a></li>
            <li <?php if (strpos($link, '/todos') !== false) echo "class='active'" ?>>
                <a href="../todos/personal.php">To-do</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../project/dashboard.php"> Aktuelles Projekt: -
                    <b><?php
                        if (isset($_SESSION["chosenProject"])) {
                            echo $_SESSION["chosenProject"];
                        }
                        ?></b>
                </a>
          </li>
            <a href="../project/switch.php">
                <button class="btn btn-default navbar-btn">
                    <span class="glyphicon glyphicon-transfer"></span> Projekt wechseln
                </button>
            </a>
            <a href="../account/logout.php">
                <button class="btn btn-default navbar-btn">
                    <span class="glyphicon glyphicon-log-out"></span>Logout
                </button>
            </a>
        </ul>
    </div>
</nav>