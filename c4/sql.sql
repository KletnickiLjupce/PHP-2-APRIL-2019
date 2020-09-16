
#Function

DELIMITER ////
CREATE FUNCTION sobiranje (i1 INT, i2 INT)
RETURNS INT

BEGIN
	DECLARE i3 INT;
    DECLARE i4 INT;
    DECLARE i5 INT;
    
    SET i3 = 23;
    SET i4 = 33;
    
    SET i5 = i1 + i2 + i3 + i4;
    
    RETURN i5;
END ////
DELIMITER ;


select sobiranje( 7 , 17) as result;



DELIMITER $$
CREATE FUNCTION dodina_na_transakcija ( id INT)
RETURNS INT
BEGIN
	DECLARE godini INT;
    
    SET godini = ( SELECT YEAR( t.date ) FROM transactions t WHERE t.id = id );
    
    RETURN godini;
    
END $$
DELIMITER ;

drop FUNCTION dodina_na_transakcija;

select dodina_na_transakcija(1) as god_trans;

# PROCEDURES

DELIMITER ////
CREATE PROCEDURE sobiranje ( IN i1 INT, IN i2 INT, OUT i5 INT )
BEGIN
	DECLARE i3 INT;
    DECLARE i4 INT;
    
    SET i3 = 15;
    SET i4 = 20;
    
    SET i5 = i1 + i2 + i3 + i4;
END ////
DELIMITER ;

call sobiranje ( 3 , 2 , @izlezen);

select @izlezen as broj;


DELIMITER $$
CREATE PROCEDURE dodina_i_nedela_na_transakcija ( IN id INT , OUT godina INT , OUT nedela INT)
BEGIN
	SET godina = ( SELECT YEAR( t.date) FROM transactions t where t.id = id );
    SET nedela = ( SELECT EXTRACT( WEEK FROM t.date ) FROM transactions t WHERE t.id = id );
END $$
DELIMITER ;

call dodina_i_nedela_na_transakcija (1 , @godina , @nedela );

select @godina , @nedela;

# drop procedure dodina_i_nedela_na_transakcija;

#TRIGGER
/*
CREATE TRIGGER 'event_name' 
BEFORE / AFTER 
INSERT / UPDATE / DELETE
ON 'table_name'
FOR EACH ROW
BEGIN
	-- trigger body
END;
*/


CREATE TABLE transactions_audit (
	id INT AUTO_INCREMENT PRIMARY KEY,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    record_id INT
);


DELIMITER $$
CREATE TRIGGER before_transactions_update
BEFORE UPDATE ON transactions
FOR EACH ROW
BEGIN
	INSERT INTO transactions_audit( record_id) values ( OLD.id);
END $$
DELIMITER ;

;
#INSERT INTO transactions_audit () values ();

#drop trigger before_transactions_update;

select * from transactions_audit;

UPDATE transactions 
SET sum = 5000 
WHERE id = 1;


