<?php

function accordion($atts, $content = null)
{
    global $themename;

    $min=1;
    $max=1000;
    $id=mt_rand($min,$max);

    $atts = shortcode_atts(
        array(
            'title' => __('Title', $themename),
            'content' => __('Content', $themename)
        ),
        $atts,
        'accordion'
    );
    ob_start();
    ?>
    <div class="panel-group" role="tablist">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="collapseListGroupHeading<?php print $id; ?>">
                <h4 class="panel-title">
                    <a href="#collapseListGroup<?php print $id; ?>" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup<?php print $id; ?>">
                        <?php print $atts['title']; ?>
                    </a>
                </h4>
            </div>
            <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup<?php print $id; ?>" aria-labelledby="collapseListGroupHeading<?php print $id; ?>" aria-expanded="false">
                <?php print $atts['content']; ?>
            </div>
        </div>
    </div>
    <?PHP
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

add_shortcode('accordion', 'accordion');