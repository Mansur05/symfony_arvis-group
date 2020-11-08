## Test task by Arvis Group (Getchips)
Есть главное предприятие, у него три (и больше) филиала, в каждом филиале некоторое количество работников, работники делятся на ИТР и рядовых сотрудников.

Нужно сделать программу, которая:
- Выдает список всех филиалов, у каждого кнопка подробнее
- При нажатии на Подробнее открывается список сотрудников филиала и информация о филиале, список отсортирован алфавитно, с указанием должности.

Для этого:
- Нужно создать БД, просто sql код или UML схема
- Написать программу на PHP
- Написать вывод на экран

Плюсом будет, но не обязательно
- Написание классов PHPUnit
- Документирование кода
- Вывод информации о филиалах и сотрудниках без перезагрузки экрана

## Get start
git clone

composer install

php bin/console doctrine:migrations:migrate

php bin/console doctrine:fixtures:load

php bin/phpunit