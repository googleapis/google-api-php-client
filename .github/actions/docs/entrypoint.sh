#!/bin/sh -l

apt-get update
apt-get install -y git
git reset --hard HEAD

# Create the directories
mkdir .docs
mkdir .cache

# Run the docs generation command
php vendor/bin/sami.php update .github/actions/docs/sami.php
