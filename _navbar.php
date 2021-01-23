<!--
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">CST323</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/CST323/index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php
            if (isset($_SESSION['userID']) && $_SESSION['role'] == 4) {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/CST323/index.php">Foo</a>
                        <a class="dropdown-item" href="/CST323/index.php">Bar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/CST323/index.php">Add New Foo</a>
                        <a class="dropdown-item" href="/CST323/index.php">Other Stuff</a>
                    </div>
                </li>
                <?php
            }
            ?>

        </ul>


        <?php
        if (!isset($_SESSION['userID'])) {
            ?>
            <form class="form-inline my-2 my-lg-0" action="/CST323/presentation/views/login/Login.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log In</button>
            </form>
            <?php
        } else {
            ?>
            <form class="form-inline my-2 my-lg-0" action="/CST323/presentation/views/login/Logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log Out</button>
            </form>

            <?php
        }
        ?>

    </div>
</nav>