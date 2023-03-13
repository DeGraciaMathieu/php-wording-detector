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
$ php php-wording-detector inspect app
❀ PHP Wording Detector ❀
+-------------+-----------------------+-------------+
| total words | total distincts words | average use |
+-------------+-----------------------+-------------+
| 18'363      | 560                   | 33          |
+-------------+-----------------------+-------------+
+--------------+-------+-------------+
| words        | usage | pourcentage |
+--------------+-------+-------------+
| user         | 1629  | 9%          |
| activity     | 1150  | 6%          |
| exam         | 925   | 5%          |
| organization | 671   | 4%          |
| mode         | 460   | 3%          |
| data         | 416   | 2%          |
| code         | 383   | 2%          |
| builder      | 368   | 2%          |
| part         | 351   | 2%          |
| item         | 350   | 2%          |
| license      | 308   | 2%          |
| request      | 296   | 2%          |
| subscription | 289   | 2%          |
| id           | 228   | 1%          |
| answers      | 225   | 1%          |
| coupon       | 214   | 1%          |
| question     | 200   | 1%          |
| exception    | 182   | under 1%    |
| current      | 161   | under 1%    |
| count        | 160   | under 1%    |
+--------------+-------+-------------+
```
