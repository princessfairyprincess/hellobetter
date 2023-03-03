<?php

/**
 * Markup for the pop-up
 *
 * @link       https://example.com
 * @since      1.0.0
 *
 * @package    HB_PopUp
 * @subpackage HB_PopsUp/public/partials
 */

/**
 * Content
 * 
 * Store in variables so that we can change these values from hard-coded strings to user-defined strings, if/when that functionality is added
 */

 $image = "/wp-content/plugins/hellobetter-pop-up/public/img/hb-header-img.png";
 $heading = "Mehr Unterstützung zum Mitnehmen?";
 $body = "Deine Verbindung zwischen Körper und Kopf stärken? Wir unterstützen dich mit vielen Infos und Strategien.";
 $email_placeholder = "beispiel@email.de";
 $submit_label = "Senden";
 $close_label = "Schließen";
?>


<div class="hb-popup-container">
    <div class="hb-popup">
        <div class="hb-popup-inner">
            <div class="hb-popup-content">
                <div class="hb-copy">
                    <div class="copy-inner">
                        <div class="image-container">
                            <!--Set inline so that the image url can be taken from the $image variable - and thus can be defined by user at a later stage. I try to avoid inlining styles otherwise-->
                            <div class="image" style="background-image: url('<?php echo $image;?>');"></div>
                        </div>
                        <div class="text-container">
                            <div class="heading">
                                <h1><?php echo $heading;?></h1>
                            </div>
                            <div class="body">
                                <p>
                                <?php echo $body;?>
                                </p>
                            </div>
                        </div>
                        <div class="close-container desktop">
                            <div class="close close-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 5L12 12M19 19L12 12M12 12L19 5L5 19" stroke="#868989" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hb-cta">
                    <div class="cta-inner">
                        <div class="form-container">
                            <form class="popup-form">
                                <input type="email" id="hb-email" name="email" placeholder="<?php echo $email_placeholder;?>">
                                <input type="submit" id="hb-submit" name="submit" value="<?php echo $submit_label;?>"> 
                            </form>
                        </div>
                        <div class="close-container mobile">
                            <button class="close close-button"><?php echo $close_label;?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>