<?php
defined( 'ABSPATH' ) || exit;

$current_user_id = get_current_user_id();

$args = array(
    'post_type'      => 'paquete',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
);

$paquetes_query = new WP_Query($args);
?>

<div class="woocommerce-MyAccount-content">
    <h2>Mis paquetes</h2>
    <p>Aquí verás los paquetes registrados en tu casillero virtual.</p>

    <div style="overflow-x:auto;">
    <?php
    $has_results = false;
    if ($paquetes_query->have_posts()): ?>
        <table style="width:100%; border-collapse: collapse; min-width: 800px;" border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Tracking Number</th>
                    <th>Peso (libras)</th>
                    <th>Valor declarado (USD)</th>
                    <th>Estado</th>
                    <th>Fecha de recepción</th>
                    <th>Registrado el</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($paquetes_query->have_posts()): $paquetes_query->the_post();
                    $cliente = get_field('cliente');
                    $cliente_id = null;

                    if (is_array($cliente) && isset($cliente['ID'])) {
                        $cliente_id = $cliente['ID'];
                    } elseif (is_object($cliente)) {
                        $cliente_id = $cliente->ID;
                    } elseif (is_numeric($cliente)) {
                        $cliente_id = $cliente;
                    }

                    if ((int) $cliente_id !== (int) $current_user_id) continue;

                    $has_results = true;
                ?>
                    <tr>
                        <td><?php the_title(); ?></td>
                        <td><?php the_field('tracking_number'); ?></td>
                        <td><?php the_field('peso_en_libras'); ?></td>
                        <td><?php the_field('valor_declarado_usd'); ?></td>
                        <td><?php the_field('estado_del_paquete'); ?></td>
                        <td><?php the_field('fecha_de_recepcion'); ?></td>
                        <td><?php echo get_the_date(); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    </div>

    <?php if (!$has_results): ?>
        <p>No se han registrado paquetes aún.</p>
    <?php endif; ?>
</div>
