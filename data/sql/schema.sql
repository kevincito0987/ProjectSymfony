CREATE TABLE `alerta_medica` (`id` BIGINT AUTO_INCREMENT, `pais_id` BIGINT NOT NULL, `descripcion` LONGTEXT NOT NULL, `nivel_riesgo` VARCHAR(255) DEFAULT 'Bajo', INDEX `pais_id_idx` (`pais_id`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `continente` (`id` BIGINT AUTO_INCREMENT, `nombre` VARCHAR(100) NOT NULL, PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `pais_salud` (`id` BIGINT AUTO_INCREMENT, `continente_id` BIGINT NOT NULL, `nombre` VARCHAR(100) NOT NULL, `casos_totales` BIGINT, `muertes` BIGINT, `codigo_iso` VARCHAR(10) UNIQUE, INDEX `continente_id_idx` (`continente_id`), PRIMARY KEY(`id`)) ENGINE = INNODB;
ALTER TABLE `alerta_medica` ADD CONSTRAINT `alerta_medica_pais_id_pais_salud_id` FOREIGN KEY (`pais_id`) REFERENCES `pais_salud`(`id`) ON DELETE CASCADE;
ALTER TABLE `pais_salud` ADD CONSTRAINT `pais_salud_continente_id_continente_id` FOREIGN KEY (`continente_id`) REFERENCES `continente`(`id`) ON DELETE CASCADE;
