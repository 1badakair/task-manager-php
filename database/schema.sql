-- 1) Buat database
CREATE DATABASE IF NOT EXISTS task_manager_php CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_general_ci;

USE task_manager_php;

-- 2) Tabel users
CREATE TABLE
    IF NOT EXISTS users (
        id INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
        UNIQUE KEY uq_users_email (email)
    ) ENGINE = InnoDB;

-- 3) Tabel tasks
CREATE TABLE
    IF NOT EXISTS tasks (
        id INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT (10) UNSIGNED NOT NULL,
        title VARCHAR(200) NOT NULL,
        status ENUM ('pending', 'in_progress', 'done') NOT NULL DEFAULT 'pending',
        priority ENUM ('low', 'medium', 'high') NOT NULL DEFAULT 'medium',
        due_date DATE NULL DEFAULT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
        KEY idx_tasks_user_id (user_id),
        CONSTRAINT fk_tasks_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB;