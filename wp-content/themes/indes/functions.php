<?php

function init_template() 
{
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag');

    register_nav_menus(
        array(
            'top_menu' => 'Menu Principal'
        )
    );
}

add_action('after_setup_theme', 'init_template');

function assets() 
{
    wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css','','5.3.0','all');
    wp_register_style('fonts','https://fonts.googleapis.com/css2?family=Roboto&family=Rubik:wght@400;700&family=Yantramanav:wght@300;400&display=swap','','1.0','all');

    wp_enqueue_style('estilos',get_stylesheet_uri(), array('bootstrap','fonts'),'1.0','all');
    
    wp_enqueue_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', '', '4.6.2', true);

    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', '', '1.0', true);
}

add_action('wp_enqueue_scripts', 'assets');

function sidebar()
{
    register_sidebar(
        array(
            'name' => 'Pie de pagina',
            'id' => 'footer',
            'description' => 'Zona de Widgets para pie de pagina',
            'before_title' => '<p>',
            'after_title' => '</p>',
            'before_widget' => '<div id="%1$s" class= "%2$s">',
            'after_widget'  => '</div>',
        )    
    );
}

add_action('widgets_init', 'sidebar');

function projects_type()
{
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'manu_name' => 'Projects',
    );

    $args = array(
        'label' => 'Projects',
        'description' => 'Proyectos de Indes Estructuras',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
        'public' => true,
        'show_in_menu' => true,
        'menu_positions' => 5,
        'menu_icon' => 'dashicons-media-interactive',
        'can_export' => true,
        'public-queryable' => true,
        'rewrite' => true,
        'show_in_rest' => true,
    );

    register_post_type('project', $args);
}

add_action('init', 'projects_type');