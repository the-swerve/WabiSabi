
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<p align="center">
			<img src="<?php echo P.'/templates/images/logo.png'; ?>" height="100%" width="80%">
			</p>
		</div>

		<div id="menu">
			<?php echo navigation(); ?>
		</div>

		<div id="banner">
			<img src="<?php echo P.'/templates/images/banner2.jpg'; ?>" width="100%">
		</div>
	</div>
	<div id="page">
		<div id="content">

			<?php echo field('homepage_content', 'specific'); ?>
	
		</div>
		<div id="sidebar">
			<div id="tbox1">
				<?php echo field('sidebar', 'generic'); ?> 
			</div>
		</div>
	</div>
	<div id="three-column">

		<div id="tbox1">
			<?php echo field('first_footer', 'generic'); ?>
		</div>
		<div id="tbox2">
			<?php echo field('second_footer', 'generic'); ?>
		</div>

		<div id="tbox3">
			<h2>Recent stories</h2>
			<ul class="style1">
				<li class="first"><a href="#">Pellentesque consectetuer gravida blandit.</a></li>
				<li><a href="#">Lorem consectetuer adipiscing elit.</a></li>
				<li><a href="#">Maecenas vitae vitae feugiat eleifend.</a></li>
			</ul>
			<p><a href="#" class="button-style">Read More</a></p>
		</div>

	</div>
	<div id="footer">
		<p>This website donated by <a href="http://commitchange.com">CommitChange</a>
		</div>
</div>
</body>
</html>
