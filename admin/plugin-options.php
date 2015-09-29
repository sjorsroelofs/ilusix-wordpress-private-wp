<div class="wrap">
    <h2>Private WP</h2>

    <?php

    $optionsSaved = false;

    if(isset( $_REQUEST['submit'] )) {
        update_option( 'ipw-default-page-id', isset( $_REQUEST['default-page-id'] ) ? $_REQUEST['default-page-id'] : null );
        update_option( 'ipw-excluded-page-ids', isset( $_REQUEST['excluded-page-ids'] ) ? $_REQUEST['excluded-page-ids'] : null );

        $optionsSaved = true;
    }

    if($optionsSaved) echo '<div id="message" class="updated"><p>Your settings have been updated.</p></div>';

    $defaultPageIDValue     = get_option( 'ipw-default-page-id' );
    $excludedPageIDs        = get_option( 'ipw-excluded-page-ids' );
    $pages                  = get_pages();

    if(!is_array( $excludedPageIDs )) $excludedPageIDs = array( $excludedPageIDs );

    ?>

    <p>Configure your settings below:</p>

    <form method="post">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Default page</th>
                <td>
                    <label for="default-page-id">
                        <select name="default-page-id" id="default-page-id">
                            <option value="">- Select a page -</option>
                            <?php foreach($pages as $page) : ?>
                                <option value="<?php echo $page->ID; ?>"<?php echo ($page->ID == $defaultPageIDValue) ? ' selected="selected"': ''; ?>><?php echo $page->post_title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Excluded pages</th>
                <td>
                    <?php foreach($pages as $page) : ?>
                        <label id="checkbox<?php echo $page->ID; ?>">
                            <input type="checkbox" name="excluded-page-ids[]" value="<?php echo $page->ID; ?>"<?php echo (in_array($page->ID, $excludedPageIDs)) ? ' checked="checked"' : ''; ?> />&nbsp;<?php echo $page->post_title; ?><br/>
                        </label>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>