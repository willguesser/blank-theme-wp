<?php
/*--------------------------------------------------------------
	INSERE THUMBNAIL EM COLUNAS DE ADMIN
--------------------------------------------------------------*/
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['btwp_post_thumbs'] = __('Thumb');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
        if($column_name === 'btwp_post_thumbs'){
		echo the_post_thumbnail( array(150,100) );
    }
}

/*--------------------------------------------------------------
	CRIA COLUNA PARA IDs
--------------------------------------------------------------*/
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_filter('manage_pages_columns', 'posts_columns_id', 5);

function posts_columns_id($defaults){
	$defaults['btwp_post_id'] = __('ID');
	return $defaults;
}


/*--------------------------------------------------------------
	INSERE IDs DE POSTAGENS E PÁGINAS
--------------------------------------------------------------*/
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);

function posts_custom_id_columns($column_name, $id){
	if($column_name === 'btwp_post_id'){
		echo $id;
    }
}
