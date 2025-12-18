<?php get_header(); ?>

<div class="container">
    <h1 class="page-title">Nuestros Paquetes</h1>

    <?php if (have_posts()) : ?>
        <div class="paquetes-grid">
            <?php while (have_posts()) : the_post(); ?>
                <div class="paquete">
                    <div class="paquete-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                    <h2 class="paquete-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <div class="paquete-campos">
                        <p><strong>Tracking Number:</strong> <?php the_field('tracking_number'); ?></p>
                        <p><strong>Peso en libras:</strong> <?php the_field('peso_en_libras'); ?></p>
                        <p><strong>Valor declarado (USD):</strong> <?php the_field('valor_declarado_usd'); ?></p>
                        <p><strong>Estado del paquete:</strong> <?php the_field('estado_del_paquete'); ?></p>
                        <p><strong>Fecha de recepción:</strong> <?php the_field('fecha_de_recepcion'); ?></p>
                        <p><strong>Cliente:</strong> 
                            <?php 
                                $cliente = get_field('cliente'); 
                                if ($cliente) {
                                    echo esc_html(get_userdata($cliente)->display_name);
                                }
                            ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>No hay paquetes disponibles por el momento.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>