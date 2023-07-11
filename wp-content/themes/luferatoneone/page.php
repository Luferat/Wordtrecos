<?php get_header(); ?>

<main>
    <section>
        <?php while (have_posts()) : the_post(); ?>

            <h2><?php the_title() ?></h2>
            <div>Em <?php the_date() ?>.</div>
            <div><?php the_content() ?></div>

        <?php endwhile; ?>

    </section>

    <aside>

    </aside>
</main>

<?php get_footer(); ?>