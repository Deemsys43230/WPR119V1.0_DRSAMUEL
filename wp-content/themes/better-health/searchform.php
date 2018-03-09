<?php
/**
 * Custom Search Form
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
global  $better_health_placeholder_option;
?>
<div class="search-block">
    <form action="<?php echo esc_url( home_url() )?>" class="searchform search-form" id="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
            $better_health_placeholder_text = '';
             $better_health_placeholder_option = better_health_get_option( 'better_health_post_search_placeholder_option');
            if ( !empty( $better_health_placeholder_option) ):
                $better_health_placeholder_text = 'placeholder="'.esc_attr ( $better_health_placeholder_option ). '"';
            endif; ?>
            <input type="text" <?php echo $better_health_placeholder_text ;?> class="blog-search-field" id="menu-search" name="s" value="<?php echo get_search_query();?>">
            <button class="searchsubmit fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>