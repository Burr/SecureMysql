<?php
/**
 * SecureMysql Helper - methods to verify status
 */
class Bazmod_SecureMysql_Helper_Data extends Mage_Core_Helper_Abstract
{
    function isConnectionSecure()
    {
        $connection = Mage::getSingleton('core/resource')
                        ->getConnection('core_setup');

        $results = $connection
                        ->fetchAll("SHOW STATUS LIKE 'ssl_cipher'");

        // expectation is that we get something like:
        //array(1) { [0]=> array(2) {
            // ["Variable_name"]=> string(10) "Ssl_cipher"
            // ["Value"]=> string(18) "DHE-RSA-AES256-SHA" }
            //}

        if (is_array($results)
            && isset($results[0])
            && isset($results[0]['Value'])
        )
        {
            return !empty($results[0]['Value']);
        }

        return false;

    }
}