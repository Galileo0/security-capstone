<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#intro"> Messaging System </a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php">Home</a>
                </li>
            <?php 
            
            if( $_SESSION['u_id'] != '')
            {
            ?>
            <li>
                    <a href="inbox.php">inbox</a>
                </li>
                <li>
                    <a href="newmessage.php">send message</a>
                </li>
               
                <li>
                    <a href="db_dump/dump.php">Dump Database</a>
                </li>
                <li>
                    <a href="Logout.php">Logout</a>
                </li>
            <?php 
            }else{ ?>
            
            <li>
                    <a href="login/">Login</a>
                </li>
                <li>
                    <a href="register/">Sign Up</a>
                </li>
            <?php }?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>