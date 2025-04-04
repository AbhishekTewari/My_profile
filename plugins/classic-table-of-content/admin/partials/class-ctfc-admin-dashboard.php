<div class="ctfc-main-admin-dashboard-wrap">
    <div class="ctfc-admin-dashboard-heading"><h1>Classic Table Of Content</h1></div>
    <div class="ctfc-admin-settings-main-wrap">
        <h1>Lava lamp multiple tabs</h1>
        <div class='ctfc-tabs'>
            <div class='ctfc-tab-buttons'>
                <span class='ctfc-tab1'>Where to</span>
                <span class='ctfc-tab2'>Settings</span>
                <div id='ctfc-lamp' class='ctfc-tab1'></div>
            </div>
            <div class='ctfc-tab-content'>
                <div class='ctfc-tab1'>
                    <div class=ctfc-where-to-setting-form>
                       <!-- <h3>Select Where you want to put the Table of Content in post</h3> -->
                        <form method="post" action="options.php">
                        <?php
                            settings_fields( 'ctfc_admin_settings_group' );
                            $options = get_option('ctfc_admin_option', []);
                            $value = isset($options['asdas']) ? $options['asdas'] : '';
                            ?>
                                <!-- <label>After First Image</label>
                                <input type="text" name="ctfc_admin_option[asdas]" value="<?php //echo esc_attr($value); ?>" />
                                <?php //submit_button(); ?>
                                <label>After First H1</label>
                                <label>After First H2</label>
                                <label>After First H2</label>
                                <label>If you want to use on Any specific place</label>
                              -->
                                <?php //submit_button(); ?>
                        </form>
                    </div>
                </div>
                <div class='ctfc-tab2'>
                    <!-- This is the content of 2 container.This will be open when button 2 is clicked.This is the content of 2 container.This will be open when button 2 is clicked.This is the content of 2 container.This will be open when button 2 is clicked. -->
                </div>
            </div>
        </div>
    </div>
</div>

