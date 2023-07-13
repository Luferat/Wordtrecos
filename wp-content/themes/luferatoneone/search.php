<?php
get_header();
$post_count = $wp_query->found_posts;
?>

<main>

    <section>

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h2 class="page-title">
                    <?php echo $post_count ?>
                    Resultados da busca por
                    "<?php echo get_search_query() ?>":
                </h2>
            </header>

            <?php while (have_posts()) :
                the_post(); ?>

                <?php if (has_post_thumbnail())
                    the_post_thumbnail('thumbnail', ["alt" => get_the_title()]);
                ?>

                <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>

                <div>
                    Em <?php the_date() ?> por <?php the_author_posts_link() ?>.<br>
                    Categorias: <?php the_category(', ') ?>.
                </div>

                <div>
                    <?php the_excerpt() ?>
                </div>
            <?php endwhile;

            // Paginação
            the_posts_pagination(array(
                'prev_text' => 'Anterior',
                'next_text' => 'Próximo'
            ));

        else : ?>

            <h2>Nenhum resultado encontrado</h2>

            <p>Desculpe, não encontramos nenhum resultado para a sua busca. Tente novamente.</p>

        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>