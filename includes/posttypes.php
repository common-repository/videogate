<?php
function videogate_register_post_type() {
		$args = array(
			'labels' => array(
				'name' => __('VideoGate Videos', 'videogate'),
				'singular_name' => __('Video', 'videogate'),
				'add_new' => __('New Video', 'videogate'),
				'add_new_item' => __('Add New', 'videogate'),
				'edit_item' => __('Edit', 'videogate'),
				'new_item' => __('New', 'videogate'),
				'view_item' => __('View', 'videogate'),
				'search_items' => __('Search', 'videogate'),
				'not_found' =>  __('No Videos found', 'videogate'),
				'not_found_in_trash' => __('No Videos found in trash', 'videogate')
			),
			'has_archive' => true,
			'description' => __('VideoGate Videos', 'videogate'),
			'public' => true,
			'exclude_from_search' => false,
			'supports' => array('title', 'thumbnail', 'author', 'excerpt', 'editor', 'comments'),
			'menu_icon' => 'dashicons-video-alt2',
		);
		register_post_type(VIDEOGATE_POST_TYPE, $args);
		
		register_taxonomy(VIDEOGATE_CATEGORIES_TAX, VIDEOGATE_POST_TYPE, array(
				'hierarchical' => true,
				'has_archive' => true,
				'labels' => array(
					'name' =>  __('Categories', 'videogate'),
					'menu_name' =>  __('Categories', 'videogate'),
					'singular_name' => __('Category', 'videogate'),
					'add_new_item' => __('Create', 'videogate'),
					'new_item_name' => __('Add New', 'videogate'),
					'edit_item' => __('Edit', 'videogate'),
					'view_item' => __('View', 'videogate'),
					'update_item' => __('Update', 'videogate'),
					'search_items' => __('Search', 'videogate'),
				),
			)
		);
		register_taxonomy(VIDEOGATE_TYPES_TAX, VIDEOGATE_POST_TYPE, array(
				'hierarchical' => true,
				'has_archive' => true,
				'labels' => array(
					'name' =>  __('Types', 'videogate'),
					'menu_name' =>  __('Types', 'videogate'),
					'singular_name' => __('Type', 'videogate'),
					'add_new_item' => __('Create', 'videogate'),
					'new_item_name' => __('Add New', 'videogate'),
					'edit_item' => __('Edit', 'videogate'),
					'view_item' => __('View', 'videogate'),
					'update_item' => __('Update', 'videogate'),
					'search_items' => __('Search', 'videogate'),
				),
			)
		);
		register_taxonomy(VIDEOGATE_CAST_TAX, VIDEOGATE_POST_TYPE, array(
				'hierarchical' => true,
				'has_archive' => true,
				'labels' => array(
					'name' =>  __('Cast', 'videogate'),
					'menu_name' =>  __('Cast', 'videogate'),
					'singular_name' => __('Cast', 'videogate'),
					'add_new_item' => __('Create', 'videogate'),
					'new_item_name' => __('Add New', 'videogate'),
					'edit_item' => __('Edit', 'videogate'),
					'view_item' => __('View', 'videogate'),
					'update_item' => __('Update', 'videogate'),
					'search_items' => __('Search', 'videogate'),
				),
			)
		);
		register_taxonomy(VIDEOGATE_GENRES_TAX, VIDEOGATE_POST_TYPE, array(
				'hierarchical' => true,
				'has_archive' => true,
				'labels' => array(
					'name' =>  __('Genres', 'videogate'),
					'menu_name' =>  __('Genres', 'videogate'),
					'singular_name' => __('Genres', 'videogate'),
					'add_new_item' => __('Create', 'videogate'),
					'new_item_name' => __('Add New', 'videogate'),
					'edit_item' => __('Edit', 'videogate'),
					'view_item' => __('View', 'videogate'),
					'update_item' => __('Update', 'videogate'),
					'search_items' => __('Search', 'videogate'),
				),
			)
		);
		register_taxonomy(VIDEOGATE_AGE_TAX, VIDEOGATE_POST_TYPE, array(
				'hierarchical' => true,
				'has_archive' => true,
				'labels' => array(
					'name' =>  __('Age', 'videogate'),
					'menu_name' =>  __('Age', 'videogate'),
					'singular_name' => __('Age', 'videogate'),
					'add_new_item' => __('Create', 'videogate'),
					'new_item_name' => __('Add New', 'videogate'),
					'edit_item' => __('Edit', 'videogate'),
					'view_item' => __('View', 'videogate'),
					'update_item' => __('Update', 'videogate'),
					'search_items' => __('Search', 'videogate'),
				),
			)
		);
		register_taxonomy(VIDEOGATE_QUALITY_TAX, VIDEOGATE_POST_TYPE, array(
				'hierarchical' => true,
				'has_archive' => true,
				'labels' => array(
					'name' =>  __('Quality', 'videogate'),
					'menu_name' =>  __('Quality', 'videogate'),
					'singular_name' => __('Quality', 'videogate'),
					'add_new_item' => __('Create', 'videogate'),
					'new_item_name' => __('Add New', 'videogate'),
					'edit_item' => __('Edit', 'videogate'),
					'view_item' => __('View', 'videogate'),
					'update_item' => __('Update', 'videogate'),
					'search_items' => __('Search', 'videogate'),
				),
			)
		);
		register_taxonomy(VIDEOGATE_TAGS_TAX, VIDEOGATE_POST_TYPE, array(
				'hierarchical' => false,
				'labels' => array(
					'name' =>  __('Video Tags', 'videogate'),
					'menu_name' =>  __('Video Tags', 'videogate'),
					'singular_name' => __('Tag', 'videogate'),
					'add_new_item' => __('Create Tag', 'videogate'),
					'new_item_name' => __('New Tag', 'videogate'),
					'edit_item' => __('Edit Tag', 'videogate'),
					'view_item' => __('View Tag', 'videogate'),
					'update_item' => __('Update Tag', 'videogate'),
					'search_items' => __('Search Tags', 'videogate'),
				),
			)
		);
}


