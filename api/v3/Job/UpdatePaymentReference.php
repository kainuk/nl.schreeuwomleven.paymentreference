<?php

/**
 * Job.UpdatePaymentReference API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_job_update_payment_reference_spec(&$spec) {
}

/**
 * Job.UpdatePaymentReference API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_job_update_payment_reference($params) {

  if (!isset($params['step'])) {
    $params['step'] = 100;
  }

  $total = CRM_Core_DAO::singleValueQuery('SELECT count(1) FROM civicrm_contact WHERE is_deleted=0');

  $customFieldId = civicrm_api3('CustomField', 'getvalue', [
    'name' => 'paymentReference',
    'return' => 'id',
  ]);

  $count = 0;
  $offset = 0;

  while ($offset < $total) {
    $sql = 'SELECT id FROM civicrm_contact WHERE is_deleted=0 LIMIT %1 OFFSET %2';
    $dao = CRM_Core_DAO::executeQuery($sql, [
      '1' => [$params['step'], 'Integer'],
      '2' => [$offset, 'Integer'],
    ]);
    while ($dao->fetch()) {
      $cid = $dao->id;
      civicrm_api3('Contact', 'create', [
        'id' => $cid,
        'custom_' . $customFieldId => CRM_Paymentreference_Utils::paymentReference(8100, $cid),
      ]);
      $count++;
    }
    CRM_Core_DAO::freeResult();
    $offset += $params['step'];
  }

  $returnValues = array('nr updates' => $count, 'step' => $params['step']);
  return civicrm_api3_create_success($returnValues, $params, 'Job', 'UpdatePaymentReference');

}
