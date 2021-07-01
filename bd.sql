CREATE TABLE IF NOT EXISTS Album (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    ano INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Faixa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    duracao VARCHAR(25) NOT NULL,
    album_id INT NOT NULL,
    FOREIGN KEY (album_id)
        REFERENCES Album (id)
        ON DELETE CASCADE,
    UNIQUE KEY `id_cd` (`id`,`album_id`)
);