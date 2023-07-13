<!--
    Exibe todos os posts da categoria.
-->

<?php
get_header();
$category = get_queried_object();
$category_id = get_queried_object_id();
$post_count = get_term($category_id)->count;
?>

<main>

    <section>

        <h2><?php echo $post_count ?> Posts em "<?php single_cat_title() ?>"</h2>
        <p><?php the_archive_description() ?></p>

        <?php if (have_posts()) {
            while (have_posts()) :
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
        } ?>

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

    </aside>

</main>

<?php get_footer() ?>