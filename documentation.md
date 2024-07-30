## How To

- register user : 127.0.0.1:8000/api/register (method post, body json { "name": "cek", "email": "cek@example.com", "password": "password123", "password_confirmation": "password123" } )
- get bearer token : 127.0.0.1:8000/api/login (method post, form data : email:test@mail.com, password:12345678)
- store data pakaian : 127.0.0.1:8000/api/pakaian (method post, auth bearer token, body json { "jenis": "Adidas", "merk": "Adidas" })
- get data pakaian : 127.0.0.1:8000/api/pakaian (method get, auth bearer token)
- get data pakaian tanpa auth : 127.0.0.1:8000/api/pakaian-no-auth (method get, no auth)
- update data pakaian : 127.0.0.1:8000/api/pakaian/{id} (method put, auth bearer token, body json { "jenis": "Adidas", "merk": "Adidas" })
- update data pakaian : 127.0.0.1:8000/api/pakaian/{id} (method delete, auth bearer token)

- command display pakaian list : php artisan app:display-pakaian-data
- greeting and save log : http://127.0.0.1:8000/greetings
- only grreting : http://127.0.0.1:8000/pakaian
- get sentences : http://127.0.0.1:8000/rahman

### Database

    - Backup Database
        - Buka Terminal
            Pastikan Anda memiliki akses ke terminal dan hak akses root
        - login ke mariadb
            mysql -u root -p dan masukan password jika diminta
        - pilih database
        - backup database
            mysqldump -u username -p pakaian > backup_pakaian.sql

    - Restore Database
        - Buka Terminal
            Pastikan Anda memiliki akses ke terminal dan hak akses root
        - login ke mariadb
            mysql -u root -p dan masukan password jika diminta
        - buat database baru
            CREATE DATABASE pakaian;
        - restore database
            mysql -u username -p pakaian < backup_pakaian.sql
    
    - DDL
        CREATE TABLE pakaian (
            id INT AUTO_INCREMENT PRIMARY KEY,
            jenis VARCHAR(255) NOT NULL,
            merk VARCHAR(255) NOT NULL
        );

    - SP CREATE ( CALL CreatePakaian('Kaos', 'Adidas'); )
        DELIMITER //

        CREATE PROCEDURE CreatePakaian(
            IN p_jenis VARCHAR(255),
            IN p_merk VARCHAR(255)
        )
        BEGIN
            INSERT INTO pakaian (jenis, merk) VALUES (p_jenis, p_merk);
        END //

        DELIMITER ;

    - SP READ ( CALL GetAllPakaian(); )
        DELIMITER //

        CREATE PROCEDURE GetAllPakaian()
        BEGIN
            SELECT * FROM pakaian;
        END //

        DELIMITER ;

    - SP UPDATE ( CALL UpdatePakaian(1, 'Kaos', 'Nike'); )
        DELIMITER //

        CREATE PROCEDURE UpdatePakaian(
            IN p_id BIGINT UNSIGNED,
            IN p_jenis VARCHAR(255),
            IN p_merk VARCHAR(255)
        )
        BEGIN
            UPDATE pakaian
            SET jenis = p_jenis, merk = p_merk
            WHERE id = p_id;
        END //

        DELIMITER ;

    - SP DELETE ( CALL DeletePakaian(1); )
        DELIMITER //

        CREATE PROCEDURE DeletePakaian(
            IN p_id BIGINT UNSIGNED
        )
        BEGIN
            DELETE FROM pakaian WHERE id = p_id;
        END //

        DELIMITER ;

    - BUAT TABLE HISTORI
        CREATE TABLE pakaian_histories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            table_name VARCHAR(255) NOT NULL,
            record_id INT NOT NULL,
            action ENUM('insert', 'update', 'delete') NOT NULL,
            old_data TEXT,
            new_data TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );

    - TRIGGER ON INSERT
        DELIMITER //

        CREATE TRIGGER after_pakaian_insert
        AFTER INSERT ON pakaian
        FOR EACH ROW
        BEGIN
            INSERT INTO pakaian_histories (table_name, record_id, action, new_data)
            VALUES ('pakaian', NEW.id, 'insert', CONCAT('{"jenis": "', NEW.jenis, '", "merk": "', NEW.merk, '"}'));
        END //

        DELIMITER ;

    - TRIGGER ON UPDATE
        DELIMITER //

        CREATE TRIGGER after_pakaian_update
        AFTER UPDATE ON pakaian
        FOR EACH ROW
        BEGIN
            INSERT INTO pakaian_histories (table_name, record_id, action, old_data, new_data)
            VALUES (
                'pakaian',
                OLD.id,
                'update',
                CONCAT('{"jenis": "', OLD.jenis, '", "merk": "', OLD.merk, '"}'),
                CONCAT('{"jenis": "', NEW.jenis, '", "merk": "', NEW.merk, '"}')
            );
        END //

        DELIMITER ;

    - TRIGGER ON DELETE
        DELIMITER //

        CREATE TRIGGER after_pakaian_delete
        AFTER DELETE ON pakaian
        FOR EACH ROW
        BEGIN
            INSERT INTO pakaian_histories (table_name, record_id, action, old_data)
            VALUES (
                'pakaian',
                OLD.id,
                'delete',
                CONCAT('{"jenis": "', OLD.jenis, '", "merk": "', OLD.merk, '"}')
            );
        END //

        DELIMITER ;

    - Query CTE
        ;WITH CTE_Pakaian AS (
            SELECT id, jenis, merk
            FROM pakaian
        )
        SELECT *
        FROM CTE_Pakaian;
