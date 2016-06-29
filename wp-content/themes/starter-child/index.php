<?php get_header(); ?>

<div id="page" class="hfeed site">

    <div id="home-3" class="page-wrapper full-width light-bg">
        <div class="page-fullwdth-content">
            <?php echo do_shortcode('[themeum_slider]') ?>
        </div>
    </div>

    <section id="about-us" class="page-wrapper light-bg" style="background-color:#ffffff">
        <div class="container">
            <div class="row page-content">

                <?php
                $args = array(
                    'post_type' => 'company',
                    'posts_per_page' => -1,
                );
                $loop = new WP_Query($args);
                ?>
                <?php if ($loop->have_posts()): ?>
                    <?php while ($loop->have_posts()): $loop->the_post(); ?>
                        <?php
                        $bg_color = 'background:' . get_field('bg_color') . ';';
                        $style = 'style="' . $bg_color . '"';
                        ?>
                        <div class="feature-box col-md-4 col-sm-6 col-xs-12">
                            <div class="feature-box-1 pull-left">
                                <span <?php echo $style ?>>
                                    <i class="fa <?php echo get_field('icon') ?> icon-custom-style"></i>
                                </span>
                            </div>
                            <div class="feature-box-2">
                                <h3><?php the_title() ?></h3>
                                <p><?php the_content() ?></p>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata() ?>

            </div>
        </div>
    </section>

    
    <div id="news" class="page-wrapper full-width light-bg" style="background-color:#f5f5f5">
        <div class="title-area">
            <h2 class="title">Our Portfolio </h2>

            <p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>

        </div>
        <!-- .section-title -->
        <div class="page-fullwdth-content">
            <div id="recent-projects" class="portfolio clearfix">
                <div class="col-xs-6 col-sm-3">
                    <div class="portfolio-item"><img class="img-responsive" src="http://demo.themeum.com/starter/wp-content/uploads/2014/02/portfolio-04.jpg" title="" alt="">
                        <div class="overlay"><a class="btn-preview" data-rel="prettyPhoto" href="http://demo.themeum.com/starter/wp-content/uploads/2014/02/portfolio-04.jpg"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    
    <div id="projects" class="page-wrapper full-width light-bg" style="background-color:#f5f5f5">
        <div class="title-area">
            <h2 class="title">Our Portfolio </h2>

            <p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>

        </div>
        <!-- .section-title -->
        <div class="page-fullwdth-content">
            <div id="recent-projects" class="portfolio clearfix">
                <div class="col-xs-6 col-sm-3">
                    <div class="portfolio-item"><img class="img-responsive" src="http://demo.themeum.com/starter/wp-content/uploads/2014/02/portfolio-04.jpg" title="" alt="">
                        <div class="overlay"><a class="btn-preview" data-rel="prettyPhoto" href="http://demo.themeum.com/starter/wp-content/uploads/2014/02/portfolio-04.jpg"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</div>


<section id="main" class="container">
    <div class="row">
        <div id="content" class="site-content col-md-8" role="main">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('post-format/content', get_post_format()); ?>
                <?php endwhile; ?>

                <?php echo thm_pagination(); ?>

            <?php else: ?>
                <?php get_template_part('post-format/content', 'none'); ?>
            <?php endif; ?>

        </div> <!-- #content -->

        <div id="sidebar" class="col-md-4" role="complementary">
            <div class="sidebar-inner">
                <aside class="widget-area">
                    <?php dynamic_sidebar('sidebar'); ?>
                </aside>
            </div>
        </div> <!-- #sidebar -->

    </div> <!-- .row -->
</section> <!-- .container -->

<?php
get_footer();
