<!--
    Exibe todos os posts do blog.
-->

<?php get_header() ?>

<main>
    <section>
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Obtém o número da página atual

        $args = array(
            'post_type' => 'post',
            'paged' => $paged
        );
        $recent_posts = new WP_Query($args);
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) :
                $recent_posts->the_post();
        ?>

                <div id="post-<?php echo get_the_ID() ?>">
                    <?php if (has_post_thumbnail())
                        the_post_thumbnail('thumbnail', ["alt" => get_the_title()]);
                    ?>

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>

                    <div>
                        Em <?php the_date() ?> por <?php the_author_posts_link() ?>.<br>
                        Categorias: <?php the_category(', ') ?>.
                    </div>

                    <?php the_excerpt() ?>

                </div>

        <?php
            endwhile;

            // Paginação
            the_posts_pagination(array(
                'prev_text' => 'Anterior',
                'next_text' => 'Próximo'
            ));

        endif;
        wp_reset_postdata();

        ?>
    </section>

    <aside>

        <h3>Categorias</h3>
        <ul>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) :
                $category_link = get_category_link($category->term_id);
                $post_count = $category->count;
            ?>
                <li>
                    <a href="<?php echo $category_link ?>"><?php echo $category->name ?></a>
                    <sup><?php echo $post_count ?></sup>
                </li>
            <?php
            endforeach;
            ?>
        </ul>

        <?php dynamic_sidebar('home_aside_1'); ?>

    </aside>
</main>

<?php get_footer() ?>