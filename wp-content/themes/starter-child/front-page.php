<?php get_header(); ?>

<div id="home" class="page-wrapper full-width light-bg">
    <div class="page-fullwdth-content">
        <?php echo do_shortcode('[themeum_slider]') ?>
    </div>
</div>

<section id="company" class="page-wrapper light-bg">
    <div class="container">
        <div class="row page-content">

            <?php
            $args = array(
                'post_type' => 'company',
                'posts_per_page' => 8,
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

<div id="news" class="page-wrapper full-width light-bg">
    <div class="title-area">
        <h2 class="title"><?php echo omw_get_news_setting('title') ?></h2>

        <p class="subtitle"><?php echo omw_get_news_setting('sub_title') ?></p>

    </div>
    <div class="page-fullwdth-content">
        <div id="recent-projects" class="portfolio clearfix">

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 8,
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <?php while ($loop->have_posts()): $loop->the_post(); ?>

                    <div class="col-xs-6 col-sm-3">
                        <div class="portfolio-item">
                            <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                            <div class="overlay">
                                <a class="btn-preview" href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata() ?>

        </div>
    </div>
</div>

<div id="business" class="page-wrapper full-width light-bg">
    <div class="title-area">
        <h2 class="title"><?php echo omw_get_projects_setting('title') ?></h2>

        <p class="subtitle"><?php echo omw_get_projects_setting('sub_title') ?></p>

    </div>
    <!-- .section-title -->
    <div class="page-fullwdth-content">
        <div id="recent-projects" class="portfolio clearfix">

            <?php
            $args = array(
                'post_type' => 'business',
                'posts_per_page' => 4,
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <?php while ($loop->have_posts()): $loop->the_post(); ?>

                    <div class="col-xs-6 col-sm-3">
                        <div class="portfolio-item">
                            <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                            <div class="overlay">
                                <a class="btn-preview" href="<?php echo get_field('link_to') ?>"><i class="fa fa-link"></i></a>
                                <a class="btn-preview" href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata() ?>

        </div>

    </div>
</div>

<section id="service-2" class="page-wrapper dark-bg">
    <div class="container">

        <div class="title-area">
            <h2 class="title"><?php echo omw_get_service_setting('title') ?></h2>

            <p class="subtitle"><?php echo omw_get_service_setting('sub_title') ?></p>

        </div>
        <!-- .section-title -->

        <div class="row page-content"><?php echo omw_get_service_setting('content') ?></div>
        <!-- .page-content -->
    </div>
    <!-- .container -->
</section>

<section id="team" class="page-wrapper light-bg">
    <div class="container">

        <div class="title-area">
            <h2 class="title"><?php echo omw_get_team_setting('title') ?></h2>

            <p class="subtitle"><?php echo omw_get_team_setting('sub_title') ?></p>

        </div>
        <!-- .section-title -->
        <div class="row page-content">
            <?php echo do_shortcode('[starter_team]') ?>
        </div>
    </div>
    <!-- .page-content -->
</div>
<!-- .container -->
</section>

<?php
get_footer();
