<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
get_header(); 


//Retrieving breadcrump value from customizer field
$better_health_breadcrump_option = better_health_get_option('better_health_breadcrumb_setting_option');
 
//Condition to check breadcrump option
if ($better_health_breadcrump_option == "enable") {
?>
    <section id="inner-title" class="inner-title">
        <div class="container">
            <div class="row">
                <div class="col-md-8"><h2><?php esc_html_e('404 Not Found', 'better-health'); ?></h2></div>
                  <div class="col-md-4">
                        <div class="breadcrumbs">
                            <?php 
                             // Function to display breadcrump
                             breadcrumb_trail(); 
                            ?>
                        </div><!-- .breadcrumbs -->
                    </div><!-- .col-md-4-->
                
            </div><!-- .row-->
        </div><!-- .container-->
    </section><!-- .inner-title-->
<?php } ?>    
    <section id="section19" class="section19">
        <div class="container">
            <div class="row">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <section class="error-404 not-found">
                            <header class="page-header">
                                <h1><?php esc_html_e('404', 'better-health'); ?></h1>
                            </header><!-- .page-header -->

                                <h3><?php esc_html_e('It looks like nothing was found at this location.', 'better-health'); ?></h3>
                                <!-- Search form -->
                                    <div class="text-center">
                                        <div class="col-xs-12 col-sm-6 col-xs-offset-0 col-sm-offset-3">
                                            <?php 

                                             // Function to display search form
                                                get_search_form(); 
                                             ?>
                                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="btn btn-primary"><?php esc_html_e('Return To Home', 'better-health'); ?></a>
                                        </div><!-- .col-xs-12 --> 
                                    </div> <!-- .text-center --> 
                        </section><!-- .error-404 -->

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- #section19 -->
<?php
get_footer();
