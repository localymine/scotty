<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<div id="top" name="top" class="banner team_header">
    <div id="header-image">
        <div class="">
            <h1> <?php echo wpautop(omw_get_team('slogan'), true) ?></h1>
        </div>
    </div>
</div>

<section id="main" class="container">

    <div class="row page-content">
        <header class="page-header">
            <h1 class="page-title">Our Teams</h1>
        </header> <!-- .page-header -->
    </div>


    <div class="row">

        <?php
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => -1,
        );
        $loop = new WP_Query($args);
        ?>

        <?php if ($loop->have_posts()): ?>
            <?php while ($loop->have_posts()): $loop->the_post(); ?>
                <div class="col-md-3 col-xs-6 col-sm-3">
                    <div class="team-item">
                        <?php $image = get_the_post_thumbnail($post->ID, 'large', array('class' => 'img-responsive')); ?>
                        <?php echo $image ?>
                        <a class="text-center" href="javascript:void(0)"><h2><?php the_title() ?></h2></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata() ?>

    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="#top" class="goto pull-right"><i class="fa fa-arrow-circle-up fa-3x"></i></a>
        </div>
    </div>

    <!-- .row -->
</section>


<?php get_footer(); ?>