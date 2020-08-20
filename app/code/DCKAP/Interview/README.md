#Module DCKAP Interview

    ``dckap/module-interview``

 - [Magento platform compatibility](#markdown-header-main-compatibility)
 - [Installation](#markdown-header-installation)
 - [Specifications](#markdown-header-specifications)

## Magento platform compatibility
  - Open Source (CE): 2.3.3, 2.3.4

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/DCKAP`
 - Enable the module by running `php bin/magento module:enable DCKAP_Interview`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require dckap/module-interview`
 - enable the module by running `php bin/magento module:enable DCKAP_Interview`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Specifications

 - Controller
	- frontend > interview/index/index

 - Controller
	- adminhtml > dckap_interview/index/index
