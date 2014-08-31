Secure Mysql
===========

Magento module for securing connections to MySQL

## What it Does ##

Adds the ability to connect a Magento site to MySQL via SSL. It will require configuration both on
the MySQL side (to ensure the server is configured to accept SSL connections) and on the Magento side (to specify
the certificate path(s) and use a new DB adapter

## How it Works ##

At it's simplest, there are two parts to the getting up and running:

1.  A new DB Adapter (inheriting from Magento's standard Varien_Db_Adapter_Pdo_Mysql) that knows how to specify the
    PDO constants for MySQL SSL connections

2.  Changes to local.xml to provide the necessary info:
    +  Change the default DB adapter to be the new adapter
    +  Specify the certificate path(s) that should be used to connect to MySQL

## WARNING - Here there be dragons ##

Given that changes to local.xml are required, this would be considered an advanced module. Testing in a development
environment ahead of time so that you understand what is happening, and what changes are required, is highly recommended.


