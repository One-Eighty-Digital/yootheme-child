<?php

$props += [
    'media_overlay' => null,
    'media_overlay_gradient' => null,
];

// Resets
if (!($props['image'])) {
    $props['media_overlay'] = false;
    $props['media_overlay_gradient'] = false;
}



// Image
if($element['cf-image_position'] == 'foreground'){
    $props['image'] = $this->render("{$__dir}/template-image", compact('props'));
}
$bg_props = "";
if($element['cf-image_position'] == 'background'){
    $bg_props = "uk-background-" . $props['image_size'] . " uk-background-" . $props['image_position'];
}


$match_Height = "";
if ($element['card_match_height'] == 'match'){
    $match_Height = "uk-height-1-1";
}

$overlay = ($props['media_overlay'] || $props['media_overlay_gradient']) && ($props['image'])
    ? $this->el('div', [
        'class' => ['uk-position-cover'],
        'style' => [
            'background-color: {media_overlay};',
            // `background-clip` fixes sub-pixel issue
            'background-image: {media_overlay_gradient}; background-clip: padding-box',
        ],
]) : null;

// Link

if(!$element['link_type']){
    $link = $this->el('a', [

        'class' => [
            'el-link',
            'uk-{link_style: link-(muted|text)}',
            'uk-button uk-button-{!link_style: |link-muted|link-text} [uk-button-{link_size}]',
        ],
        'href' => $props['link'],
        'target' => ['_blank {@link_target}'],
        'uk-scroll' => strpos($props['link'], '#') === 0,

    ]);
}else{
    $link = $this->el('a', [

        'class' => 'uk-position-cover',
        'href' => $props['link'],
        'target' => ['_blank {@link_target}'],
        'uk-scroll' => strpos($props['link'], '#') === 0,

    ]);
}

// Display
foreach (['title', 'meta', 'content', 'link'] as $key) {
    if (!$element["show_{$key}"]) { $props[$key] = ''; }
}
?>





 <div class="uk-card <?= $match_Height ?> <?= $element['card_size']?> uk-<?= $element['card_style']?> 
            <?php if(!$props['panel_card_image']) : ?> uk-card-body  <?php endif ?>
            <?php if($element['cf-image_position'] == 'background') : ?>
            uk-background-<?=$props['image_size']?> uk-background-<?=$props['image_position']?>
            <?php endif ?>" 
<?php if ($element['cf-image_position'] == 'background') : ?>
        style="background-image: url(<?=$props['image'] ?>);"
<?php endif ?>
 >
    <?php if ($overlay) : ?>
        <?= $overlay($props, '') ?>
    <?php endif ?>
        <?php if ($props['panel_card_image'] && $element['image_align'] == 'top'): ?>
            <div class="uk-card-media-top">
        <?php endif ?>
        <?php if ($element['image_align'] == 'top' && $element['cf-image_position'] == 'foreground') : ?>
            <?= $props['image'] ?>
        <?php endif ?>
        <?php if ($props['panel_card_image'] && $element['image_align'] == 'top'): ?>
            </div>
        <?php endif ?>
        <?php if ($props['panel_card_image']): ?>
            <div class="uk-card-body">
        <?php endif ?>
        <?= $this->render("{$__dir}/template-content", compact('props', 'link')) ?>
        <?php if ($props['panel_card_image']): ?>
            </div>
        <?php endif ?>
        <?php if($props['panel_card_image'] && $element['image_align'] == 'bottom') : ?>
            <div class="uk-card-media-bottom">
        <?php endif ?>
        <?php if ($element['image_align'] == 'bottom' && $element['cf-image_position'] == 'foreground') : ?>
            <?= $props['image'] ?>
        <?php endif ?>
        <?php if($props['panel_card_image'] && $element['image_align'] == 'bottom') : ?>
            </div>
        <?php endif ?>
        <?php if (!$element['link_type'] && $props['link']): ?>
            <div class="uk-margin-<?= $element['link_margin']?>top">
                    <?= $link($element, $props['link_text']) ?>
            </div> 
        <?php endif ?>
    <?php if ($element['link_type'] && $props['link']): ?>
           <?= $link($element, '') ?> 
    <?php endif ?>
</div>
