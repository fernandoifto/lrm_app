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
            'bootstrap.min', 
            'estilo'
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
    <?php if($user_auth){ ?>
	<nav class="navbar navbar-inverse navbar-static-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand glyphicon glyphicon-home"" href="/lrm_app/"><?php
	      	if (isset($project_name)) {
	      		echo ' '.$project_name;
	      	}
	      	else {
	      		echo 'Cake Twitter Bootstrap';
	      	}?></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <?php
	      	$default_nav_bar_left = APP_DIR.DS.'Template'.DS.'Element'.DS.'nav-bar-left.ctp';
	      	if (file_exists($default_nav_bar_left)) {
	      		ob_start();
	      		include $default_nav_bar_left;
	      		echo ob_get_clean();
	      	}
	      	else {
	      		echo $this->element('nav-bar-left');
	      	}
      	  ?>
	      <?php
	      	$default_nav_bar_right = APP_DIR.DS.'Template'.DS.'Element'.DS.'nav-bar-right.ctp';
	      	if (file_exists($default_nav_bar_right)) {
	      		ob_start();
	      		include $default_nav_bar_right;
	      		echo ob_get_clean();
	      	}
	      	else {
	      		echo $this->element('nav-bar-right');
	      	}
      	  ?>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
        
    <?php } ?>
	<section class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </section>
        <hr>
    <?php if($user_auth){ ?>
        <footer class="footer">
            <div class="container-fluid">
                <p>
                    LRM &copy; 2023 - Developed by FSA.
                </p>
            </div>
        </footer>
        
    <?php } ?>
    <?= 
        $this->Html->script([
            'jquery.min.js',
            'bootstrap.min',
			'mascaras'
        ]) 
    ?>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</body>
</html>