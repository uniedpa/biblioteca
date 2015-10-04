<?php
/*********************************************************************************
 *
 *                           A T T E N T I O N !
 *
 *                          joanlaga@hotmail.com
 *
 *  ||  Please modify the following database connection variables to match  ||
 *  \/  the MySQL database and user that you have created for OpenBiblio.   \/
 *
 *  ||  Modifique los siguientes datos para la conecion a sus bases de datos  ||
 *  \/  Las bases de datos MySQL y el usario con privilegios para esas bases de datos deben ser crados antes de usar OpenBiblio.   \/
 *********************************************************************************
 */
define('OBIB_HOST',     getenv('OPENSHIFT_MYSQL_DB_HOST'));//el servidor Normalmente localhost
define('OBIB_DATABASE', getenv('OPENSHIFT_GEAR_NAME'));// La base de datos donde guardan sus datos las tablas.
define('OBIB_USERNAME', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));// El usuario para mysql
define('OBIB_PWD',      getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));//el password sin encriptar

/*********************************************************************************
 *  /\                                                                      /\
 *  ||                                                                      ||
 *********************************************************************************
 */
?>
