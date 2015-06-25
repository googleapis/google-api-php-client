#!/bin/bash

# make sure you ran
# composer install
# an then run:

# ./bin/php-cs-fixer.sh FILE_OR_DIR

files=`find src/ tests/ examples/ -name "*.php"`

for file in `echo $files`; do
  php bin/fix_code_standard.php $file
done
