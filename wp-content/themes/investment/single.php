<?php get_header(); ?>

<main>
    <section class="single-post">
        <div class="container">
            <div class="single-post__wrapper">
                <div class="single-post__column-1">
                    <?php if (have_posts()) :
                        while (have_posts()) : the_post();
                            ?>
                            <article class="single-post__article">
                                <strong class="single-post__category">
                                    <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) : ?>
                                            <span class="category"><?= $categories[0]->name ?></span>
                                        <?php endif;
                                    ?>
                                </strong>
                                <h1 class="single-post__title"><?php the_title(); ?></h1>
                                <div class="single-post__post-data">
                                    <span class="single-post__author single-post--flex"><img width="20px" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/user.svg" alt=""><?php echo get_the_author(); ?></span>
                                    <time class="single-post__time single-post--flex"><img width="20px" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/calendar.svg" alt="">Atualizado: <?php echo get_the_modified_date('d/m/Y'); ?> às <?php echo get_the_modified_time('H:i'); ?></time>
                                </div>
                                <div class="single-post__content">
                                    <?php the_content(); ?>
                                </div>
                            </article>
                        <?php endwhile;
                    endif; ?>
                </div>

                <div class="single-post__column-2">
                    <aside class="single-post__aside">
                        <h3>Leia também</h3>
                        <?php
                        $categories = wp_get_post_categories(get_the_ID());
                        $related_posts = new WP_Query(array(
                            'category__in' => $categories,
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 5,
                        ));

                        if ($related_posts->have_posts()) :
                            while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <span class="link-content"><?php the_title(); ?></span>
                                    <img class="arrow-icon" width="35px" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/arrow.svg" alt="">
                                </a>
                            <?php endwhile;
                        endif;
                        ?>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</main>
