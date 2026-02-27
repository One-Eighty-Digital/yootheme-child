<?php

$id = uniqid("cf-");

$el = $this->el('div', [

    'class' => [
    ]

]);

?>
<?= $el($props, $attrs) // Output div tag ?>
    <div id="<?= $id ?>" data-before="<?= $props['text_before']?>" data-after="<?= $props['text_after']?>">
         <img src="<?= $props['before_image']?>"/>
         <img src="<?= $props['after_image']?>"/>
    </div>
    <script>
    (function($) {
        $(window).load(function() {
            $("#<?= $id ?>").twentytwenty({default_offset_pct: <?= $props['offset'] ?>, orientation: '<?= $props['direction'] ?>'});
        });
    })(jQuery);
    </script>
</div>