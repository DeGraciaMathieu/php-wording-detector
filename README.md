<p align="center">
<img src="https://github.com/DeGraciaMathieu/php-smelly-code-detector/blob/master/arts/robot.png" width="250">
</p>

![Packagist Version](https://img.shields.io/packagist/v/degraciamathieu/php-wording-detector)
![Packagist PHP Version](https://img.shields.io/packagist/dependency-v/degraciamathieu/php-wording-detector/php)

# php-wording-detector
## Installation
Requires >= PHP 8.1
```
composer require degraciamathieu/php-wording-detector --dev
```
## Usage
```
php php-wording-detector inspect {path}
```
```
$ php php-wording-detector inspect app
❀ PHP Wording Detector ❀
+-------------+-----------------------+-------------+
| total words | total distincts words | average use |
+-------------+-----------------------+-------------+
| 676         | 81                    | 8           |
+-------------+-----------------------+-------------+
+------------+-------+-------------+
| words      | usage | pourcentage |
+------------+-------+-------------+
| request    | 95    | 14%         |
| user       | 81    | 12%         |
| alert      | 42    | 6%          |
| topic      | 28    | 4%          |
| post       | 25    | 4%          |
| query      | 22    | 3%          |
| url        | 21    | 3%          |
| creators   | 20    | 3%          |
| notifiable | 15    | 2%          |
| posts      | 14    | 2%          |
| config     | 13    | 2%          |
| categories | 13    | 2%          |
| comment    | 13    | 2%          |
| model      | 12    | 2%          |
| category   | 11    | 2%          |
| value      | 10    | 1%          |
| inputs     | 10    | 1%          |
| css        | 9     | 1%          |
| container  | 8     | 1%          |
| path       | 8     | 1%          |
+------------+-------+-------------+
```
