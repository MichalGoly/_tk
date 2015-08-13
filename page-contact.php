<?php
/**
 * Static contact page with the header and footer written by hand to enable custom bootstrap grid layout (different from the blog one)
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
    <meta name="theme-color" content="#34495E" />

    <title>Contact &#124; Michal Goly &#124; Software Engineering Student</title>

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
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            </div>

            <!-- The WordPress Menu goes here -->
            <?php wp_nav_menu(
                array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'menu_class'        => 'nav navbar-nav navbar-right',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'menu_id'           => 'main-menu',
                    'walker'            => new wp_bootstrap_navwalker()
                )
            ); ?>
        </div>
    </div><!-- .navbar -->

    <!-- Content -->
   <div class="jumbotron dark-jumbotron">
        <div class="container">
            <h2 class="centre">Contact me <span class="fa fa-smile-o"></span></h2>
        </div>
   </div>

   <div class="container">
       <div class="row">
           <div class="col-md-8 col-md-offset-2">
               <?php echo do_shortcode( '[contact-form-7 id="44" title="Contact form 1"]' ); ?>
           </div>
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
                    <p>Build on <a href="https://github.com/Themekraft/_tk" target="_blank">_tk</a> theme using <a href="https://github.com/designmodo/Flat-UI" target="_blank">FlatUI</a> components</p>
                </div>
            </div>
        </div>  
    </footer>

<?php wp_footer(); ?>

</body>
</html>