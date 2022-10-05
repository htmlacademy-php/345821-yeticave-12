USE yeticave; -- подключение к базе данных

INSERT INTO categories (cat_id, cat_name)
VALUES ('boards', 'Доски и лыжи'),
       ('attachment', 'Крепления'),
       ('boots', 'Ботинки'),
       ('clothing', 'Одежда'),
       ('tools', 'Инструменты'),
       ('other', 'Разное');
-- заполнение таблицы категорий

INSERT INTO users(email, name, password, contacts)
VALUES ('ignat-88@bk.ru', 'Ignat', 'Qwerty15', '89100136555'),
       ('test@mail.ru', 'Petr', 'Asd18', '84952741001');
-- заполнение таблицы пользователей

INSERT INTO lots (name, description, img_link, start_price, end_date, bet_step, created_by, category_id, win_user_id)
VALUES ('2014 Rossignol District Snowboard', 'сноуборд', 'img/lot-1.jpg', '10999', '2022-08-23', '500', '1', '1', '2'),
       ('DC Ply Mens 2016/2017 Snowboard', 'сноуборд', 'img/lot-2.jpg', '159999', '2022-08-25', '500', '2', '1', '1'),
       ('Крепления Union Contact Pro 2015 года размер L/XL', 'крепление новое', 'img/lot-3.jpg', '8000', '2022-08-30',
        '500', '2', '2', '1'),
       ('Ботинки для сноуборда DC Mutiny Charocal', 'боты удобные фиксируют стопу', 'img/lot-4.jpg', '10999',
        '2022-06-01', '500', '1', '3', '2'),
       ('Куртка для сноуборда DC Mutiny Charocal', 'куртка класс', 'img/lot-5.jpg', '7500', '2022-08-29', '500', '1',
        '4', '2'),
       ('Маска Oakley Canopy', 'маска защищает от ветра и снега', 'img/lot-6.jpg', '5400', '2022-08-10', '500', '2',
        '6', '1');
-- заполнение таблицы объявлений

INSERT INTO bet (price, user_id, lot_id)
VALUES ('8000', '1', '5'),
       ('8500', '2', '3');
-- заполнение таблицы ставок

SELECT *
FROM lots;
-- получить все категории

SELECT l.name, l.start_price, l.img_link, MAX(b.price) AS max_price, c.cat_name
FROM lots l
LEFT JOIN bet b ON l.id = b.lot_id
JOIN categories c ON l.category_id = c.id
WHERE l.end_date > NOW()
GROUP BY l.id;
-- получить список открытых лотов

SELECT l.name,
       description,
       img_link,
       start_price,
       end_date,
       bet_step,
       created_by,
       cat_name
FROM lots l
       JOIN categories c ON category_id = c.id
WHERE l.id = 3;
-- показать лот по его ID

UPDATE lots
SET name = 'DC Ply Mens 2017/2018 Snowboard'
WHERE id = 2;
-- обновление название лота

SELECT b.price
FROM bet b
WHERE b.lot_id = 5
ORDER BY b.created_at DESC;
-- получить список ставок для лота по его идентификатору с сортировкой по дате.
