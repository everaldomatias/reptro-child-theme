<?php

$imep_options = get_option( 'imep_option_name' );
$token_pagsegurolightbox = $imep_options['token_pagsegurolightbox'];

if ( ! empty( $token_pagsegurolightbox ) ) : ?>

    <div class="form-pagseguro-checkout">
        <?php echo do_shortcode( '[contact-form-7 title="Checkout PagSeguro"]' ); ?>

        <!-- INICIO DO BOTAO PAGSEGURO -->
        <p class="d-none">
            <a id="pagseguro-link" href="javascript:void(0)" onclick="PagSeguroLightbox( '<?php echo $token_pagsegurolightbox; ?>' ); return false;">
                <img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/205x30-pagar.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
            </a>
            <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
        </p>
        <!-- FIM DO BOTAO PAGSEGURO -->
    </div><!-- /.form-pagseguro-checkout -->

<?php endif; ?>