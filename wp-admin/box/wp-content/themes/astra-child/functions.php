<?php
// Salida si se accede directamente
defined('ABSPATH') || exit;

/**
 * 1. Registrar el endpoint personalizado 'mis-paquetes'
 */
function orbix_agregar_endpoint_mis_paquetes() {
    add_rewrite_endpoint('mis-paquetes', EP_ROOT | EP_PAGES);
}
add_action('init', 'orbix_agregar_endpoint_mis_paquetes');

/**
 * 2. Agregar el enlace al menú de Mi Cuenta
 */
function orbix_agregar_link_mis_paquetes($items) {
    $items['mis-paquetes'] = 'Mis Paquetes';
    return $items;
}
add_filter('woocommerce_account_menu_items', 'orbix_agregar_link_mis_paquetes');

/**
 * 3. Mostrar la plantilla del endpoint
 */
function orbix_contenido_mis_paquetes() {
    $template_path = get_stylesheet_directory() . '/woocommerce/myaccount/mis-paquetes.php';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<p>Plantilla de paquetes no encontrada.</p>';
    }
}
add_action('woocommerce_account_mis-paquetes_endpoint', 'orbix_contenido_mis_paquetes');

/**
 * 4. Flush rewrite rules después de activar el tema
 */
function orbix_flush_rewrite_rules() {
    orbix_agregar_endpoint_mis_paquetes();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'orbix_flush_rewrite_rules');

/**
 * 5. Registrar Custom Post Type: Paquete
 */
function orbix_registrar_cpt_paquete() {
    $labels = array(
        'name'               => 'Paquetes',
        'singular_name'      => 'Paquete',
        'menu_name'          => 'Paquetes',
        'name_admin_bar'     => 'Paquete',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Nuevo paquete',
        'edit_item'          => 'Editar paquete',
        'view_item'          => 'Ver paquete',
        'all_items'          => 'Todos los paquetes',
        'search_items'       => 'Buscar paquete',
        'not_found'          => 'No se encontraron paquetes',
        'not_found_in_trash' => 'No se encontraron en la papelera',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'paquetes'),
        'show_in_rest'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-archive',
        'capability_type'    => 'post',
    );

    register_post_type('paquete', $args);
}
add_action('init', 'orbix_registrar_cpt_paquete');

/**
 * 6. Redirección después del login al panel personalizado
 */
function orbix_redireccion_login_personalizada($redirect_to, $request, $user) {
    if (isset($user->roles) && is_array($user->roles)) {
        // Aquí puedes personalizar por rol si deseas, por ahora redirige a una página general
        return home_url('/mi-cuenta/mis-paquetes/');
    }
    return $redirect_to;
}
add_filter('login_redirect', 'orbix_redireccion_login_personalizada', 10, 3);

/**
 * Redirigir al panel del usuario solo al iniciar sesión
 */
function orbix_redirigir_despues_login() {
    // Solo para usuarios logueados, no en admin y sin AJAX
    if (is_user_logged_in() && !is_admin() && !defined('DOING_AJAX')) {
        // Ruta actual
        $current_url = home_url(add_query_arg(array(), $GLOBALS['wp']->request));

        // Evitar redirección si ya estamos en /panel-del-usuario/
        if (strpos($current_url, '/panel-del-usuario') !== false) {
            return;
        }

        // Detectar si venimos del login
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referer = $_SERVER['HTTP_REFERER'];

            // Solo redirigir si venimos de wp-login.php o login de WooCommerce
            if (
                strpos($referer, 'wp-login.php') !== false ||
                strpos($referer, 'mi-cuenta') !== false ||
                strpos($referer, 'registro') !== false ||
                strpos($referer, 'login') !== false
            ) {
                wp_redirect(home_url('/panel-del-usuario/'));
                exit;
            }
        }
    }
}
add_action('template_redirect', 'orbix_redirigir_despues_login');

// Limpiar redirect_to al estar ya en panel-del-usuario
add_filter('login_redirect', 'oneorbix_custom_redirect_cleanup', 99, 3);
function oneorbix_custom_redirect_cleanup($redirect_to, $request, $user) {
    // Si ya estamos en /panel-del-usuario/, redirigimos limpio
    if (strpos($redirect_to, '/panel-del-usuario') !== false) {
        return home_url('/panel-del-usuario/');
    }
    return $redirect_to;
}

