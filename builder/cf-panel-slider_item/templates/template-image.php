<?php

if (!$props['image']) {
    return;
}

// Image
echo $this->el('image', [

    'class' => [
        'el-image'
    ],

    'src' => $props['image'],
    'alt' => $props['image_alt'],
    'uk-img' => 'target: !.uk-slider-items',
    'uk-cover' => $element['slider_width'] && $element['slider_height'],
    'thumbnail' => true,

])->render($element);
