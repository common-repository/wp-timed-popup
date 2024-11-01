<?php
/*
 * * 
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
$color = get_option('sc_popup_color');
$width = get_option('sc_popup_width');
?>
<style type="text/css">
    .sc-popup-title,
    .sc-popup-cta a,
    #sc-popup input[type='submit']{
        background: #<?php echo $color; ?> !important;
    }
    #sc-popup input[type='text']:focus,
    #sc-popup input[type='email']:focus{
        border: 1px solid #<?php echo $color; ?> !important;
        box-shadow: 0 0 3px #<?php echo $color; ?> !important;
        -moz-box-shadow: 0 0 3px #<?php echo $color; ?> !important;
        -webkit-box-shadow: 0 0 3px #<?php echo $color; ?> !important;
    }
    #sc-popup{
        width: <?php echo $width; ?>px;
    }
</style>
<div id="sc-popup-dim">
    <div id="sc-popup">
        <div id="sc-close"><img src="<?php echo plugins_url(); ?>/wp-timed-popup/images/close.png"/></div>
        <div class="sc-popup">
            <div class="sc-popup-title">
                <?php echo get_option('sc_popup_title'); ?>
            </div>

            <?php if (get_option('sc_popup_media_type') == 'video') : ?>
                <div class="sc-popup-media left <?php echo get_option('sc_popup_media_type'); ?>">
                    <?php echo get_option('sc_popup_media_link'); ?>
                </div>
            <?php elseif (get_option('sc_popup_media_type') == 'image') : ?>
                <div class="sc-popup-media left <?php echo get_option('sc_popup_media_type'); ?>">
                    <img src="<?php echo get_option('sc_popup_media_link'); ?>"/>
                </div>
            <?php endif; ?>

            <div class="left <?php echo get_option('sc_popup_media_type'); ?>">
                <div class="sc-popup-subtitle">
                    <?php echo stripslashes(get_option('sc_popup_subtitle')); ?>
                </div>              
            </div>

            <div class="clear"></div>

            <div class="sc-popup-form">
                <?php echo do_shortcode(get_option('sc_popup_shortcode')); ?>
            </div>
            <?php if (get_option('sc_popup_cta_url') != '') : ?>
                <div class="sc-popup-cta">
                    <a href="<?php echo esc_attr( get_option('sc_popup_cta_url') ); ?>" class="button"><?php echo get_option('sc_popup_cta_text'); ?></a>
                </div>  
            <?php endif; ?>

        </div>
    </div>
</div>
<script>
jQuery(document).ready(function($) {
    var margin = 0;
    $('#sc-popup-dim').delay(<?php echo esc_js( get_option('sc_popup_delay') ); ?>000).fadeIn(300, function() {
        margin = $('#sc-popup').width() / 2;
        $('#sc-popup').css({'marginLeft': -margin}).fadeIn(350);
    });

    $('#sc-close').click(function() {
        $('#sc-popup').fadeOut(350, function() {
            $('#sc-popup-dim').fadeOut(300);
        });
    });
});
</script>
