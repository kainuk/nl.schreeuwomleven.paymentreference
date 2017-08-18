<?php
// This file declares a managed database record of type "Job".
// The record will be automatically inserted, updated, or deleted from the
// database as appropriate. For more details, see "hook_civicrm_managed" at:
// http://wiki.civicrm.org/confluence/display/CRMDOC42/Hook+Reference
return array (
  0 => 
  array (
    'name' => 'Cron:Job.UpdatePaymentReference',
    'entity' => 'Job',
    'params' => 
    array (
      'version' => 3,
      'name' => 'Call Job.UpdatePaymentReference API',
      'description' => 'Call Job.UpdatePaymentReference API',
      'run_frequency' => 'Daily',
      'api_entity' => 'Job',
      'api_action' => 'update_payment_reference',
      'parameters' => '',
      'is_active'  => 0
    ),
  ),
);
