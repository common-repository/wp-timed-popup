<style>
    #gopro{
        width: 100%;
        display: block;
        clear: both;
        padding: 10px;
        margin: 10px 8px 15px 5px;
        border: 1px solid #e1e1e1;
        background: #464646;
        color: #ffffff;
        overflow: hidden;
    }
    #wrapper{
        border: 1px solid #f0f0f0;
        width: 95%;

    }
    #wrapper{
        border: 1px solid #f0f0f0;
        width: 95%;

    }
    table.widefat{
        margin-bottom: 15px;
    }
    table.widefat tr{
        transition: 0.3s all ease-in-out;
        -moz-transition: 0.3s all ease-in-out;
        -webkit-transition: 0.3s all ease-in-out;
    }
    table.widefat tr:hover{
        /*background: #E6E6E6;*/
    }    

    #wrapper input[type='text']{
        width: 80%;
        transition: 0.3s all ease-in-out;
        -moz-transition: 0.3s all ease-in-out;
        -webkit-transition: 0.3s all ease-in-out;
    }
    #wrapper input[type='text']:focus{
        border: 1px solid #1784c9;
        box-shadow: 0 0 7px #1784c9;
        -moz-box-shadow: 0 0 5px #1784c9;
        -webkit-box-shadow: 0 0 5px #1784c9;
    }
    #wrapper input[type='text'].small-text{
        width: 20%;
    }
    .proversion{
        color: red;
        font-style: italic;
    }
    .choose-progress{
        display: none;
    }
    .sc_popup_mode{
        display: inline-block;
        width: 15px;
        height: 15px;
        border-radius: 100%;
        position: relative;
        top: 2px;
        box-shadow: 0 0 3px #333;
        -moz-box-shadow: 0 0 3px #333;
        -webkit-box-shadow: 0 0 3px #333;
    }

    .sc_popup_mode_off{
        background: #F54412;
    }
    .sc_popup_mode_live{
        background: #84E11F;
    }
    .sc_popup_mode_test{
        background: #FF9717;
    }
    .left{ float: left;}
    .right {float: right;}
    .center{text-align: center;}
    .width70{ width: 70%;}
    .width25{ width: 25% !important;}
    .width50{ width: 50%;}    
</style>

