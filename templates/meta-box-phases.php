<?php
/**
 * Template for the project phases meta box
 */

// Get saved phases
$phases = get_post_meta($post->ID, '_project_phases', true);
if (!is_array($phases)) {
    $phases = array();
}
?>

<div class="phases-container">
    <div id="phases-list">
        <?php
        if (!empty($phases)) {
            foreach ($phases as $phase_id => $phase) {
                ?>
                <div class="phase-item" data-phase-id="<?php echo esc_attr($phase_id); ?>">
                    <div class="phase-header">
                        <input type="text" 
                               name="phases[<?php echo esc_attr($phase_id); ?>][name]" 
                               value="<?php echo esc_attr($phase['name']); ?>" 
                               class="phase-name" 
                               placeholder="<?php esc_attr_e('Phase Name', 'redink-timesheets'); ?>">
                        <button type="button" class="button remove-phase"><?php esc_html_e('Remove Phase', 'redink-timesheets'); ?></button>
                    </div>
                    <div class="phase-entries">
                        <?php
                        if (!empty($phase['entries'])) {
                            foreach ($phase['entries'] as $entry_id => $entry) {
                                ?>
                                <div class="entry-item" data-entry-id="<?php echo esc_attr($entry_id); ?>">
                                    <div class="entry-row">
                                        <input type="date" 
                                               name="phases[<?php echo esc_attr($phase_id); ?>][entries][<?php echo esc_attr($entry_id); ?>][date]" 
                                               value="<?php echo esc_attr($entry['date']); ?>" 
                                               class="entry-date">
                                        <input type="text" 
                                               name="phases[<?php echo esc_attr($phase_id); ?>][entries][<?php echo esc_attr($entry_id); ?>][description]" 
                                               value="<?php echo esc_attr($entry['description']); ?>" 
                                               class="entry-description" 
                                               placeholder="<?php esc_attr_e('Description', 'redink-timesheets'); ?>">
                                        <input type="number" 
                                               name="phases[<?php echo esc_attr($phase_id); ?>][entries][<?php echo esc_attr($entry_id); ?>][hours]" 
                                               value="<?php echo esc_attr($entry['hours']); ?>" 
                                               class="entry-hours" 
                                               step="0.5" 
                                               min="0">
                                        <input type="number" 
                                               name="phases[<?php echo esc_attr($phase_id); ?>][entries][<?php echo esc_attr($entry_id); ?>][costs]" 
                                               value="<?php echo esc_attr($entry['costs']); ?>" 
                                               class="entry-costs" 
                                               step="0.01" 
                                               min="0">
                                        <input type="number" 
                                               name="phases[<?php echo esc_attr($phase_id); ?>][entries][<?php echo esc_attr($entry_id); ?>][rate]" 
                                               value="<?php echo esc_attr($entry['rate']); ?>" 
                                               class="entry-rate" 
                                               step="0.01" 
                                               min="0">
                                        <input type="text" 
                                               name="phases[<?php echo esc_attr($phase_id); ?>][entries][<?php echo esc_attr($entry_id); ?>][invoice_no]" 
                                               value="<?php echo esc_attr($entry['invoice_no']); ?>" 
                                               class="entry-invoice-no" 
                                               placeholder="<?php esc_attr_e('Invoice No.', 'redink-timesheets'); ?>">
                                        <input type="checkbox" 
                                               name="phases[<?php echo esc_attr($phase_id); ?>][entries][<?php echo esc_attr($entry_id); ?>][invoice_paid]" 
                                               value="1" 
                                               <?php checked(!empty($entry['invoice_paid'])); ?>>
                                        <button type="button" class="button remove-entry"><?php esc_html_e('Remove', 'redink-timesheets'); ?></button>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <button type="button" class="button add-entry" data-phase-id="<?php echo esc_attr($phase_id); ?>">
                        <?php esc_html_e('Add Entry', 'redink-timesheets'); ?>
                    </button>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <button type="button" class="button button-primary" id="add-phase">
        <?php esc_html_e('Add New Phase', 'redink-timesheets'); ?>
    </button>
</div>

<script type="text/template" id="phase-template">
    <div class="phase-item" data-phase-id="{{PHASE_ID}}">
        <div class="phase-header">
            <input type="text" 
                   name="phases[{{PHASE_ID}}][name]" 
                   class="phase-name" 
                   placeholder="<?php esc_attr_e('Phase Name', 'redink-timesheets'); ?>">
            <button type="button" class="button remove-phase"><?php esc_html_e('Remove Phase', 'redink-timesheets'); ?></button>
        </div>
        <div class="phase-entries"></div>
        <button type="button" class="button add-entry" data-phase-id="{{PHASE_ID}}">
            <?php esc_html_e('Add Entry', 'redink-timesheets'); ?>
        </button>
    </div>
</script>

<script type="text/template" id="entry-template">
    <div class="entry-item" data-entry-id="{{ENTRY_ID}}">
        <div class="entry-row">
            <input type="date" 
                   name="phases[{{PHASE_ID}}][entries][{{ENTRY_ID}}][date]" 
                   class="entry-date">
            <input type="text" 
                   name="phases[{{PHASE_ID}}][entries][{{ENTRY_ID}}][description]" 
                   class="entry-description" 
                   placeholder="<?php esc_attr_e('Description', 'redink-timesheets'); ?>">
            <input type="number" 
                   name="phases[{{PHASE_ID}}][entries][{{ENTRY_ID}}][hours]" 
                   class="entry-hours" 
                   step="0.5" 
                   min="0">
            <input type="number" 
                   name="phases[{{PHASE_ID}}][entries][{{ENTRY_ID}}][costs]" 
                   class="entry-costs" 
                   step="0.01" 
                   min="0">
            <input type="number" 
                   name="phases[{{PHASE_ID}}][entries][{{ENTRY_ID}}][rate]" 
                   class="entry-rate" 
                   step="0.01" 
                   min="0">
            <input type="text" 
                   name="phases[{{PHASE_ID}}][entries][{{ENTRY_ID}}][invoice_no]" 
                   class="entry-invoice-no" 
                   placeholder="<?php esc_attr_e('Invoice No.', 'redink-timesheets'); ?>">
            <input type="checkbox" 
                   name="phases[{{PHASE_ID}}][entries][{{ENTRY_ID}}][invoice_paid]" 
                   value="1">
            <button type="button" class="button remove-entry"><?php esc_html_e('Remove', 'redink-timesheets'); ?></button>
        </div>
    </div>
</script> 