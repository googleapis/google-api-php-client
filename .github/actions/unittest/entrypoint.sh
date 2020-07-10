#!/bin/sh -l

apt-get update && \
apt-get install -y --no-install-recommends \
    git \
    zip \
    curl \
    unzip \
    wget

curl --silent --show-error https://getcomposer.org/installer | php
php composer.phar self-update

echo "---Installing dependencies ---"
echo "Removing cache/filesystem-adapter for PHP 5.4"
bash -c "if [[ $(php -r 'echo PHP_VERSION;') =~ \"5.4\" ]]; then php composer.phar remove --dev cache/filesystem-adapter; fi"
echo ${composerargs}
php $(dirname $0)/retry.php "php composer.phar update $composerargs"

echo "---Running unit tests ---"
vendor/bin/phpunit
