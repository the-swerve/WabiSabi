
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

				<hr>
				<h2>Foodbank Location</h2>

					<p>220 Thurston Ave NE, Olympia WA 98501 <br />

					<br />

					<iframe width="300" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=220+Thurston+Ave+NE%3B+Olympia&amp;aq=&amp;sll=37.6,-95.665&amp;sspn=56.717625,49.921875&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=220+Thurston+Ave+NE,+Olympia,+Thurston,+Washington+98501&amp;ll=47.047669,-122.899761&amp;spn=0.011697,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=220+Thurston+Ave+NE%3B+Olympia&amp;aq=&amp;sll=37.6,-95.665&amp;sspn=56.717625,49.921875&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=220+Thurston+Ave+NE,+Olympia,+Thurston,+Washington+98501&amp;ll=47.047669,-122.899761&amp;spn=0.011697,0.025663&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small></p>

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
