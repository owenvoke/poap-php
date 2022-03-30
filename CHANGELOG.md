# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com), and this project adheres to [Semantic Versioning](https://semver.org).

## Unreleased

## [v1.5.0 - 2022-03-30](https://github.com/owenvoke/poap-php/compare/v1.4.0...v1.5.0)

### Added
- Add support for checking token claim status ([#4](https://github.com/owenvoke/poap-php/pull/4) by [@khag7](https://github.com/khag7))

## [v1.4.0 - 2021-11-28](https://github.com/owenvoke/poap-php/compare/v1.3.0...v1.4.0)

### Added
- Add support for receiving Event codes ([6d5fc1b](https://github.com/owenvoke/poap-php/commit/6d5fc1b9a92b22064a8d1c83cb3b10d5e7c5ec6d))

### Changed
- Update the POAP API base URI ([fbf7632](https://github.com/owenvoke/poap-php/commit/fbf76322d244f063c71c045f54df5b98567a4d23))

## [v1.3.0 - 2021-11-08](https://github.com/owenvoke/poap-php/compare/v1.2.1...v1.3.0)

### Added
- Add support for Checkout endpoints ([5dd16fd](https://github.com/owenvoke/poap-php/commit/5dd16fdba332f34939de77e56e4ef7bb02f79dc8))
- Add support for Queue endpoints ([7a016d9](https://github.com/owenvoke/poap-php/commit/b7a016d9f22658e252c7aa04cd71934d37a693bf))
- Add support for checking whether an account owns an event token ([5dd16fd](https://github.com/owenvoke/poap-php/commit/5dd16fdba332f34939de77e56e4ef7bb02f79dc8))
- Add support for Migration endpoints ([e5211ca](https://github.com/owenvoke/poap-php/commit/e5211cada54ed8482f7668bca849119643fa37d0))

### Changed
- Revert `e8c2508` and use `Bearer` identifier for `Authorization` header ([593d2d8](https://github.com/owenvoke/poap-php/commit/593d2d883553a7e88858df82e90f2443777850b6))

## [v1.2.1 - 2021-11-02](https://github.com/owenvoke/poap-php/compare/v1.2.0...v1.2.1)

### Changed
- Update dependencies ([3703622](https://github.com/owenvoke/poap-php/commit/3703622f732841a7ddeb76b3112b18a4a62871bb))
- Update `Authorization` header to not use `Bearer` identifier ([e8c2508](https://github.com/owenvoke/poap-php/commit/e8c2508818670181ff19955581a9a21262bdc00b))

## [v1.2.0 - 2021-10-14](https://github.com/owenvoke/poap-php/compare/v1.1.0...v1.2.0)

### Added
- Add support for creating new Events ([#2](https://github.com/owenvoke/poap-php/pull/2))

## [v1.1.0 - 2021-09-21](https://github.com/owenvoke/poap-php/compare/v1.0.0...v1.1.0)

### Added
- Add a new `Token::getClaimSecret()` method ([`87cfecb`](https://github.com/owenvoke/poap-php/commit/87cfecbef6478150548ee00fde8f05dab3054139))

## v1.0.0 - 2021-09-20

### Added
- Initial release
