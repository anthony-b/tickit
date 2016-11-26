<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo ROOT_URL;?>">Tick-It!</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if($_SESSION['username']){?>
            <ul class="nav navbar-nav navbar-right">
                <?php if($_SESSION['accounttype'] == 'admin'){?>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo ROOT_URL;?>departments/">Departments</a>
                        </li>
                        <li>
                            <a href="<?php echo ROOT_URL;?>agents/">Agents</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo ROOT_URL;?>admin/settings.php">Settings</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li><a href="<?php echo ROOT_URL;?>tickets/new.php" class=""></span>New Ticket <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"  aria-hidden="true"></span><span class="caret"></span></a>
                    <ul  class="dropdown-menu">
                        <li><a href="<?php echo ROOT_URL;?>profile/">View Profile</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo ROOT_URL;?>logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
            <?php }; ?>
        </div>
    </div>
</nav>
<div class="navfix"></div>