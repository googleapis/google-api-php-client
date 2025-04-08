# Changelog

## [2.18.3](https://github.com/googleapis/google-api-php-client/compare/v2.18.2...v2.18.3) (2025-04-08)


### Bug Fixes

* Convert Finder lazy iterator to array before deletion ([#2663](https://github.com/googleapis/google-api-php-client/issues/2663)) ([c699405](https://github.com/googleapis/google-api-php-client/commit/c6994051af1568359c97d267d9ef34ccbda31387))

## [2.18.2](https://github.com/googleapis/google-api-php-client/compare/v2.18.1...v2.18.2) (2024-12-16)


### Bug Fixes

* Correct type for jwt constructor arg ([#2648](https://github.com/googleapis/google-api-php-client/issues/2648)) ([31a9861](https://github.com/googleapis/google-api-php-client/commit/31a9861af02a8e9070b395f05caed7ffce0ef8be))

## [2.18.1](https://github.com/googleapis/google-api-php-client/compare/v2.18.0...v2.18.1) (2024-11-24)


### Bug Fixes

* Implicitly marking parameter  as nullable is deprecated ([#2638](https://github.com/googleapis/google-api-php-client/issues/2638)) ([de57db2](https://github.com/googleapis/google-api-php-client/commit/de57db2fdc0d56de1abbf778b28b77c3347eb3fd))

## [2.18.0](https://github.com/googleapis/google-api-php-client/compare/v2.17.0...v2.18.0) (2024-10-16)


### Features

* **docs:** Use doctum shared workflow for reference docs ([#2618](https://github.com/googleapis/google-api-php-client/issues/2618)) ([242e2cb](https://github.com/googleapis/google-api-php-client/commit/242e2cb09ad5b25b047a862b4d521037e74cae29))


### Bug Fixes

* Explicit token caching issue ([#2358](https://github.com/googleapis/google-api-php-client/issues/2358)) ([dc13e5e](https://github.com/googleapis/google-api-php-client/commit/dc13e5e3f517148d3c66d151a5ab133b7840d8fb))

## [2.17.0](https://github.com/googleapis/google-api-php-client/compare/v2.16.0...v2.17.0) (2024-07-10)


### Features

* Add logger to client constructor config ([#2606](https://github.com/googleapis/google-api-php-client/issues/2606)) ([1f47133](https://github.com/googleapis/google-api-php-client/commit/1f4713329d71111a317cda8ef8603fa1bdc88858))
* Add the protected apiVersion property ([#2588](https://github.com/googleapis/google-api-php-client/issues/2588)) ([7e79f3d](https://github.com/googleapis/google-api-php-client/commit/7e79f3d7be4811f760e19cc4a2c558e04196ec1d))

## [2.16.0](https://github.com/googleapis/google-api-php-client/compare/v2.15.4...v2.16.0) (2024-04-24)


### Features

* Add universe domain support ([#2563](https://github.com/googleapis/google-api-php-client/issues/2563)) ([35895de](https://github.com/googleapis/google-api-php-client/commit/35895ded90b507074b3430a94a5790ddd01f39f0))

## [2.15.4](https://github.com/googleapis/google-api-php-client/compare/v2.15.3...v2.15.4) (2024-03-06)


### Bug Fixes

* Updates phpseclib because of a security issue ([#2574](https://github.com/googleapis/google-api-php-client/issues/2574)) ([633d41f](https://github.com/googleapis/google-api-php-client/commit/633d41f1b65fdb71a83bf747f7a3ad9857f6d02a))

## [2.15.3](https://github.com/googleapis/google-api-php-client/compare/v2.15.2...v2.15.3) (2024-01-04)


### Bug Fixes

* Guzzle dependency version ([#2546](https://github.com/googleapis/google-api-php-client/issues/2546)) ([c270f28](https://github.com/googleapis/google-api-php-client/commit/c270f28b00594a151a887edd3cfd205594a1256a))

## [2.15.2](https://github.com/googleapis/google-api-php-client/compare/v2.15.1...v2.15.2) (2024-01-03)


### Bug Fixes

* Disallow vulnerable guzzle versions ([#2536](https://github.com/googleapis/google-api-php-client/issues/2536)) ([d1830ed](https://github.com/googleapis/google-api-php-client/commit/d1830ede17114a4951ab9e60b3b9bcd9393b8668))
* Php 8.3 deprecated get_class method call without argument ([#2509](https://github.com/googleapis/google-api-php-client/issues/2509)) ([8c66021](https://github.com/googleapis/google-api-php-client/commit/8c6602119b631e1a9da4dbe219af18d51c8dab8e))
* Phpseclib security vulnerability ([#2524](https://github.com/googleapis/google-api-php-client/issues/2524)) ([73705c2](https://github.com/googleapis/google-api-php-client/commit/73705c2a65bfc01fa6d7717b7f401b8288fe0587))

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
