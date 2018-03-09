<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
$hide_show_feature_image=better_health_get_option( 'better_health_show_feature_image_single_option');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="section-14-box wow fadeInUp <?php if(!has_post_thumbnail() || $hide_show_feature_image=='hide') { echo'no-image'; }?>">
      <div class="section-14-img"> 
         <?php
            
             if(has_post_thumbnail())
              {
                the_post_thumbnail('full', array('class' => 'img-responsive'));
              }
                 
          ?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="comments comment-archive">
              <div class="front-blog-date">
                <a class="btn btn-primary btn-sm">
                  <span class="publish-date"> <?php echo esc_html(get_the_date('d')) ?> </span>
                  <span class="publish-month"><?php echo esc_html( get_the_date('M')) ?></span>
                </a>
              </div>
          </div>
          <div class="blog-inner-title-meta">
            <h3 class="text-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="section-14-meta">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><i class="fa fa-calendar-check-o"></i><span><?php echo esc_html( get_the_date('M')) ?></span> , <?php echo esc_html(get_the_date('d')) ?> , <span><?php echo esc_html( get_the_date('Y')) ?></span></a>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><i class="fa fa-user-o"></i><?php the_author(); ?></a>
            </div>
          </div>
        </div>
      </div>

      <?php the_content(); 
          wp_link_pages( array(
              'before' => '<div class="page-links">' . esc_html__( 'Pages:','better-health' ),
              'after'  => '</div>',
            ) );
      ?>
       <?php if ( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                  <?php
                    edit_post_link(
                      sprintf(
                        /* translators: %s: Name of current post */
                        esc_html__( 'Edit %s','better-health'),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                      ),
                      '<span class="edit-link">',
                      '</span>'
                    );
                  ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>          
      </div>     
 </div><!-- #post-## -->         
          