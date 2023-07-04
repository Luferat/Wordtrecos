<?php get_header(); ?>

<main id="content">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <article class="post">
                <h2 class="post-title">
                    <?php the_title(); ?>
                </h2>
                <div class="post-meta">
                    <?php the_date(); ?> |
                    <?php the_author(); ?>
                </div>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>