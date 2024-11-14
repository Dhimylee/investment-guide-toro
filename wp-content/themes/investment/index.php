<?php get_header(); ?>

<main>
    <section class="box-homepage">
        <div class="container">
            <div class="box-homepage__content">
                <h2 class="box-homepage__title">Últimas publicações</h2>

                <div class="box-news-list">
                    <?php
                        $args = array(
                            'posts_per_page' => 6,
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="box-news-list__highlight">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <div class="box-news-list__highlight-image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail( 'medium' ); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="box-news-list__highlight-content">
                                            <strong>
                                                <?php
                                                    $categories = get_the_category();
                                                    if ( ! empty( $categories ) ) : ?>
                                                        <span class="category"><?= $categories[0]->name ?></span>
                                                    <?php endif;
                                                ?>
                                            </strong>
                                            <h3><?php the_title(); ?></h3>
                                            <p><?php echo get_the_date(); ?></p>
                                            <a href="<?php the_permalink(); ?>">Leia mais</a>
                                        </div>
                                    </div>
                                
                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>
                </div>
            </div>

            <div class="box-homapge__button">
                <a href="#">Carregar mais</a>
            </div>
        </div>
    </section>
</main>