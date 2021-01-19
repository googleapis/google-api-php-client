#!/bin/sh -l

apt-get update
apt-get install -y git wget
git reset --hard HEAD

# Create the directories
mkdir .docs
mkdir .cache

wget https://github.com/jdpedrie/Sami/releases/download/v4.3.0/sami.phar

# Run the docs generation command
php sami.phar update .github/actions/docs/sami.php
chmod -R 0777 .
