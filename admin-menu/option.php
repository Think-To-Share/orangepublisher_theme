<h1>Orange Publisher Settings</h1>
<div class="wrap">
    <h2>Service Category</h2>
    <p>Choose Service Categories to show</p>
    <form method="post" action="options.php">
        <?php settings_fields( 'orange-service-group' ); ?>
        <?php do_settings_sections( 'orange-service-group' ); ?>
        <?php
            $terms = get_terms([
                'hide_empty' => false,
            ]);

            $selected = false;
            foreach ($terms as $term):

                if(!empty(get_option('selectService'))) {
                    if(in_array($term->term_id, get_option('selectService'))) {
                        $selected = true;
                    }
                }
        ?>
                <input type="checkbox" name="selectService[]" id="" value="<?php echo $term->term_id ?>" <?php echo $selected ? 'checked' : '' ?>><?php echo $term->name ?><br>
                <?php $selected = false ?>
        <?php endforeach; ?>

        <!-- Submit Button -->
        <?php submit_button(); ?>
    </form>
</div>