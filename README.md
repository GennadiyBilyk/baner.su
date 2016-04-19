# baner.su
Test


1. Клон репозитория
git clone git@github.com:GennadiyBilyk/baner.su.git .

2. Зависимости
composer install

3. Создать базу данных, накатить дамп
CREATE TABLE IF NOT EXISTS `urls` (
  `id` int(11) NOT NULL,
  `url_long` varchar(1000) NOT NULL,
  `url_short` varchar(1000) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_die` date NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


4. в Файле App/Model/Base.php указать данные соеденения с mysql базой


5. Прописать в настройках сервера -  root директорию /public





