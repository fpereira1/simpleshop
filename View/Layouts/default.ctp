<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('/bootstrap/css/bootstrap.min.css');
		echo $this->Html->css('default');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="<?php echo $this->request->controller; ?>">
	<div class="container">

		<div class="row"><!-- 
			<div class="span2">
				<img src="http://cdn1.iconfinder.com/data/icons/womens_day_icons/128/handbag.png" alt="">
			</div> -->
			<div class="span12">
				<h1><?php echo $this->Html->link(Configure::read('Shop.name'), '/'); ?></h1>
			</div>
		</div>

		<div class="navbar">
			<div class="navbar-inner">
				<?php echo $this->element('menu') ?>
			</div>
		</div>
		
		<div class="clearfix">
			<div class="row">
				<div class="span3">
					&nbsp;
				</div>
				<div class="span9">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
				</div>

			</div>
		</div>
	</div>

	<p>&nbsp;</p>
	
	<script src="//code.jquery.com/jquery-latest.js"></script>
</body>
</html>
