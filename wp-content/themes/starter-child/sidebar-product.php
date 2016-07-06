<?php // the_widget('WP_Custom_Post_Type_Widgets_Recent_Posts', array('posttype' => 'news'))     ?>

<div id="sidebar" class="col-md-4" role="complementary">
    <div class="sidebar-inner">

        <aside class="widget-area">
            <?php
            $args = array(
                'posttype' => 'product',
                'title' => 'Recent Products',
            );
            $instance = array(
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>',
            );
            ?>
            <?php the_widget('WP_Custom_Post_Type_Widgets_Recent_Posts', $args, $instance); ?> 

            <div id="search-2" class="widget widget_search">
                <?php get_search_form() ?>
            </div>
        </aside>
    </div>
</div>
<!-- #sidebar -->