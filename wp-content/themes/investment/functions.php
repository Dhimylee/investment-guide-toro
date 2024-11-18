<?php
//Carregamento de scripts e estilos
function investment_scripts() {
    wp_enqueue_style( 'investment-styles', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all' );
    wp_enqueue_script( 'investment-scripts', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'investment_scripts' );

//Função para imagem destacada
function tema_adicionar_imagem_destacada() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'tema_adicionar_imagem_destacada');

//CPT Investimentos
function registrar_cpt_investimentos() {
    $args = [
        'labels' => ['name' => 'Investimentos', 'singular_name' => 'Investimento'],
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-chart-line',
    ];
    register_post_type('investimentos', $args);
}
add_action('init', 'registrar_cpt_investimentos');

// Campos para o CPT
function renderizar_meta_box_investimentos($post) {

    $categoria = get_post_meta($post->ID, '_categoria', true);
    $tipo_rentabilidade = get_post_meta($post->ID, '_tipo_rentabilidade', true);
    $risco = get_post_meta($post->ID, '_risco', true);
    $rentabilidade = get_post_meta($post->ID, '_rentabilidade', true);
    $aplicacao_minima = get_post_meta($post->ID, '_aplicacao_minima', true);
    $data_vencimento = get_post_meta($post->ID, '_data_vencimento', true);
    $link_cta = get_post_meta($post->ID, '_link_cta', true);

    ?>
    <p>
        <label>Categoria:</label>
        <select name="categoria">
            <option value="CDB" <?php selected($categoria, 'CDB'); ?>>CDB</option>
            <option value="Tesouro" <?php selected($categoria, 'Tesouro'); ?>>Tesouro</option>
            <option value="LCI e LCA" <?php selected($categoria, 'LCI e LCA'); ?>>LCI e LCA</option>
        </select>
    </p>
    <p>
        <label>Tipo Rentabilidade:</label>
        <select name="tipo_rentabilidade">
            <option value="Pos-fixado" <?php selected($tipo_rentabilidade, 'Pos-fixado'); ?>>Pós-fixado</option>
            <option value="Prefixado" <?php selected($tipo_rentabilidade, 'Prefixado'); ?>>Prefixado</option>
            <option value="Inflacao" <?php selected($tipo_rentabilidade, 'Inflacao'); ?>>Inflação</option>
        </select>
    </p>
    <p>
        <label>Risco:</label>
        <select name="risco">
            <option value="Baixo" <?php selected($risco, 'Baixo'); ?>>Baixo</option>
            <option value="Medio" <?php selected($risco, 'Medio'); ?>>Médio</option>
            <option value="Alto" <?php selected($risco, 'Alto'); ?>>Alto</option>
        </select>
    </p>
    <p>
        <label>Rentabilidade:</label>
        <input type="text" name="rentabilidade" value="<?php echo esc_attr($rentabilidade); ?>" />
    </p>
    <p>
        <label>Aplicação Mínima:</label>
        <input type="number" name="aplicacao_minima" value="<?php echo esc_attr($aplicacao_minima); ?>" />
    </p>
    <p>
        <label>Data de Vencimento:</label>
        <input type="date" name="data_vencimento" value="<?php echo esc_attr($data_vencimento); ?>" />
    </p>
    <p>
        <label>Link CTA:</label>
        <input type="text" name="link_cta" value="<?php echo esc_attr($link_cta); ?>" />
    </p>
    <?php
}

?>
