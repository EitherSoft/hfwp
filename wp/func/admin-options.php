<?php

function mytheme_admin()
{
    global $themename, $shortname, $options;
    if ($_REQUEST['saved']) print '<div id="message" class="updated fade"><p><strong>' . __('Settings saved', $themename) . '</strong></p></div>';
    if ($_REQUEST['reset']) print '<div id="message" class="updated fade"><p><strong>' . __('Settings resetted', $themename) . '</strong></p></div>';
    ?>
    <link rel="stylesheet" media="screen" type="text/css"
          href="<?php bloginfo('template_directory'); ?>/func/assets/tabs/tabs.css"/>

    <div class="wrap">
    <div class="icon32" id="icon-options-general"></div>
    <h2><?php print __('Theme settings', $themename); ?></h2><br/>

    <ul class="tabs">
        <li><a href="#general"><?php print __('General', $themename); ?></a></li>
        <li><a href="#contact"><?php print __('Contact', $themename); ?></a></li>
        <li><a href="#main"><?php print __('Main Page', $themename); ?></a></li>
        <li><a href="#location"><?php print __('Location Page', $themename); ?></a></li>
        <li><a href="#contacts"><?php print __('Contacts Page', $themename); ?></a></li>
        <li><a href="#footer"><?php print __('Footer data', $themename); ?></a></li>
    </ul>

    <form method="post" id="bersihsettings">
        <!-- tab "panes" -->
        <div class="panes">
            <?php
            $num = 0;
            foreach ($options as $value) {

            switch ($value['type']) {

            case "open":
            ?>
            <div>
                <table width="100%" border="0" style="padding:10px;">


                    <?php break;

                    case "close":
                    ?>

                </table>
            </div>


        <?php break;

        case "title":
        ?>
            <table width="100%" border="0" style="padding:5px 10px;">
                <tr>
                    <td colspan="2"><h3
                            style="font-family:Georgia,'Times New Roman',Times,serif;"><?php print $value['name']; ?></h3>
                    </td>
                </tr>


                <?php break;

                case 'text':
                    ?>

                    <tr>
                        <td width="300" rowspan="2" valign="top"><strong><?php print $value['name']; ?></strong></td>
                        <td><input style="width:400px;" name="<?php print $value['id']; ?>"
                                   id="<?php print $value['id']; ?>" type="<?php print $value['type']; ?>"
                                   value="<?php if (get_settings($value['id']) != "") {
                                       print stripslashes(get_settings($value['id']));
                                   } else {
                                       print stripslashes($value['std']);
                                   } ?>"/></td>
                    </tr>

                    <tr>
                        <td>
                            <small><?php print $value['desc']; ?></small>
                        </td>
                    </tr>

                    <?php
                    break;

                case 'textarea':
                    ?>

                    <tr>
                        <td width="300" rowspan="2" valign="top"><strong><?php print $value['name']; ?></strong></td>
                        <td><textarea name="<?php print $value['id']; ?>" style="width:400px; height:100px;"
                                      type="<?php print $value['type']; ?>" cols=""
                                      rows=""><?php if (get_settings($value['id']) != "") {
                                    print stripslashes(get_settings($value['id']));
                                } else {
                                    print stripslashes($value['std']);
                                } ?></textarea></td>

                    </tr>

                    <tr>
                        <td>
                            <small><?php print $value['desc']; ?></small>
                        </td>
                    </tr>

                    <?php
                    break;

                case 'select':
                    ?>
                    <tr>
                        <td width="300" rowspan="2" valign="top"><strong><?php print $value['name']; ?></strong></td>
                        <td>
                            <select name="<?php print $value['id']; ?>" id="<?php print $value['id']; ?>">
                                <?php foreach ($value['options'] as $option) { ?>
                                    <option<?php if (get_settings($value['id']) == $option) {
                                        print ' selected="selected"';
                                    } elseif ($option == $value['std']) {
                                        print ' selected="selected"';
                                    } ?>><?php print $option; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <small><?php print $value['desc']; ?></small>
                        </td>
                    </tr>

                    <?php
                    break;
                case "checkbox":
                    ?>
                    <tr>
                        <td width="300" valign="middle"><strong><?php print $value['name']; ?></strong></td>
                        <td><? if (get_settings($value['id'])) {
                                $checked = "checked=\"checked\"";
                            } else {
                                $checked = "";
                            } ?>
                            <input type="checkbox" name="<?php print $value['id']; ?>" id="<?php print $value['id']; ?>"
                                   value="true" <?php print $checked; ?> />
                            <label for="<?php print $value['id']; ?>"><?php print $value['desc']; ?></label>
                        </td>
                    </tr>


                    <?php
                    break;

                case "checkbox_multiple":
                    ?>
                    <tr>
                        <td width="300" rowspan="2" valign="top"><strong><?php print $value['name']; ?></strong></td>
                        <td>
                            <table>
                                <?php
                                $i = 0;
                                foreach ($value['options'] as $key => $option) {
                                    $checked = "";
                                    if (get_settings($value['id'])) {
                                        if (in_array($key, get_settings($value['id']))) $checked = "checked=\"checked\"";
                                    } elseif (is_array($value['std']))
                                        if ((in_array($key, $value['std']) && get_settings($value['id'] . '_status') !== 'saved'))
                                            $checked = "checked=\"checked\"";
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="<?php print $value['id']; ?>[]"
                                                   id="<?php print $value['id']; ?>-<?php print $key; ?>"
                                                   value="<?php print $key; ?>" <?php print $checked; ?> />
                                            <label
                                                for="<?php print $value['id']; ?>-<?php print $key; ?>"><?php print $option; ?></label>
                                        </td>
                                    </tr> <?php $i++;
                                } ?></table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small><?php print $value['desc']; ?></small>
                        </td>
                    </tr>
                    <?php
                    break;
                case "heading" :
                    ?>
                    <thead>
                    <tr valign="top">
                        <th style="text-align:left;font-style:italic;font-family:Georgia, 'Times New Roman', Times, serif;font-size:1.3em;"
                            colspan="2">
                            <?php print $value['name']; ?>
                        </th>
                    </tr>
                    </thead>
                    <?php
                    break;
                case "submit":
                    ?>
                    <div class="submit webtreats-submit"><input class="button button-primary" type="submit" name="save"
                                                                value="<?php print __('Save changes', $themename); ?>"/><input
                            type="hidden" name="action" value="save"/></div>
                    <?php

                    break;
                }
                if ($options[$num + 1]['type'] !== 'close' && $value['type'] !== 'close' && $options[$num]['type'] !== 'open' && $value['type'] !== 'open') print '<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #dddddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>';
                $num++;
                }
                ?>

                <!--</table>-->
        </div><!-- end tab "panes" -->


        <table>
            <tr>
                <td><p class="submit"><input name="save" type="submit"
                                             value="<?php print __('Save changes', $themename); ?>"
                                             class="button button-primary"/>
                        <input type="hidden" name="action" value="save"/>
                    </p>
    </form>
    <form method="post">

        </td>
        <td><p class="submit"><input name="reset" type="submit" value="<?php print __('Reset', $themename); ?>"
                                     class="button button-primary"/>
                <input type="hidden" name="action" value="reset"/></p></td>
        </tr></table>

    </form>
    <!-- Javascript for the tabs -->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $("ul.tabs").tabs("div.panes > div").history();
        });

        function setAnchor() {
            document.getElementById('anchor').value = location.hash;
        }
    </script>
    <?php
}