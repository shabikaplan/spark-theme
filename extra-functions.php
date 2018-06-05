/*Create Products Post Type*/

function register_spark_cpts() {

	/**
	 * Post Type: Packages.
	 */

	$labels = array(
		"name" => __( 'Products', 'spark' ),
		"singular_name" => __( 'Products', 'spark' ),
		"add_new_item" => __('Add New Product', 'spark'),
		"edit_item" => __('Edit Product', 'spark'),
		"view_item" => __('View Product', 'spark'),
		"view_items" => __('View Products', 'spark'),

	);

	$args = array(
		"label" => __( 'Products', 'spark' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "products", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-products",
		"taxonomies" => array( "category" ),
	);

	register_post_type( "products", $args );
	


}

add_action( 'init', 'register_spark_cpts' );