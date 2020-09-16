
DROP TABLE user;

CREATE TABLE IF NOT EXISTS `user` (

	`id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `lastname` varchar(50) NOT NULL,
    `phone` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `user` ( `id`, `name`, `lastname`, `phone`)
VALUES
( 1 ,'Mia','Koluci','077354456'),
( 2 ,'Donald','Trupm','0535464521'),
( 3 ,'Bill','Gates','999555444'),
( 4 ,'Stavre','Stavrevski','123');


CREATE TABLE IF NOT EXISTS `transactions` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
    `transaction_number` varchar(50) NOT NULL,
    `type` varchar(50) NOT NULL,
    `sum` bigint NOT NULL,
    `date` datetime NOT NULL,
    `user_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `transactions` ( `id`, `transaction_number`, `type`, `sum`, `date`, `user_id`)
VALUES
( 1, '13-125-541255-54321asd', 'deposit' , 35000 , '2019-04-01 00:00:00', 3),
( 2, '135-25145-5451-5435432', 'withdraw', 2500 , '2019-04-02 00:00:00', 3),
( 3, '13-125-541255-asd', 'withdraw' , 5000 , '2019-04-03 00:00:00', 3),
( 4, '135-25145-5451-1231', 'withdraw', 7000 , '2019-04-04 00:00:00', 3),
( 5, 'asd5-541255-asd', 'deposit' , 70000 , '2019-03-31 00:00:00', 4),
( 6, '12312asd-25145-5451-1231', 'withdraw', 30000 , '2019-04-01 00:00:00', 4);


# daj mi gi site depositi (sumata) i imeto na korisnikot koj gi napravil

SELECT
	t.*, u.*
FROM user u
RIGHT JOIN transactions t
ON u.id = t.user_id
WHERE t.type = 'deposit';


select u.*, t.*
FROM user u
INNER JOIN transactions t
ON u.id = t.user_id;


SELECT 
	count(t.sum) as suma, u.name
FROM
	transactions t ,
	user u
WHERE 
	u.id = t.user_id
#GROUP BY suma, name
;

select year(date)
FROM transactions;

SELECT max(sum)
FROM transactions
#WHERE type = 'withdraw'
GROUP BY type;

select (
SELECT max(sum) max
FROM transactions
WHERE type = 'withdraw'
) as max_withdraw,
(
SELECT max(sum) max
FROM transactions
WHERE type = 'deposit'
)  as max_deposit;



CREATE OR REPLACE VIEW max_withdraw_and_deposit
AS
select (
SELECT max(sum) max
FROM transactions
WHERE type = 'withdraw'
) as max_withdraw,
(
SELECT max(sum) max
FROM transactions
WHERE type = 'deposit'
)  as max_deposit;


select max_withdraw
from max_withdraw_and_deposit
where max_withdraw > 35000
;


