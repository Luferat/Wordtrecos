<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php comment_form(); ?>

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number === '1') {
                printf(__('One comment', 'theme-text-domain'));
            } else {
                printf(
                    _nx(
                        '%1$s comentário',
                        '%1$s comentários',
                        $comments_number,
                        'comments title',
                        'theme-text-domain'
                    ),
                    number_format_i18n($comments_number)
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 42,
            ));
            ?>
        </ol>

        <?php
        the_comments_pagination(array(
            'prev_text' => __('Anterior', 'theme-text-domain'),
            'next_text' => __('Próximo', 'theme-text-domain'),
        ));
        ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Comentários fechados.', 'theme-text-domain'); ?></p>
    <?php endif; ?>

</div>
