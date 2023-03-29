#!/bin/sh -l

set -e

apt-get update
apt-get install -y git wget

# Fix github "detected dubious ownership" error
git config --global --add safe.directory /github/workspace

git reset --hard HEAD

# Create the directories
mkdir .docs
mkdir .cache

wget https://github.com/jdpedrie/Sami/releases/download/v4.3.0/sami.phar

# Run the docs generation command
php sami.phar update .github/actions/docs/sami.php
chmod -R 0777 .
