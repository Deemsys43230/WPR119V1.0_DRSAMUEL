<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
$description_from = better_health_get_option( 'better_health_blog_excerpt_option');
$description_length = better_health_get_option( 'better_health_description_length_option');
$readme_text = better_health_get_option( 'better_health_read_more_text_blog_archive_option');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <div   class="section-14-box wow fadeInUp <?php if(!has_post_thumbnail()) { echo "no-image"; } ?>">
             <div class="date" ></div>
             <div class="section-14-img"> 
             <?php
                
                 if(has_post_thumbnail()) {
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
                       <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><i class="fa fa-user-o"></i><?php the_author(); ?></a>
                        <?php better_health_entry_footer(); ?>
                    </div>
                  </div>
                    </div>
                </div>
               <?php
               echo "<p>";
               if($description_from=='content')
               {
                   echo esc_html( wp_trim_words(get_the_content(),$description_length) );
               }
               else
               {
                   echo esc_html( wp_trim_words(get_the_excerpt(),$description_length) );
               }
               echo "</p>";
               ?>

              <div class="row">
                <div class="col-md-12">
                 <?php 
                  if(!empty($readme_text))
                  {
                 ?>
                    <div class="text-left"><a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php  echo esc_html($readme_text); ?></a></div>
                </div>
               <?php } 
                 wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:','better-health'),
                        'after'  => '</div>',
                      ) );
                    ?>
              </div>
       </div>
  </div><!-- #post-## -->







