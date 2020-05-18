#!/bin/sh -l

apt-get update
apt-get install -y git
git reset --hard HEAD

php vendor/bin/sami.php update .github/actions/docs/sami.php
