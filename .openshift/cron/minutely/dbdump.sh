#!/bin/bash
if [ `date +%H:%M` == "23:59" ]
then
	mysqldump -u $OPENSHIFT_MYSQL_DB_USERNAME  -p$OPENSHIFT_MYSQL_DB_PASSWORD biblioteca -h $OPENSHIFT_MYSQL_DB_HOST | gzip -> $OPENSHIFT_DATA_DIR/Dropbox/sistema/base-de-datos/mysqldump-servidor-$(date +%Y-%m-%d-%H.%M.%S).gz
fi
