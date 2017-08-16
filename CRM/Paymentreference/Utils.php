<?php
/**
 * @author Klaas Eikelbooml (CiviCooP) <klaas.eikelboom@civicoop.org>
 * @date 14-6-17 17:58
 * @license AGPL-3.0
 *
 */
class CRM_Paymentreference_Utils {

  public static function paymentReference($account,$cid){

      $factor = array(2, 4, 8, 5, 10, 9, 7, 3, 6, 1, 2, 4, 8, 5, 10, 9, 7, 3, 6, 1);
      $reference = $account.str_pad($cid, 15-strlen($account), '0', STR_PAD_LEFT);
      $sum=0;
      for($i=1;$i<=15;$i++){
        $sum += substr($reference,-$i,1)*$factor[$i-1];
      }

    $check = 11 - ($sum % 11);
    if ($check == 10) {
      $check = '1';
    } elseif ($check == 11) {
      $check = '0';
    }

    return $check.$reference;

  }
}