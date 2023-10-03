<!-- 
  index.php
  Exibe todos os posts do blog. 
-->

<?php get_header() ?>

<main>
    <section>
        <?php
        // Obtém o número da página atual.
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 

        // Obtém os posts mais recentes e paginados.
        $recent_posts = new WP_Query(['post_type' => 'post', 'paged' => $paged]);

        // Se existem posts.
        if ($recent_posts->have_posts()) :

            // Loop dos posts.
            while ($recent_posts->have_posts()) :
                $recent_posts->the_post();
        ?>

                <div id="post-<?php echo get_the_ID() ?>">
                    <?php if (has_post_thumbnail())
                        // Se o post tem thumbnail, exibe-a.
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
            the_posts_pagination(['prev_text' => 'Anterior', 'next_text' => 'Próximo']);

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

        <h3>Comentários</h3>
        <?php view_recent_comments(5) ?>

        <?php if (function_exists('wpp_get_mostpopular')) : ?>
            <h3>Mais Populares</h3>
            <ul>
                <?php wpp_get_mostpopular('limit=5&post_type=post&range=all&order_by=views&thumbnail_width=100&thumbnail_height=100&stats_comments=0&stats_views=1&stats_author=0&stats_date=0&post_html=<li>{thumb} <a href="{url}">{text_title}</a></li>'); ?>
            </ul>
        <?php endif; ?>

        <?php dynamic_sidebar('home_aside_1'); ?>

    </aside>
</main>

<?php get_footer() ?>