<div id="wrapper">
    <div id="gopro">
        <div class="left">
            <h1><b style="color: #fff;">WP Popup</b></h1>
            <div>Customizable popup on site load, easily integrates with your contact or subscribe forms</div>
        </div>
        <div class="right">
            <!--<a href="http://smartcatdesign.net/wp-construction-mode-pro-wordpress-plugin/" target="_blank" class="button-primary" style="padding: 40px;line-height: 0;font-size: 20px">GO PRO NOW</a>-->
        </div>
    </div>
    <div class="width25 right">

        <table class="widefat">
            <thead>
                <tr>
                    <th><b>Looking for Support?</b> </th>
                </tr>
                <tr>
                    <td>
                        If you have any questions, please head to my <a target="_blank" href="https://smartcatdesign.net/get-support/">website</a>, or use the <a target="_blank" href="http://wordpress.org/support/plugin/wp-timed-popup">support forums</a> on WordPress.org. <br><br>
                        If you need priority support, or specific customization, please <a href="https://smartcatdesign.net">contact me.</a>
                    </td>
                </tr>

            </thead>
        </table>
        <table class="widefat">
            <thead>
                <tr>
                    <th>
                        <b>Show your appreciation</b>
                    </th>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>- <a href="http://wordpress.org/support/view/plugin-reviews/wp-timed-popup" target="_blank">Leave ★★★★★ rating on WordPress.org</a></li>
                            <li>- Write a comment on the <a href="https://www.facebook.com/SmartcatDesign" target="_blank">Facebook Page</a></li>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FSmartcatDesign&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=233286813420319" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:35px;" allowTransparency="true"></iframe>                            
                        </ul>

                    </td>
                </tr>
            </thead>
        </table>
        
    </div>
    <div class="width70 left">
        <form name="post_form" method="post" action="" enctype="multipart/form-data">
            <table class="widefat   ">
                <tr>
                    <th>
                        <?php if (get_option('sc_popup_mode') == 'off') { ?>
                            <span class="sc_popup_mode sc_popup_mode_off"></span> Timed Popup is currently Off.
                        <?php } elseif (get_option('sc_popup_mode') == 'test') { ?>
                            <span class="sc_popup_mode sc_popup_mode_test"></span> Timed Popup is currently in Testing mode. You will see the popup on every page load.    
                        <?php } else { ?>
                            <span class="sc_popup_mode sc_popup_mode_live"></span> Timed Popup is currently in Live mode. Users will see the popup every <b><?php echo get_option('sc_popup_days'); ?> day(s)</b>
                        <?php } ?>
                    </th>
                </tr>
            </table>
            <table class="widefat">
                <thead>
                    <tr>
                        <th colspan="2"><b>General Settings</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="sc_popup_title" value="<?php echo esc_attr( get_option('sc_popup_title') ); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Description Text</td>
                        <td>
                            <textarea rows="10" cols="20" name="sc_popup_subtitle"><?php echo esc_textarea( get_option('sc_popup_subtitle') ); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Button Link/URL<br><em>Leave blank if you don't want a button</em></td>
                        <td>
                            <input type="text" name="sc_popup_cta_url" value="<?php echo esc_attr( get_option('sc_popup_cta_url') ); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Button Text</td>
                        <td>
                            <input type="text" name="sc_popup_cta_text" value="<?php echo esc_attr( get_option('sc_popup_cta_text') ); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Add Media</td>
                        <td>
                            <select name="sc_popup_media_type">
                                <option value="none" <?php echo (get_option('sc_popup_media_type') == 'none') ? 'selected=selected' : ''; ?>>None</option>
                                <option value="image" <?php echo (get_option('sc_popup_media_type') == 'image') ? 'selected=selected' : ''; ?>>Image</option>
                                <!--<option value="video" <?php echo (get_option('sc_popup_media_type') == 'video') ? 'selected=selected' : ''; ?>>Video</option>-->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Image Path/URL
                        </td>
                        <td>
                            <input type="text" name="sc_popup_media_link" value="<?php echo esc_attr(get_option('sc_popup_media_link')); ?>"/>
                        </td>                        
                    </tr>
                </tbody>
            </table>
            <table class="widefat">
                <thead>
                    <tr>
                        <th colspan="2"><b>Shortcode</b></th>
                    </tr>
                    <tr>
                        <td colspan="2"> <em>Here's where you enter any shortcode, like forms, mailchimp, gravity forms, campaign monitor, social sharing shortcodes etc..</em></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Shortcode</td>
                        <td>
                            <input type="text" id="sc_popup_shortcode" name="sc_popup_shortcode" value="<?php echo esc_attr( get_option('sc_popup_shortcode') ); ?>"
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="widefat">
                <thead>
                    <tr>
                        <th colspan="2"><b>Timer & Setting</b></th>
                    </tr>
                    <tr>
                        <td colspan="2"> <em>Setup the plugin options, ie: where, when and how often to run. Testing Mode shows the box every
                                time you refresh so you can see the settings. Set to LIVE when you're done with settings</em>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mode</td>
                        <td>
                            <select name="sc_popup_mode">
                                <option value="off" <?php echo (get_option('sc_popup_mode') == 'off') ? 'selected=selected' : ''; ?>>Off</option>
                                <option value="test" <?php echo (get_option('sc_popup_mode') == 'test') ? 'selected=selected' : ''; ?>>Testing</option>
                                <option value="live" <?php echo (get_option('sc_popup_mode') == 'live') ? 'selected=selected' : ''; ?>>Live</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Show popup once every</td>
                        <td>
                            <input type="text" class="width25" name="sc_popup_days" value="<?php echo esc_attr( get_option('sc_popup_days') ); ?>"/>day(s)
                        </td>
                    </tr>
                    <tr>
                        <td>Show popup after</td>
                        <td>
                            <input type="text" class="width25" name="sc_popup_delay" value="<?php echo esc_attr( get_option('sc_popup_delay') ); ?>"/>second(s)
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="widefat">
                <thead>
                    <tr>
                        <th colspan="2"><b>Appearance</b></th>
                    </tr>
                    <tr>
                        <td colspan="2"> <em>Change the look</em></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Color</td>
                        <td>
                            <input type="text" class="wp_popup_color width25" id="bg_colorbox" name="sc_popup_color" value="<?php echo esc_attr( get_option('sc_popup_color') ); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Width</td>
                        <td>
                            <input type="text" class="width25" name="sc_popup_width" value="<?php echo esc_attr( get_option('sc_popup_width') ); ?>"/>px
                        </td>
                    </tr>
<!--                    <tr>
                        <td>Display on Mobile</td>
                        <td>
                            <select name="sc_popup_mobile">
                                <option value="show" <?php echo (get_option('sc_popup_mobile') == 'show') ? 'selected=selected' : ''; ?>>Show</option>
                                <option value="hide" <?php echo (get_option('sc_popup_mobile') == 'hide') ? 'selected=selected' : ''; ?>>Hide</option>
                            </select>
                        </td>
                    </tr>-->
                </tbody>
            </table>
            <!--<input type="submit" name="wp_popup_reset" value="Reset" class="button button-primary" onclick="return confirm_reset();"/>-->         
            <input type="submit" name="wp_popup_save" value="Update" class="button button-primary" />         
        </form>
    </div>    
</div>
<script>
    function confirm_reset() {
        if (confirm("Are you sure you want to reset to defaults ?")) {
            return true;
        } else {
            return false;
        }
    }
    jQuery(document).ready(function($) {
        $("#sc_popup_shortcode").focusout(function() {
            var shortcode = jQuery(this).val();
            shortcode = shortcode.replace(/"/g, "").replace(/'/g, "");
            jQuery(this).val(shortcode);
        });

    });

</script>