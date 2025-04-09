<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $this->fetch('title') ?></title>
     <!-- Bootstrap core CSS -->
    <?= 
        $this->Html->css([
            'bootstrap.min'
        ]) 
    ?>
	
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand glyphicon glyphicon-home" href="/lrm_app"> LRM</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">             
                <ul class="nav navbar-nav navbar-right">
                    <li class="last"><a class="glyphicon glyphicon-user" href="/lrm_app/admin"> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">

        <?= $this->Flash->render(); ?>
        <?= $this->fetch('content'); ?>
        
        <hr>
        <footer class="footer">
            <div class="container-fluid">
                <p>
                    LRM &copy; 2023
                </p>
            </div>
        </footer>
    </div> <!-- /container -->
    <?= 
        $this->Html->script([
            'jquery.min.js',
            'bootstrap.min',
            'mascaras'
        ]) 
    ?>
</body>
</html>