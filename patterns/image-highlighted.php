<?php
/**
 * Title: Image: Highlighted
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
    "style":{
        "spacing":{
            "margin":{
                "top":"0",
                "bottom":"var:preset|spacing|2"
            },
            "blockGap":"0",
            "padding":{
                "top":"var:preset|spacing|2",
                "bottom":"var:preset|spacing|2",
                "left":"var:preset|spacing|2",
                "right":"var:preset|spacing|2"
            }
        }
    },
    "backgroundColor":"grey-200",
    "layout":{
        "type":"constrained"
    }
}
-->
<div class="wp-block-group has-grey-200-background-color has-background" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--2);padding-top:var(--wp--preset--spacing--2);padding-right:var(--wp--preset--spacing--2);padding-bottom:var(--wp--preset--spacing--2);padding-left:var(--wp--preset--spacing--2)">
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
