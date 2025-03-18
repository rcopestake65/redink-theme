<?php
/**
 * Template Name: Timesheets Summary
 */

get_header();
?>

<div class="container">
    <div class="navigation-buttons" style="margin-bottom: 20px;">
        <a href="<?php echo esc_url(get_post_type_archive_link('client')); ?>" class="button" style="display: inline-block; margin-right: 10px; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 4px;">← Back to Clients</a>
        <a href="<?php echo esc_url(home_url('/timesheets/')); ?>" class="button" style="display: inline-block; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 4px;">View Timesheets Summary</a>
    </div>

    <h1><?php echo esc_html__('Timesheets Summary', 'redink-timesheets'); ?></h1>

    <?php
    // Get all clients
    $clients = get_posts(array(
        'post_type' => 'client',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ));

    if (!empty($clients)) {
        // Separate ongoing and invoiced phases
        $ongoing_phases = array();
        $invoiced_phases = array();

        foreach ($clients as $client) {
            $phases = get_post_meta($client->ID, '_project_phases', true);
            if (!is_array($phases)) {
                continue;
            }

            foreach ($phases as $phase_id => $phase) {
                $phase_data = array(
                    'client_id' => $client->ID,
                    'client_name' => $client->post_title,
                    'phase_id' => $phase_id,
                    'phase_name' => $phase['name'],
                    'entries' => $phase['entries'],
                    'total_hours' => 0,
                    'total_costs' => 0,
                    'total_amount' => 0,
                    'invoice_numbers' => array(),
                    'invoice_dates' => array(),
                    'invoice_paid' => false
                );

                // Calculate totals and collect invoice information
                foreach ($phase['entries'] as $entry) {
                    $phase_data['total_hours'] += floatval($entry['hours']);
                    $phase_data['total_costs'] += floatval($entry['costs']);
                    $phase_data['total_amount'] += floatval($entry['hours']) * floatval($entry['rate']);
                    
                    if (!empty($entry['invoice_no'])) {
                        $phase_data['invoice_numbers'][] = $entry['invoice_no'];
                        if (!empty($entry['date'])) {
                            $phase_data['invoice_dates'][] = $entry['date'];
                        }
                    }

                    // Check if any entry is marked as invoice paid
                    if (!empty($entry['invoice_paid'])) {
                        $phase_data['invoice_paid'] = true;
                    }
                }

                // Check if phase is invoiced
                $is_invoiced = false;
                foreach ($phase['entries'] as $entry) {
                    if (!empty($entry['invoice_no'])) {
                        $is_invoiced = true;
                        break;
                    }
                }

                if ($is_invoiced) {
                    $invoiced_phases[] = $phase_data;
                } else {
                    $ongoing_phases[] = $phase_data;
                }
            }
        }

        // Display ongoing phases
        if (!empty($ongoing_phases)) {
            ?>
            <h2><?php echo esc_html__('Ongoing Phases', 'redink-timesheets'); ?></h2>
            <table class="timesheet-table">
                <thead>
                    <tr>
                        <th><?php echo esc_html__('Client', 'redink-timesheets'); ?></th>
                        <th><?php echo esc_html__('Phase', 'redink-timesheets'); ?></th>
                        <th><?php echo esc_html__('Total', 'redink-timesheets'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ongoing_phases as $phase) : ?>
                        <tr>
                            <td><?php echo esc_html($phase['client_name']); ?></td>
                            <td><?php echo esc_html($phase['phase_name']); ?></td>
                            <td>£<?php echo number_format($phase['total_amount'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        }

        // Display invoiced phases
        if (!empty($invoiced_phases)) {
            ?>
            <h2><?php echo esc_html__('Invoiced', 'redink-timesheets'); ?></h2>
            <table class="timesheet-table">
                <thead>
                    <tr>
                        <th><?php echo esc_html__('Client', 'redink-timesheets'); ?></th>
                        <th><?php echo esc_html__('Phase', 'redink-timesheets'); ?></th>
                        <th><?php echo esc_html__('Total', 'redink-timesheets'); ?></th>
                        <th><?php echo esc_html__('Invoice No.', 'redink-timesheets'); ?></th>
                        <th><?php echo esc_html__('Invoiced', 'redink-timesheets'); ?></th>
                        <th><?php echo esc_html__('Date', 'redink-timesheets'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoiced_phases as $phase) : ?>
                        <tr>
                            <td><?php echo esc_html($phase['client_name']); ?></td>
                            <td><?php echo esc_html($phase['phase_name']); ?></td>
                            <td>£<?php echo number_format($phase['total_amount'], 2); ?></td>
                            <td><?php echo esc_html(implode(', ', array_unique($phase['invoice_numbers']))); ?></td>
                            <td>
                                <input type="checkbox" 
                                       class="invoice-paid-checkbox" 
                                       data-client-id="<?php echo esc_attr($phase['client_id']); ?>"
                                       data-phase-id="<?php echo esc_attr($phase['phase_id']); ?>"
                                       <?php checked($phase['invoice_paid']); ?>>
                            </td>
                            <td><?php 
                                if (!empty($phase['invoice_dates'])) {
                                    $dates = array_unique($phase['invoice_dates']);
                                    sort($dates);
                                    echo esc_html(implode(', ', array_map(function($date) {
                                        return date('d/m/Y', strtotime($date));
                                    }, $dates)));
                                }
                            ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        }
    } else {
        echo '<p>' . esc_html__('No clients found.', 'redink-timesheets') . '</p>';
    }
    ?>
</div>

<script>
jQuery(document).ready(function($) {
    $('.invoice-paid-checkbox').on('change', function() {
        var $checkbox = $(this);
        var clientId = $checkbox.data('client-id');
        var phaseId = $checkbox.data('phase-id');
        var isChecked = $checkbox.prop('checked');

        $.ajax({
            url: redinkTimesheets.ajaxurl,
            type: 'POST',
            data: {
                action: 'update_timesheet_checkbox',
                client_id: clientId,
                phase_id: phaseId,
                invoice_paid: isChecked ? 1 : 0,
                nonce: redinkTimesheets.nonce
            },
            success: function(response) {
                if (response.success) {
                    // Update successful
                    console.log('Checkbox updated successfully');
                } else {
                    // Update failed
                    console.error('Failed to update checkbox');
                    $checkbox.prop('checked', !isChecked); // Revert the checkbox
                }
            },
            error: function() {
                console.error('AJAX error occurred');
                $checkbox.prop('checked', !isChecked); // Revert the checkbox
            }
        });
    });
});
</script>

<?php
get_footer();
?> 