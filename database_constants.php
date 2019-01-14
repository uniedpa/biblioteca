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
define('OBIB_HOST',     getenv('OBIB_HOST'));//el servidor Normalmente localhost
define('OBIB_DATABASE', getenv('OBIB_DATABASE'));// La base de datos donde guardan sus datos las tablas.
define('OBIB_USERNAME', getenv('OBIB_USERNAME'));// El usuario para mysql
define('OBIB_PWD',      getenv('OBIB_PWD'));//el password sin encriptar

/*********************************************************************************
 *  /\                                                                      /\
 *  ||                                                                      ||
 *********************************************************************************
 */
?>
