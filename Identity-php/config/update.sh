#!/bin/bash
####################
# Stefano Beccalli #
# upload.sh - 1.0  #
####################
REPOSITORY_NAME=identity-manager-php.git

##########################
#VARIABILE DA MODIFICARE
##########################
SCRIPT=`realpath $0`
PRIVATE_DIR=`dirname $SCRIPT`/
GIT_DIR=$PRIVATE_DIR'GIT/'
DOCUMENT_ROOT=$(dirname $PRIVATE_DIR)'/web/'
UNIX_USER=$(stat -c "%U" $DOCUMENT_ROOT)
UNIX_GROUP=$(stat -c "%G" $DOCUMENT_ROOT)

if [ ! -d "$GIT_DIR" ]; then
        mkdir -p $GIT_DIR
            cd $GIT_DIR
                echo "INIZIALIZZO REPOSITORY GIT.."
                    git init
                        git remote add origin git@github.com:informaticatrentina/$REPOSITORY_NAME
                            sleep 2
                        fi
                        cd $GIT_DIR
                        (echo "FORCE SYNC WITH GITHUB.."; git fetch --all; git reset --hard origin/master; echo "SYNC DOCUMENT_ROOT.."; /usr/bin/rsync -rtvu --exclude '.git' --exclude 'applica-tion/config/database.php' --exclude 'stats'  --delete $GIT_DIR $DOCUMENT_ROOT);
                        cp $PRIVATE_DIR/config.php $DOCUMENT_ROOT'/application/config'
                        cp $PRIVATE_DIR/mongo_db.php $DOCUMENT_ROOT'/application/config'
                        echo "IMPOSTAZIONI PERMESSI IN CORSO.."
                        /bin/chown -R $UNIX_USER:$UNIX_GROUP $DOCUMENT_ROOT
                        /usr/bin/find $DOCUMENT_ROOT -type f -exec chmod 644 {} \;
                        /usr/bin/find $DOCUMENT_ROOT -type d -exec chmod 755 {} \;
                        echo "SYNC COMPLETATA CON SUCCESSO."
