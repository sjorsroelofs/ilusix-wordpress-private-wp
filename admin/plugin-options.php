<div class="wrap">
    <h2>Private WP</h2>
    
    <?php
    
    $optionsSaved = false;
    
    if(isset($_REQUEST['submit'])) {
    
        if(isset($_REQUEST['default-page-id'])) {
            update_option( 'ipw-default-page-id', $_REQUEST['default-page-id'] );
            $optionsSaved = true;
        }
    }
    
    if($optionsSaved) {
        echo '<div id="message" class="updated"><p>Your settings have been updated.</p></div>';
    }
    
    $defaultPageIDValue = get_option( 'ipw-default-page-id' );
    
    ?>
    
    <p>Configure your settings below:</p>
    
    <form method="post">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Default page ID</th>
                <td>
                    <label for="default-page-id">
                        <input type="text" name="default-page-id" value="<?php echo $defaultPageIDValue; ?>" size="2" />
                    </label>
                </td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    </form>
</div>