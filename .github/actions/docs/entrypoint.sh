#!/bin/sh -l

apt-get update
apt-get install -y git
git reset --hard HEAD

# Required so sami.php is available for previous versions
cp .github/actions/docs/sami.php.dist .github/actions/docs/sami.php

# Run the docs generation command
php vendor/bin/sami.php update .github/actions/docs/sami.php

cd ./.docs

git init
git config user.name "GitHub Actions"
git config user.email "actions@github.com"

git add .
git commit -m "Updating docs"
git push -q https://$GITHUB_ACTOR:$GITHUB_TOKEN@github.com/${GITHUB_REPOSITORY} HEAD:gh-pages --force
