<?php
get_header();
?>

<div class="container">
    <div class="navigation-buttons" style="margin-bottom: 20px;">
        <a href="<?php echo esc_url(get_post_type_archive_link('client')); ?>" class="button" style="display: inline-block; margin-right: 10px; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 4px;">← Back to Clients</a>
        <a href="<?php echo esc_url(home_url('/timesheets/')); ?>" class="button" style="display: inline-block; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 4px;">View Timesheets Summary</a>
    </div>

    <h1><?php echo esc_html__('Clients', 'redink-timesheets'); ?></h1>

    <!-- Rest of the file remains unchanged -->
</div>

<?php
get_footer(); 