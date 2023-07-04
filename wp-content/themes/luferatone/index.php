<?php get_header(); ?>

<main id="content">
    <section id="recent-posts">
        <h2>Postagens Recentes</h2>
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5
        );
        $recent_posts = new WP_Query($args);

        if ($recent_posts->have_posts()):
            while ($recent_posts->have_posts()):
                $recent_posts->the_post();
                ?>
                <article class="post">
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="post-meta">
                        <?php the_date(); ?> |
                        <?php the_author(); ?>
                    </div>
                    <div class="post-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </section>

    <aside id="sidebar">
        <h3>Categorias</h3>
        <ul>
            <?php
            $categories = get_categories();

            foreach ($categories as $category) {
                $category_link = get_category_link($category->term_id);
                $post_count = $category->count;
                echo '<li><a href="' . $category_link . '">' . $category->name . '</a><sup>' . $post_count . '</sup></li>';
            }
            ?>
        </ul>
    </aside>

</main>

<?php get_footer(); ?>