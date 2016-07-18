<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<section id="main" class="container">
    <div class="row page-content">
        <div id="content" class="site-content col-md-12" role="main">
            <?php
            $terms = get_terms(array('product-line'));
            $l_uncategorized = NULL;
            
            foreach ($terms as $term):
                $l_uncategorized[] = $term->slug;
                ?>

                <h2><?php echo $term->name ?></h2>

                <div class="page-fullwdth-content">
                    <div class="portfolio clearfix">

                        <?php
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product-line',
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

            <?php endforeach; ?>
                

            <h2>未分类</h2>

            <div class="page-fullwdth-content">
                <div class="portfolio clearfix">

                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product-line',
                                'field' => 'slug',
                                'terms' => $l_uncategorized,
                                'operator' => 'NOT IN',
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
    </div>
</section>

<?php get_footer(); ?>