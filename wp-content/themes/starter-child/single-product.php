<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section id="main" class="container">
            <div class="row">
                <div id="content" class="site-content col-md-8" role="main">

                    <article id="post-<?php the_ID() ?>" class="post-<?php the_ID() ?> post type-post status-publish format-gallery hentry category-uncategorized post_format-post-format-gallery">
                        <header class="entry-header">

                            <div id="blog-gallery-slider" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">

                                    <?php $n_i = 0; ?>
                                    <?php if (have_rows('catalog')): ?>
                                        <?php while (have_rows('catalog')): the_row(); ?>

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

                            <h2 class="entry-title">
                                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="date"><i class="fa fa-clock-o"></i>
                                        <time class="entry-date" datetime="<?php echo get_the_date('M, d Y h:i:s T') ?>"><?php echo get_the_date('M, d Y') ?></time>
                                    </li>

                                </ul>
                            </div>
                            <!--/.entry-meta -->

                        </header>
                        <!--/.entry-header -->

                        <div class="entry-content">
                            <?php the_content() ?>
                        </div>
                        <!--/.entry-content -->

                    </article>
                    <!--/#post -->

                </div>
                <!-- #content -->
            <?php endwhile; ?>
        <?php endif; ?>

        <?php get_sidebar('product') ?>
                
    </div>
    <!-- .row -->
</section>

<?php get_footer(); ?>