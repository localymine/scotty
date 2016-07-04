<?php // the_widget('WP_Custom_Post_Type_Widgets_Recent_Posts', array('posttype' => 'news')) ?>

<div id="sidebar" class="col-md-4" role="complementary">
    <div class="sidebar-inner">
        
        <?php dynamic_sidebar('sidebar');?>
        
        <aside class="widget-area">
            <div id="recent-posts-2" class="widget widget_recent_entries">
                <h3 class="widget_title">Recent Posts</h3>
                <ul>
                    <?php the_widget('WP_Widget_Recent_Posts', __('Recent News')); ?> 
                </ul>
            </div>
            <div id="categories-2" class="widget widget_categories">
                <h3 class="widget_title">Categories</h3>
                <ul>
                    <li class="cat-item cat-item-1"><a href="http://demo.themeum.com/starter/?cat=1">Uncategorized</a>
                    </li>
                </ul>
            </div>
            <div id="recent-comments-2" class="widget widget_recent_comments">
                <h3 class="widget_title">Recent Comments</h3>
                <ul id="recentcomments">
                    <li class="recentcomments"><span class="comment-author-link"><a href="http://#" rel="external nofollow" class="url">admin</a></span> on <a href="http://demo.themeum.com/starter/?p=42#comment-4">Video Post type</a>
                    </li>
                    <li class="recentcomments"><span class="comment-author-link"><a href="http://#" rel="external nofollow" class="url">admin</a></span> on <a href="http://demo.themeum.com/starter/?p=42#comment-3">Video Post type</a>
                    </li>
                    <li class="recentcomments"><span class="comment-author-link"><a href="http://#" rel="external nofollow" class="url">admin</a></span> on <a href="http://demo.themeum.com/starter/?p=42#comment-2">Video Post type</a>
                    </li>
                </ul>
            </div>
            <div id="meta-2" class="widget widget_meta">
                <h3 class="widget_title">Meta</h3>
                <ul>
                    <li><a href="http://demo.themeum.com/starter/wp-login.php">Log in</a>
                    </li>
                    <li><a href="http://demo.themeum.com/starter/?feed=rss2">Entries <abbr title="Really Simple Syndication">RSS</abbr></a>
                    </li>
                    <li><a href="http://demo.themeum.com/starter/?feed=comments-rss2">Comments <abbr title="Really Simple Syndication">RSS</abbr></a>
                    </li>
                    <li><a href="https://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a>
                    </li>
                </ul>
            </div>
            <div id="calendar-2" class="widget widget_calendar">
                <div id="calendar_wrap" class="calendar_wrap">
                    <?php the_widget('WP_Widget_Calendar'); ?> 
                </div>
            </div>
            <div id="archives-2" class="widget widget_archive">
                <h3 class="widget_title">Archives</h3>
                <ul>
                    <?php
                    $args = array(
                        'post_type' => 'news',
                    );
                    ?>
                    <?php the_widget('WP_Widget_Archives', __('Archives Test'), $args); ?> 
                </ul>
            </div>
            <div id="search-2" class="widget widget_search">
                <?php get_search_form() ?>
            </div>
        </aside>
    </div>
</div>
<!-- #sidebar -->