<?php

use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$projectRoot = realpath(__DIR__ . '/../../..');

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('vendor')
    ->exclude('tests')
    ->in($projectRoot);

$versions = GitVersionCollection::create($projectRoot)
    ->addFromTags(function($tag) {
        return 0 === strpos($tag, 'v2.') && false === strpos($tag, 'RC');
    })
    ->add('main', 'main branch');

return new Sami($iterator, [
    'title' => 'Google APIs Client Library for PHP API Reference',
    'build_dir' => $projectRoot . '/.docs/%version%',
    'cache_dir' => $projectRoot . '/.cache/%version%',
    'remote_repository' => new GitHubRemoteRepository('googleapis/google-api-php-client', $projectRoot),
    'versions' => $versions
]);
