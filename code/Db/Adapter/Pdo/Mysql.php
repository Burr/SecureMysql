<?php
/**
 *
 * New adapter class to enhance the built in Varien Pdo MySQL Adapter
 * to allow for passing in the SSL parameters.
 */
class Bazmod_SecureMysql_Db_Adapter_Pdo_Mysql extends Varien_Db_Adapter_Pdo_Mysql
{
    const CONFIG_DRIVER_OPTIONS = 'driver_options';
    const CONFIG_SSL_KEY = 'ssl_key';
    const CONFIG_SSL_CERT = 'ssl_cert';

    /**
     * Contains a key with the name we are expecting in the XML
     * with the value being the key we should use to pass to the PDO constructor
     */
    var $_paramsToRename = array(
        'ssl_cert'  => Pdo::MYSQL_ATTR_SSL_CERT,
        'ssl_key'   => Pdo::MYSQL_ATTR_SSL_KEY,
        'ssl_ca'    => Pdo::MYSQL_ATTR_SSL_CA
    );

    /**
     * We have to override the constructor in order to inject the SSL params
     *
     * @param array|Zend_Config $config
     */
    public function __construct($config)
    {
        // ignore if not specified in configuration
        if (isset($config[self::CONFIG_DRIVER_OPTIONS]))
        {
            foreach ($config[self::CONFIG_DRIVER_OPTIONS] as $xmlKey => $optionValue)
            {
                if (isset($this->_paramsToRename[$xmlKey]))
                {
                    $config[self::CONFIG_DRIVER_OPTIONS][$this->_paramsToRename[$xmlKey]] = $optionValue;
                }
            }
            /*
            if (isset([self::CONFIG_SSL_CERT]))
            {
                $config[self::CONFIG_DRIVER_OPTIONS][Pdo::MYSQL_ATTR_SSL_CERT] = $config[self::CONFIG_DRIVER_OPTIONS][self::CONFIG_SSL_CERT];
            }

            if (isset($config[self::CONFIG_DRIVER_OPTIONS][self::CONFIG_SSL_KEY]))
            {
                $config[self::CONFIG_DRIVER_OPTIONS][Pdo::MYSQL_ATTR_SSL_KEY] = $config[self::CONFIG_DRIVER_OPTIONS][self::CONFIG_SSL_KEY];
            }
            */
        }

        parent::__construct($config);
    }

    public function query($sql, $bind = array())
    {
        return parent::query($sql, $bind); // TODO: Change the autogenerated stub
    }


}