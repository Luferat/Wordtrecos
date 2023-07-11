<!-- Formulário de busca personalizado -->
<form action="/" method="get">
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Procurar..." />
    <button type="submit">🔎</button>
</form>