<?php
/**
 * Plugin Name: Bloco Investimentos
 * Description: Plugin para integrar o Custom Post Type Investimentos e um bloco customizado.
 * Version: 1.0.0
 * Author: Dhimylee Almeida
 */

if (!defined('ABSPATH')) {
    exit;
}

function salvar_meta_boxes_investimentos($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    update_post_meta($post_id, '_categoria', sanitize_text_field($_POST['categoria']));
    update_post_meta($post_id, '_tipo_rentabilidade', sanitize_text_field($_POST['tipo_rentabilidade']));
    update_post_meta($post_id, '_risco', sanitize_text_field($_POST['risco']));
    update_post_meta($post_id, '_rentabilidade', sanitize_text_field($_POST['rentabilidade']));
    update_post_meta($post_id, '_aplicacao_minima', sanitize_text_field($_POST['aplicacao_minima']));
    update_post_meta($post_id, '_data_vencimento', sanitize_text_field($_POST['data_vencimento']));
    update_post_meta($post_id, '_link_cta', esc_url($_POST['link_cta']));
}
add_action('save_post', 'salvar_meta_boxes_investimentos');

// Adicionar Meta Boxes para o CPT "Investimentos"
function adicionar_meta_boxes_investimentos() {
    add_meta_box(
        'informacoes_investimento',
        'Informações do Investimento',
        'renderizar_meta_box_investimentos',
        'investimentos',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'adicionar_meta_boxes_investimentos');

// Função para exibir o bloco
function renderizar_bloco_investimentos($attributes) {
    if (empty($attributes['postId'])) {
        return '<p>Investimento não selecionado.</p>';
    }
    

    $post_id = $attributes['postId'];
    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'investimentos') {
        return '<p>Investimento inválido.</p>';
    }


    $categoria = get_post_meta($post_id, '_categoria', true);
    $tipo_rentabilidade = get_post_meta($post_id, '_tipo_rentabilidade', true);
    $risco = get_post_meta($post_id, '_risco', true);
    $rentabilidade = get_post_meta($post_id, '_rentabilidade', true);
    $aplicacao_minima = get_post_meta($post_id, '_aplicacao_minima', true);
    $link_cta = get_post_meta($post_id, '_link_cta', true);
    $data_vencimento = get_post_meta($post_id, '_data_vencimento', true);

    if ($data_vencimento) {
        $timestamp = strtotime($data_vencimento);
        $data_vencimento_formatada = date('d/m/Y', $timestamp);
    } else {
        $data_vencimento_formatada = 'Data não disponível';
    }

    return "
        <div class='box-investimentos'>
            <span class='box-investimentos__risco'>Risco " . esc_html($risco) . "</span>

            <div class='box-investimentos__header'>
                <div class='box-investimentos__info'>
                    <div>
                        <span>" . esc_html($categoria) . "</span>
                        <span>" . esc_html($post->post_title) . "</span>
                    </div>
                    <p>" . esc_html($tipo_rentabilidade) . "</p>

                </div>
                <a class='box-investimentos__link' href='" . esc_url($link_cta) . "' target='_blank' rel='noopener noreferrer'>Investir</a>
            </div>

            <div class='box-investimentos__details'>
                <div class='box-investimentos__blocks'>
                    <p>Rentabilidade</p>
                    <span>" . esc_html($rentabilidade) . "</span>
                </div>
                <div class='box-investimentos__blocks'>
                    <p>Aplicação Mínima</p>
                    <span>R$ " . esc_html($aplicacao_minima) . "</span>
                </div>
                <div class='box-investimentos__blocks'>
                    <p>Data de Vencimento</p>
                    <span>" . esc_html($data_vencimento_formatada) . "</span>
                </div>
            </div>
        </div>
    ";
}

// Registrar o bloco dinâmico
function registrar_bloco_investimentos() {
    register_block_type(__DIR__, [
        'render_callback' => 'renderizar_bloco_investimentos',
    ]);
}
add_action('init', 'registrar_bloco_investimentos');


