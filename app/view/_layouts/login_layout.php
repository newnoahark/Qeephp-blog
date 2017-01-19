<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="keep_wan">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <title><?php $this->_block('title'); ?><?php $this->_endblock(); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>lib/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>lib/node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/admin-css/nifty.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/admin-css/nifty-demo.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/admin-css/nifty-demo-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>lib/pace/themes/pink/pace-theme-center-circle.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/main.css">

</head>
<body id="login">

<div id="container" class="cls-container">
    <div id="bg-overlay" class="bg-img"></div>
    <?php $this->_block('contents'); ?><?php $this->_endblock(); ?>

</div>

    <script type="text/javascript" src="<?php echo $_BASE_DIR;?>lib/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $_BASE_DIR;?>lib/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $_BASE_DIR;?>lib/pace/pace.js"></script>
    <?php $this->_block('scripts');?> <?php $this->_endblock();?>
</body>
</html>
