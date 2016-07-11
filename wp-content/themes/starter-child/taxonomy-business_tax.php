<?php
/*
 * Author: KhangLe
 *
 */
get_header();

$terms = get_the_terms(get_the_ID(), 'business_tax');
?>


<section id="main" class="container busi-tax">
    <div class="row page-content">

        <header class="page-header">
            <h1 class="page-title uline"><?php echo $terms[0]->name ?></h1>
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
                        'terms' => array($terms[0]->slug),
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

        <header class="page-header">
            <h2 class="page-title">產品照片</h2>
        </header>

        <div class="page-fullwdth-content">
            <div id="products" class="portfolio clearfix">
                <?php
                $paged = 1;
                if (get_query_var('paged'))
                    $paged = get_query_var('paged');
                if (get_query_var('page'))
                    $paged = get_query_var('page');

                $args = array(
                    'post_type' => 'product',
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'business_tax',
                            'field' => 'slug',
                            'terms' => array($terms[0]->slug),
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

        <div class="center-block clearfix more-products">
            <?php echo thm_pagination(); ?>
        </div>

        <div class="center-block clearfix more-products">
            <a class="btn btn-success btn-lg" href="<?php echo home_url('product') ?>">产品目录</a>
        </div>

    </div>
    <!-- .row -->
</section>

<?php get_footer(); ?>