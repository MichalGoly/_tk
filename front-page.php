<?php
/**
 * Static front page with the header and footer written by hand to enable custom bootstrap grid layout (different from the blog one)
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html lang="en-GB">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="Michal Goly" />
	<meta name="description" content="My name is Michal Goly and I am a second year, Software Engineering 
      student at Aberystwyth University in Wales" />
	<meta name="keywords" content="Michal, Goly, Software, Engineering, Student, Aberystwyth, University" />
   <meta name="theme-color" content="#34495E" />

	<title>Michal Goly &#124; Software Engineering Student</title>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

	<!-- Google Analytics -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-65132382-1', 'auto');
	  ga('send', 'pageview');
	</script>	
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"><?php _e('Toggle navigation','_tk') ?> </span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
	
				<!-- Your site title as branding in the menu -->
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" 
               title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
               rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>

			<!-- The WordPress Menu goes here -->
			<?php wp_nav_menu(
				array(
					'theme_location' 	=> 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'menu_class' 		=> 'nav navbar-nav navbar-right',
					'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
					'menu_id'			=> 'main-menu',
					'walker' 			=> new wp_bootstrap_navwalker()
				)
			); ?>
		</div>
	</div><!-- .navbar -->

	<!-- Content -->
	<div class="container">
		<div class="row">
			<div class="col-md-6 vpost">
				<img class="img-circle img-responsive" src="<?php echo get_template_directory_uri(); ?>/includes/img/profile-picture-small.jpg" 
               alt="Profile Picture" />
			</div><!-- important comment do not remove (part of the vpost hack)
		--><div class="col-md-6 vpost">
				<h1>Hi there, it's nice to meet you!</h1>

				<p>
					My name is Michal Goly and I am a second year, <a href="https://courses.aber.ac.uk/undergraduate/software-engineering/" 
               target="blank_"> Software Engineering</a> student at <a href="http://www.aber.ac.uk/en/" target="blank_">
               Aberystwyth University</a> in Wales. I have been exposed to various technologies and programming languages both at 
               the university and while coding on my own. Most of my development so far has been done in Core Java, and I 
               am currently starting to write web applications with Servlets and JSPs. I have been also awarded the Glyn Emery 
               Prize for best performance by a first year Computer Science student in the academic year 2014/2015. 
				</p>

				<p>
					Please feel free to have a look at my <a href="https://github.com/MichalGoly" target="blank_">GitHub</a> profile to see 
               what I am currently working on. If you would like to contact me, you can do so either on 
               <a href="http://uk.linkedin.com/in/michalgoly" target="blank_">LinkedIn</a> or via the 
               <a href="/contact" target="blank_">contact form</a>.
				</p>

			</div>
		</div>
		<div class="row">
			<h3 class="recent-posts">Recent Posts</h3>
		</div>
		<div class="row">
			<?php
			//display 2 posts for category id 47
			    $args = array (
			      'post_type' 			=> 'post',
			      'post_status' 			=> 'publish',
			      'posts_per_page' 		=> 2,
			      'caller_get_posts'	=> 1
			    );

			    $my_query = null;
			    $my_query = new WP_Query($args);
			    
			    if ( $my_query -> have_posts() ) {
			      while ($my_query -> have_posts()) : $my_query -> the_post(); ?>
			      	<div class="col-md-6">
							<h4 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
			      		<div class="entry-meta">
								<?php _tk_posted_on(); ?>
							</div><!-- .entry-meta -->
							<div class="entry-content">
								<p>
									<?php echo get_the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>">Continue reading <span class="fa fa-arrow-right"></span></a>
								</p>

								<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
										'after'  => '</div>',
									) );
								?>
							</div><!-- .entry-content -->
			      	</div>
			       <?php
			      endwhile;
			    }
			wp_reset_query();  // Restore global post data stomped by the_post().
			?>
		</div>
	</div>	

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1><a href="http://uk.linkedin.com/in/michalgoly" target="_blank"><span class="fui fui-linkedin"></span></a> 
					<a href="https://github.com/MichalGoly" target="_blank"><span class="fui fui-github"></span></a></h1>
				</div>
				<div class="col-sm-4 credits">
					<p>Powered by <a href="https://wordpress.org/">WordPress</a></p>
					<p>Build on <a href="https://github.com/Themekraft/_tk" target="_blank">_tk</a> theme 
               using <a href="https://github.com/designmodo/Flat-UI" target="_blank">FlatUI</a> components</p>
				</div>
			</div>
		</div>	
	</footer>

<?php wp_footer(); ?>

</body>
</html>