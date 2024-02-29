<?php
/**
 * Title: Image - Highlighted
 * Slug: image-highlighted
 * Description: An image with a background color, padding, and caption.
 * Categories: alxwntr/image
 * Keywords: image, picture, photo
 * Viewport Width: 960
 * Block Types:
 * Post Types:
 * Inserter: true
 */

?>
<!--
wp:group {
    "backgroundColor":"grey-200",
    "className":"image--highlighted",
    "layout":{
        "type":"constrained"
    },
    "metadata":{
        "name":"Image - Highlighted"
    },
    "style":{
        "spacing":{
            "margin":{
                "top":"0",
                "bottom":"var:preset|spacing|medium"
            },
            "blockGap":"0",
            "padding":{
                "top":"var:preset|spacing|medium",
                "bottom":"var:preset|spacing|medium",
                "left":"var:preset|spacing|medium",
                "right":"var:preset|spacing|medium"
            }
        }
    }
}
-->
<div class="wp-block-group has-grey-200-background-color has-background image--highlighted" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--medium);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
    <!--
    wp:image {
        "align":"center",
        "id":1398,
        "sizeSlug":"full"
    }
    -->
    <figure class="wp-block-image aligncenter size-full is-style-default">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/placeholder-360x360.png" alt="" class="wp-image-1398"/>
        <figcaption class="wp-element-caption">Enter a caption here to describe the image, or delete this caption.</figcaption>
    </figure><!-- /wp:image -->
</div><!-- /wp:group -->
