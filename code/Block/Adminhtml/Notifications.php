<?php
/**
 *
 */
class Bazmod_SecureMysql_Block_Adminhtml_Notifications extends Mage_Adminhtml_Block_Template
{
    /**
     * Indicates whether to show a warning to the admin user when the connection is not secure.
     *
     * @return bool
     */
    public function showWarning()
    {
        return
            Mage::getStoreConfig('system/securemysql/warningenabled')
            && !$this->helper('securemysql')->isConnectionSecure();
    }
}