<?php
echo "<h2 style='color:red;'>ESTOY USANDO single-paquete.php</h2>";
get_header();
?>

<div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>

    <div class="paquete">
        <div class="paquete-thumbnail">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('medium');
            } ?>
        </div>

        <div class="paquete-campos">
            <p><strong>Tracking Number:</strong> <?php the_field('tracking_number'); ?></p>
            <p><strong>Peso en libras:</strong> <?php the_field('peso_en_libras'); ?></p>
            <p><strong>Valor declarado (USD):</strong> <?php the_field('valor_declarado_usd'); ?></p>
            <p><strong>Estado del paquete:</strong> <?php the_field('estado_del_paquete'); ?></p>
            <p><strong>Fecha de recepción:</strong> <?php the_field('fecha_de_recepcion'); ?></p>
            <p><strong>Cliente:</strong>
                <?php
                $cliente = get_field('cliente');

                if ($cliente instanceof WP_User) {
                    echo esc_html($cliente->display_name);
                } elseif (is_numeric($cliente)) {
                    $user = get_user_by('ID', $cliente);
                    echo $user ? esc_html($user->display_name) : '<em>Usuario no encontrado</em>';
                } elseif (is_array($cliente) && isset($cliente['display_name'])) {
                    // En caso de retorno como array (puede pasar dependiendo de config ACF)
                    echo esc_html($cliente['display_name']);
                } else {
                    echo '<em>No asignado</em>';
                }
                ?>
            </p>
        </div>
    </div>
</div>

<?php get_footer(); ?>

