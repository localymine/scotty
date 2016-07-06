<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<section id="main" class="container">
    <div class="row">
        <div id="content" class="site-content col-md-8" role="main">

            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 2,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'business_tax',
                        'field' => 'slug',
                        'terms' => array(get_query_var('term')),
                    ),
                ),
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
                                    <i class="fa fa-bookmark-o"></i>
                                </h4>
                                <h6 class="publish-date">
                                    <time class="entry-date" datetime="<?php echo get_the_date('M, d Y h:i:s T') ?>"><?php echo get_the_date('M, d Y') ?></time>
                                </h6>
                            </div>
                            <div class="media-body">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a>
                                </h2>

                                <!--/.entry-meta -->
                                <div class="entry-summary">
                                    <p><?php the_excerpt() ?></p>
                                    <!--<p>-->
                                        <!--<a class="btn btn-success btn-lg" href="<?php the_permalink() ?>">Continue Reading →</a>-->
                                    <!--</p>-->
                                </div>
                                <!-- //.entry-summary -->
                            </div>
                        </div>


                    </article>
                    <!--/#post -->
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata() ?>

            <?php echo thm_pagination(); ?>

        </div>
        <!-- #content -->

        <?php get_sidebar('product') ?>
        <!-- #sidebar -->

    </div>
    <!-- .row -->
</section>

<?php get_footer(); ?>