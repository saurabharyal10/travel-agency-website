<?php

/*
 * Overrides Rmsramos\Activitylog's en/action.php.
 *
 * The only reason this file exists: the Activity Logs "Event" filter maps every
 * distinct `event` value through __('activitylog::action.event.'.$value), and
 * our auth-event rows ("logged in" etc.) store a NULL event. That produced the
 * raw key "activitylog::action.event." as a filter option. Adding the ''
 * entry below gives it a real label ("Other"); the rest are capitalised so the
 * filter reads Created / Updated / Deleted.
 */

return [
    'modal' => [
        'heading'     => 'User Activity Log',
        'description' => 'Track all user activities',
        'tooltip'     => 'User Activities',
    ],
    'event' => [
        ''         => 'Other',
        'created'  => 'Created',
        'deleted'  => 'Deleted',
        'updated'  => 'Updated',
        'restored' => 'Restored',
    ],
    'view'                => 'View',
    'edit'                => 'Edit',
    'restore'             => 'Restore',
    'restore_soft_delete' => [
        'label'             => 'Restore Model',
        'modal_heading'     => 'Restore Deleted Model',
        'modal_description' => 'This will restore the model that was deleted (soft delete).',
    ],
];
