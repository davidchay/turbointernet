<?php

/*
    Shorcode agrega el boton de whatsapp para 
    hacer pedido de producto directo 
*/

add_shortcode( 'btn_whatsapp', 'button_whatsapp' );

function button_whatsapp( $atts ) {
    $pagetitle = get_the_title(); 
    $pageurl = get_permalink();
    
    $datos = shortcode_atts( array (
        'tel' => '+529621767466',
        'cta' => 'Pídelo ahora',
        'msg' => '¡Hola Turbointernet!. Quiero hacer un pedido de {title}, {url}',
        'class' => ''
        ), $atts );

    $text = str_replace("{title}", $pagetitle, $datos['msg']);
    $text = str_replace("{url}", $pageurl, $text);

    $url = 'https://wa.me/'.$datos['tel'].'?text='.$text;

    $btn = '<a href="'. $url.'" title="'.$datos['cta'].'" target="_blank" class="btn btn-whatsapp '.$datos['class'].' mb-2 rounded-0">
	<i class="fa fab fa-whatsapp"></i> '.$datos['cta'].'</a>';
    return $btn;
}