<?php
/*
 * Author: KhangLe
 * Template Name: News Archives
 *
 */
get_header();
?>

<section id="main" class="container">
    <div class="row">
        <div id="content" class="site-content col-md-8" role="main">

            <?php
            $args = array(
                'post_type' => 'news',
                'posts_per_page' => -1,
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <?php while ($loop->have_posts()): $loop->the_post(); ?>
                    <article id="post-<?php the_ID() ?>" class="post-<?php the_ID() ?> post type-post status-publish format-gallery hentry category-uncategorized post_format-post-format-gallery">
                        <header class="entry-header">

                            <div id="blog-gallery-slider" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">

                                    <?php $n_i = 0; ?>
                                    <?php if (have_rows('images')): ?>
                                        <?php while (have_rows('images')): the_row(); ?>

                                            <?php
                                            $image = get_sub_field('image');

                                            // vars
                                            $url = $image['url'];

                                            // thumbnail
                                            $size = 'large';
                                            $thumb = $image['sizes'][$size];
                                            ?>

                                            <div class="item <?php echo ($n_i == 0) ? 'active' : '' ?>">
                                                <img src="<?php echo $thumb ?>" alt="">
                                            </div>
                                            <?php $n_i++; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#blog-gallery-slider" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#blog-gallery-slider" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>

                        </header>
                        <!--/.entry-header -->

                        <div class="clearfix post-content media">
                            <div class="pull-left">
                                <h4 class="post-format">
                                    <i class="fa fa-newspaper-o"></i>
                                </h4>
                                <h6 class="publish-date">
                                    <time class="entry-date" datetime="<?php echo get_the_date('M, d Y h:i:s T') ?>"><?php echo get_the_date('M, d Y') ?></time>
                                </h6>
                            </div>
                            <div class="media-body">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a>
                                </h2>
                                <!-- //.entry-title -->

                                <div class="clearfix entry-meta">
                                    <ul>
                                        <li class="author-category"><i class="fa fa-pencil"></i> BY <a href="<?php the_author_link() ?>" title="Posts by admin" rel="author">admin</a> IN <a href="http://demo.themeum.com/starter/?cat=1" rel="category"><?php _e(get_the_category()) ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <!--/.entry-meta -->
                                <div class="entry-summary">
                                    <p><?php the_excerpt() ?></p>
                                    <p>
                                        <a class="btn btn-success btn-lg" href="<?php the_permalink() ?>">Continue Reading →</a>
                                    </p>
                                </div>
                                <!-- //.entry-summary -->
                            </div>
                        </div>


                    </article>
                    <!--/#post -->
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata() ?>

            <ul class="pagination">
                <li class="active"><a href="#">1</a>
                </li>
                <li><a href="http://demo.themeum.com/starter/?page_id=161&amp;paged=2">2</a>
                </li>
                <li><a href="http://demo.themeum.com/starter/?page_id=161&amp;paged=3">3</a>
                </li>
            </ul>

        </div>
        <!-- #content -->

        <div id="sidebar" class="col-md-4" role="complementary">
            <div class="sidebar-inner">
                <aside class="widget-area">
                    <div id="recent-posts-2" class="widget widget_recent_entries">
                        <h3 class="widget_title">Recent Posts</h3>
                        <ul>
                            <li>
                                <a href="http://demo.themeum.com/starter/?p=121">Job Seeking Out of Your Industry</a>
                            </li>
                            <li>
                                <a href="http://demo.themeum.com/starter/?p=62">Aenean et felis sagittis</a>
                            </li>
                            <li>
                                <a href="http://demo.themeum.com/starter/?p=60">Many desktop publishing packages</a>
                            </li>
                            <li>
                                <a href="http://demo.themeum.com/starter/?p=58">also the leap into electronic</a>
                            </li>
                            <li>
                                <a href="http://demo.themeum.com/starter/?p=56">If you are going to use a passage</a>
                            </li>
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
                            <table id="wp-calendar">
                                <caption>June 2016</caption>
                                <thead>
                                    <tr>
                                        <th scope="col" title="Monday">M</th>
                                        <th scope="col" title="Tuesday">T</th>
                                        <th scope="col" title="Wednesday">W</th>
                                        <th scope="col" title="Thursday">T</th>
                                        <th scope="col" title="Friday">F</th>
                                        <th scope="col" title="Saturday">S</th>
                                        <th scope="col" title="Sunday">S</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <td colspan="3" id="prev"><a href="http://demo.themeum.com/starter/?m=201402">« Feb</a>
                                        </td>
                                        <td class="pad">&nbsp;</td>
                                        <td colspan="3" id="next" class="pad">&nbsp;</td>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <tr>
                                        <td colspan="2" class="pad">&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>14</td>
                                        <td>15</td>
                                        <td>16</td>
                                        <td>17</td>
                                        <td>18</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>21</td>
                                        <td>22</td>
                                        <td>23</td>
                                        <td>24</td>
                                        <td>25</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td>27</td>
                                        <td>28</td>
                                        <td>29</td>
                                        <td id="today">30</td>
                                        <td class="pad" colspan="3">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="archives-2" class="widget widget_archive">
                        <h3 class="widget_title">Archives</h3>
                        <ul>
                            <li><a href="http://demo.themeum.com/starter/?m=201402">February 2014</a>
                            </li>
                            <li><a href="http://demo.themeum.com/starter/?m=201401">January 2014</a>
                            </li>
                        </ul>
                    </div>
                    <div id="search-2" class="widget widget_search">
                        <form role="form" method="get" id="searchform" action="http://demo.themeum.com/starter/">
                            <input type="text" value="" name="s" id="s" class="form-control" placeholder="Search" autocomplete="off">
                        </form>
                    </div>
                </aside>
            </div>
        </div>
        <!-- #sidebar -->

    </div>
    <!-- .row -->
</section>

<?php get_footer(); ?>