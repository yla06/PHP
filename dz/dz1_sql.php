<?php

//добавляєм 4 одногрупників
/* 
 INSERT INTO `students_group` (`students_id`, `students_surname`, `students_name`, `students_birthday`) 
 VALUES (6, 'Панасюк', 'Руслан', '1988-07-01'), (7, 'Пелюх', 'Виталий', '1987-01-26'), 
 (8, 'Иваненко', 'Роман', '1989-02-15'), (9, 'Самохваленко', 'Игорь', '1987-05-12');
 */

//добавляєм 1 строку для студента, який більше не навчається 
/*
INSERT INTO `students_group` SET `students_id` = 10, `students_surname` = 'Сауляк', 
`students_name` = 'Ирина', `students_birthday` = '1989-03-18';
 */


//використовуючи UPDATE міняємо дату народження
/*
 UPDATE `students_group` SET `students_group`.`students_birthday` = '2017-07-14'
 WHERE `students_group`.`students_id` = 2;
 */


//удаляєм строку
/*
DELETE FROM `students_group` WHERE `students_name` = 'Ирина' AND `students_surname` = 'Сауляк';
 */

// SELECT * FROM `students_group` WHERE `students_id` = 2

//SELECT `students_surname` FROM `students_group` ORDER BY `students_birthday` DESC, `students_surname` DESC

// UPDATE `students_group` SET `students_group`.`students_main` = '1'  WHERE `students_group`.`students_id` = 5;


//Робота на парі
// DELETE  FROM `table` WHERE `id` >=100 AND `id`<=1000

//DELETE  FROM `table` WHERE `id` BETWEEN 100 AND 1000

// DELETE  FROM `table` WHERE `id` NOT IN (10,11,12)

// DELETE  FROM `table` WHERE `id` != 10




