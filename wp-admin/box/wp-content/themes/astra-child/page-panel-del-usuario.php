<?php
/* Template Name: Panel de Usuario Personalizado */

if (!is_user_logged_in()) {
    wp_redirect(home_url('/mi-cuenta'));
    exit;
}

get_header();

$current_user = wp_get_current_user();
$user_id = get_current_user_id();
$pais = get_user_meta($user_id, 'billing_country', true);
$codigo_pais = strtoupper(substr($pais, 0, 2));
$codigo_casillero = 'ORB' . str_pad($user_id, 3, '0', STR_PAD_LEFT);
$direccion = '1234 NW 78th Ave, Doral, FL 33126, USA';

// Guardar automáticamente el código de casillero si aún no existe o ha cambiado
$codigo_actual = get_user_meta($user_id, 'codigo_casillero', true);
if ($codigo_actual !== $codigo_casillero) {
    update_user_meta($user_id, 'codigo_casillero', $codigo_casillero);
}
?>
<div class="panel-usuario-box" style="padding: 20px; background-color: #fff; border-radius: 8px; max-width: 800px; margin: auto;">

    <h2 style="margin-bottom: 10px;">🎉 Bienvenido, <?php echo esc_html($current_user->display_name); ?></h2>

    <hr style="margin: 20px 0;">

    <h3>📦 Mi Casillero</h3>
    <p><strong>Nombre:</strong> <?php echo esc_html($current_user->first_name . ' ' . $current_user->last_name); ?></p>
    <p><strong>Código de casillero:</strong> <?php echo esc_html($codigo_casillero); ?></p>
    <p><strong>Dirección:</strong> <?php echo esc_html($direccion); ?></p>
    <p><strong>País de residencia:</strong> <?php echo esc_html($pais ? $pais : 'UN'); ?></p>

    <hr style="margin: 20px 0;">

    <h3>🧾 Mis Pedidos y Facturas</h3>
    <ul>
        <li><a href="<?php echo esc_url( wc_get_account_endpoint_url('orders') ); ?>">🛒 Pedidos</a></li>
        <li><a href="<?php echo esc_url( wc_get_account_endpoint_url('downloads') ); ?>">📥 Descargas</a></li>
        <li><a href="<?php echo esc_url( wc_get_account_endpoint_url('edit-address') ); ?>">🏠 Direcciones</a></li>
        <li><a href="<?php echo esc_url( wc_get_account_endpoint_url('edit-account') ); ?>">🔧 Detalles de la cuenta</a></li>
       <li><a href="<?php echo site_url('/mi-cuenta/mis-paquetes/'); ?>">📦 Mis Paquetes</a></li>

    </ul>

    <hr style="margin: 20px 0;">

    <h3>🚪 Opciones</h3>
    <ul>
        <li><a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">❌ Cerrar sesión</a></li>
    </ul>
</div>
<?php get_footer(); ?>
