#!/bin/bash
#if [ `date +%H:%M` == "23:59" ]
#then
	timestamp=$(date +%Y-%m-%d-%H.%M.%S)
#	mysqldump -u $OPENSHIFT_MYSQL_DB_USERNAME  -p$OPENSHIFT_MYSQL_DB_PASSWORD biblioteca -h $OPENSHIFT_MYSQL_DB_HOST | gzip -> $OPENSHIFT_DATA_DIR/Dropbox/sistema/base-de-datos/mysqldump-servidor-$timestamp.gz
#	$OPENSHIFT_DATA_DIR/Dropbox-Uploader/dropbox_uploader.sh upload $OPENSHIFT_DATA_DIR/Dropbox/sistema/base-de-datos/mysqldump-servidor-$timestamp.gz
#fa
echo $timestamp >> ${OPENSHIFT_PHP_LOG_DIR}/dbdump.log 
