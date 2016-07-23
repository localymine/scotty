<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<div id="top" name="top" class="banner business_header">
    <div id="header-image">
        <div class="">
            <h1> <?php echo wpautop(omw_get_business('slogan'), true) ?></h1>
        </div>
    </div>
</div>

<section id="main" class="container-fluid business">

    <?php if (!omw_get_business('hide_block')): ?>
        <div class="row page-content">
            <header class="page-header">
                <h1 class="page-title">經營項目</h1>
                <?php echo do_shortcode('[omw_load_business set_title=no set_bookmark=yes]'); ?>
            </header> <!-- .page-header -->
        </div>
    <?php endif; ?>


    <?php
    $terms = get_terms($args = array('taxonomy' => 'business_tax', 'orderby' => 'ID'));
    ?>

    <?php foreach ($terms as $term): ?>

        <div id="<?php echo $term->slug ?>" class="row page-content">

            <header class="page-header" name="<?php echo $term->slug ?>">
                <h1 class="page-title uline"><?php echo $term->name ?></h1>
            </header> <!-- .page-header -->


            <?php
            $args = array(
                'post_type' => 'business',
                'posts_per_page' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'business_tax',
                        'field' => 'slug',
                        'terms' => array($term->slug),
                    ),
                ),
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <div id="content" class="site-content col-md-12" role="main">
                    <?php while ($loop->have_posts()): $loop->the_post(); ?>
                        <?php the_content() ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata() ?>

            <div class="site-content clearfix">
                <?php
                $args = array(
                    'post_type' => 'business',
                    'posts_per_page' => 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'business_tax',
                            'field' => 'slug',
                            'terms' => array($term->slug),
                        ),
                    ),
                );
                $loop = new WP_Query($args);
                ?>
                <?php if ($loop->have_posts()): ?>
                    <?php while ($loop->have_posts()): $loop->the_post(); ?>

                        <?php
                        switch (get_field('number_of_column')) :
                            case 'one':
                                if (have_rows('one_column')):
                                    while (have_rows('one_column')) : the_row();
                                        ?>

                                        <div class="col-md-12" role="content">
                                            <?php the_sub_field('col_1') ?>
                                        </div>

                                        <?php
                                    endwhile;
                                endif;
                                break;
                            case 'two':
                                if (have_rows('two_columns')):
                                    while (have_rows('two_columns')) : the_row();
                                        ?>

                                        <div class="col-md-6" role="content">
                                            <?php the_sub_field('col_1') ?>
                                        </div>
                                        <div class="col-md-6" role="content">
                                            <?php the_sub_field('col_2') ?>
                                        </div>

                                        <?php
                                    endwhile;
                                endif;
                                break;
                            case 'three':
                                if (have_rows('three_columns')):
                                    while (have_rows('three_columns')) : the_row();
                                        ?>

                                        <div class="col-md-4" role="content">
                                            <?php the_sub_field('col_1') ?>
                                        </div>
                                        <div class="col-md-4" role="content">
                                            <?php the_sub_field('col_2') ?>
                                        </div>
                                        <div class="col-md-4" role="content">
                                            <?php the_sub_field('col_3') ?>
                                        </div>

                                        <?php
                                    endwhile;
                                endif;
                                break;
                                ?>

                        <?php endswitch; ?>

                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata() ?>
            </div>
        </div>

        <div id="products" class="row-fluid">
            <div class="bu-prod portfolio clearfix">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'business_tax',
                            'field' => 'slug',
                            'terms' => array($term->slug),
                        ),
                    ),
                );
                $loop = new WP_Query($args);
                ?>
                <?php if ($loop->have_posts()): ?>
                    <?php while ($loop->have_posts()): $loop->the_post(); ?>
                        <div class="col-xs-6 col-sm-3">
                            <div class="portfolio-item">
                                <?php the_post_thumbnail('large', array('class' => 'img-responsive w250')); ?>
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
        <div class="container">
            <a href="#top" class="goto"><i class="fa fa-arrow-circle-up"></i></a>
        </div>

    <?php endforeach; ?>
    <!-- .row -->
</section>

<div class="container margin-top-xl margin-bottom-xl">
    <div class="row">
        <div class="col-md-12 center-block text-center clearfix">
            <a class="btn btn-success btn-lg" href="<?php echo home_url('product') ?>">产品目录</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>