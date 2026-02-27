<?php

namespace YOOtheme;

return [

    'transforms' => [

        'render' => function ($node){

            $metadata = app(Metadata::class);
            $metadata->set('style:builder-cf-comparison-slider', ['href' => Path::get('./twentytwenty.css'), 'defer' => true]);
            $metadata->set('script:builder-cf-comparison-slider-twentytwenty', ['src' => Path::get('./jquery.twentytwenty.js'), 'defer' => true]);
            $metadata->set('script:builder-cf-comparison-slider-move', ['src' => Path::get('./jquery.event.move.js'), 'defer' => true]);

            if (empty($node->props['before_image'])) {
                $node->props['before_image'] = Url::to('~yootheme/theme/assets/images/element-image-placeholder.png');
            }
            if (empty($node->props['after_image'])) {
                $node->props['after_image'] = Url::to('~yootheme/theme/assets/images/element-image-placeholder.png');
            }
        },

    ],
    'updates' => [

        '1.20.0-beta.4' => function ($node) {

            if (isset($node->props['maxwidth_align'])) {
                $node->props['block_align'] = $node->props['maxwidth_align'];
                unset($node->props['maxwidth_align']);
            }
            if (@$node->props['title_style'] === 'heading-hero') {
                $node->props['title_style'] = 'heading-xlarge';
            }

            if (@$node->props['title_style'] === 'heading-primary') {
                $node->props['title_style'] = 'heading-medium';
            }

            $style = explode(':', $theme->config->get('style'))[0];

            if (in_array($style, ['craft', 'district', 'jack-backer', 'tomsen-brody', 'vision', 'florence', 'max', 'nioh-studio', 'sonic', 'summit', 'trek'])) {

                if (@$node->props['title_style'] === 'h1' || (empty($node->props['title_style']) && @$node->props['title_element'] === 'h1')) {
                    $node->props['title_style'] = 'heading-small';
                }

            }

            if (in_array($style, ['florence', 'max', 'nioh-studio', 'sonic', 'summit', 'trek'])) {

                if (@$node->props['title_style'] === 'h2') {
                    $node->props['title_style'] = @$node->props['title_element'] === 'h1' ? '' : 'h1';
                } elseif (empty($node->props['title_style']) && @$node->props['title_element'] === 'h2') {
                    $node->props['title_style'] = 'h1';
                }

            }

            if (in_array($style, ['fuse', 'horizon', 'joline', 'juno', 'lilian', 'vibe', 'yard'])) {

                if (@$node->props['title_style'] === 'heading-medium') {
                    $node->props['title_style'] = 'heading-small';
                }

            }

            if (in_array($style, ['copper-hill'])) {

                if (@$node->props['title_style'] === 'heading-medium') {
                    $node->props['title_style'] = @$node->props['title_element'] === 'h1' ? '' : 'h1';
                } elseif (@$node->props['title_style'] === 'h1') {
                    $node->props['title_style'] = @$node->props['title_element'] === 'h2' ? '' : 'h2';
                } elseif (empty($node->props['title_style']) && @$node->props['title_element'] === 'h1') {
                    $node->props['title_style'] = 'h2';
                }

            }

            if (in_array($style, ['trek', 'fjord'])) {

                if (@$node->props['title_style'] === 'heading-medium') {
                    $node->props['title_style'] = 'heading-large';
                }

            }

            if (in_array($style, ['juno', 'vibe', 'yard'])) {

                if (@$node->props['title_style'] === 'heading-xlarge') {
                    $node->props['title_style'] = 'heading-medium';
                }

            }

            if (in_array($style, ['district', 'florence', 'flow', 'nioh-studio', 'summit', 'vision'])) {

                if (@$node->props['title_style'] === 'heading-xlarge') {
                    $node->props['title_style'] = 'heading-large';
                }

            }

            if (in_array($style, ['lilian'])) {

                if (@$node->props['title_style'] === 'heading-xlarge') {
                    $node->props['title_style'] = 'heading-2xlarge';
                }

            }

        },

    ],

];
