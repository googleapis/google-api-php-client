# Changelog

## [2.15.1](https://github.com/googleapis/google-api-php-client/compare/v2.15.0...v2.15.1) (2023-09-12)


### Bug Fixes

* Upgrade min phpseclib version ([#2499](https://github.com/googleapis/google-api-php-client/issues/2499)) ([8e7fae2](https://github.com/googleapis/google-api-php-client/commit/8e7fae2b79cfc1b72026347abf6314d91442a018))

## [2.15.0](https://github.com/googleapis/google-api-php-client/compare/v2.14.0...v2.15.0) (2023-05-18)


### Features

* Add pkce support and upgrade examples ([#2438](https://github.com/googleapis/google-api-php-client/issues/2438)) ([bded223](https://github.com/googleapis/google-api-php-client/commit/bded223ece445a6130cde82417b20180b1d6698a))
* Drop support for 7.3 and below ([#2431](https://github.com/googleapis/google-api-php-client/issues/2431)) ([c765b37](https://github.com/googleapis/google-api-php-client/commit/c765b379e95ab272b6a87aa802d9f5507eaeb2e7))

## [2.14.0](https://github.com/googleapis/google-api-php-client/compare/v2.13.2...v2.14.0) (2023-05-11)


### Features

* User-supplied query params for auth url ([#2432](https://github.com/googleapis/google-api-php-client/issues/2432)) ([74a7d7b](https://github.com/googleapis/google-api-php-client/commit/74a7d7b838acb08afc02b449f338fbe6577cb03c))

## [2.13.2](https://github.com/googleapis/google-api-php-client/compare/v2.13.1...v2.13.2) (2023-03-23)


### Bug Fixes

* Calling class_exists with null in Google\Model ([#2405](https://github.com/googleapis/google-api-php-client/issues/2405)) ([5ed4edc](https://github.com/googleapis/google-api-php-client/commit/5ed4edc9315110a715e9763d27ee6761e1aaa00a))

## [2.13.1](https://github.com/googleapis/google-api-php-client/compare/v2.13.0...v2.13.1) (2023-03-13)


### Bug Fixes

* Allow dynamic properties on model classes ([#2408](https://github.com/googleapis/google-api-php-client/issues/2408)) ([11080d5](https://github.com/googleapis/google-api-php-client/commit/11080d5e85a040751a13aca8131f93c7d910db11))

## [2.13.0](https://github.com/googleapis/google-api-php-client/compare/v2.12.6...v2.13.0) (2022-12-19)


### Features

* Make auth http client config extends from default client config ([#2348](https://github.com/googleapis/google-api-php-client/issues/2348)) ([2640250](https://github.com/googleapis/google-api-php-client/commit/2640250c7bab479f378972733dcc0a3e9b2e14f8))


### Bug Fixes

* Don't send content-type header if no post body exists ([#2288](https://github.com/googleapis/google-api-php-client/issues/2288)) ([654c0e2](https://github.com/googleapis/google-api-php-client/commit/654c0e29ab78aba8bfef52fd3d06a3b2b39c4e0d))
* Ensure new redirect_uri propogates to OAuth2 class ([#2282](https://github.com/googleapis/google-api-php-client/issues/2282)) ([a69131b](https://github.com/googleapis/google-api-php-client/commit/a69131b6488735d112a529a278cfc8b875e18647))
* Lint errors ([#2315](https://github.com/googleapis/google-api-php-client/issues/2315)) ([88cc63c](https://github.com/googleapis/google-api-php-client/commit/88cc63c38b0cf88629f66fdf8ba6006f6c6d5a2c))
* Update accounts.google.com authorization URI ([#2275](https://github.com/googleapis/google-api-php-client/issues/2275)) ([b2624d2](https://github.com/googleapis/google-api-php-client/commit/b2624d21fce894126b9975a872cf5cda8038b254))
