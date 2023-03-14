<p align="center">
<img src="https://github.com/DeGraciaMathieu/php-smelly-code-detector/blob/master/arts/robot.png" width="250">
</p>

[![testing](https://github.com/DeGraciaMathieu/php-wording-detector/actions/workflows/phpunit.yml/badge.svg)](https://github.com/DeGraciaMathieu/php-wording-detector/actions/workflows/phpunit.yml)
![Packagist Version](https://img.shields.io/packagist/v/degraciamathieu/php-wording-detector)
![Packagist PHP Version](https://img.shields.io/packagist/dependency-v/degraciamathieu/php-wording-detector/php)

# php-wording-detector

Simple tool to analyze and split the words contained in your variables to check your DDD approach.

# Installation

```
Requires >= PHP 8.1
```

## Phar
This tool is distributed as a [PHP Archive (PHAR)](https://www.php.net/phar):

```
wget https://github.com/DeGraciaMathieu/php-wording-detector/raw/master/builds/php-wording-detector
```

```
php php-wording-detector --version
```

## Composer
Alternately, you can directly use composer :

```
composer require degraciamathieu/php-wording-detector --dev
```
# Usage
```
php php-wording-detector inspect {path}
```
```
$ php php-wording-detector inspect app/Domains/Activity
❀ PHP Wording Detector ❀
+-------------+-----------------------+-------------+
| total words | total distincts words | average use |
+-------------+-----------------------+-------------+
| 2'166       | 52                    | 42          |
+-------------+-----------------------+-------------+
+--------------+-------+------------+
| words        | usage | percentage |
+--------------+-------+------------+
| activity     | 667   | 31%        |
| data         | 154   | 7%         |
| code         | 150   | 7%         |
| item         | 143   | 7%         |
| query        | 128   | 6%         |
| request      | 88    | 4%         |
| mode         | 85    | 4%         |
| translations | 78    | 4%         |
| id           | 77    | 4%         |
| type         | 63    | 3%         |
| new          | 46    | 2%         |
| product      | 41    | 2%         |
| translation  | 41    | 2%         |
| types        | 40    | 2%         |
| master       | 33    | 2%         |
| filters      | 29    | 1%         |
| language     | 24    | 1%         |
| builder      | 23    | 1%         |
| items        | 22    | 1%         |
| section      | 21    | under 1%   |
+--------------+-------+------------+
```
