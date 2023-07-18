<?php

add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
));

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

/**
 * Registrando slots de widgets.
 *
 */
function arphabet_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Home aside 1',
        'id'            => 'home_aside_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'arphabet_widgets_init');

/**
 * Exibe os comentários válidos mais recentes.
 */
function view_recent_comments($num_comments = 5)
{
    $args = array(
        'number'       => $num_comments, // Número de comentários a exibir
        'status'       => 'approve', // Apenas comentários aprovados
        'post_status'  => 'publish', // Apenas postagens publicadas
        'type'         => 'comment', // Apenas comentários (exclui pingbacks e trackbacks)
        'orderby'      => 'comment_date', // Ordenar por data do comentário
        'order'        => 'DESC', // Ordem decrescente (do mais recente para o mais antigo)
        'post_type'    => 'any', // Qualquer tipo de postagem
    );

    $comments = get_comments($args);

    foreach ($comments as $comment) {
        $comment_post_id = $comment->comment_post_ID;
        $comment_permalink = get_permalink($comment_post_id);
        $comment_content = $comment->comment_content;

        if (strlen($comment_content) > 100) {
            $comment_content = substr($comment_content, 0, 100) . '...';
        }

        // echo '<p><a href="' . $comment_permalink . '">' . get_comment_author($comment->comment_ID) . ' disse: ' . $comment_content . '</a></p>';
        echo '<p><a href="' . $comment_permalink . '">' . $comment_content . '</a></p>';
    }
}
