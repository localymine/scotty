<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<div class="banner">
    <div id="header-image">
        <div class="">
            <h1> We go to our limits, <br>so that you can go beyond yours</h1>
        </div>
    </div>
</div>

<section id="main" class="container">
    <div class="row page-content">

        <header class="page-header">
            <h1 class="page-title">經營項目</h1>
        </header> <!-- .page-header -->

        <?php echo do_shortcode('[omw_load_business no_title=TRUE]') ?>

    </div>

    <?php
    $terms = get_terms('business_tax');
    ?>

    <?php foreach ($terms as $term): ?>

        <div id="<?php echo $term->slug ?>" class="row page-content">

            <header class="page-header">
                <h1 class="page-title uline"><?php echo $term->name ?></h1>
            </header> <!-- .page-header -->

            <div id="content" class="site-content col-md-12" role="main">
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
                        <?php the_content() ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata() ?>
            </div>

            <div class="page-fullwdth-content">
                <div id="products" class="portfolio clearfix">
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

        </div>
    <?php endforeach; ?>
    <!-- .row -->
</section>



<?php get_footer(); ?>