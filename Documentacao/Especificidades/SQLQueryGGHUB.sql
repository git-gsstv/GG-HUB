CREATE DATABASE gghub;
USE gghub;

CREATE TABLE administrador (
    id_adm INT PRIMARY KEY,
    nivel INT,
    nome VARCHAR(32),
    email VARCHAR(255),
    senha VARCHAR(12)
);

CREATE TABLE usuario (
    id_usuario INT PRIMARY KEY,
    nivel INT,
    nome VARCHAR(32),
    email VARCHAR(255),
    senha VARCHAR(12)
);

CREATE TABLE Jogos (
    id_jogo INT PRIMARY KEY,
    nome VARCHAR(255),
    desenvolvedor VARCHAR(255),
    categorias VARCHAR(255),
    plataformas VARCHAR(255),
    preco DECIMAL(10,2)
);

CREATE TABLE categoria (
    nome VARCHAR(255) PRIMARY KEY
);

CREATE TABLE JogoTemCategoria (
    categoria_nome VARCHAR(255),
    Jogos_id_jogo INT,
    PRIMARY KEY (categoria_nome, Jogos_id_jogo),
    FOREIGN KEY (categoria_nome) REFERENCES categoria(nome),
    FOREIGN KEY (Jogos_id_jogo) REFERENCES Jogos(id_jogo)
);

CREATE TABLE gerenciamento (
    administrador_id_adm INT,
    Jogos_id_jogo INT,
    PRIMARY KEY (administrador_id_adm, Jogos_id_jogo),
    FOREIGN KEY (administrador_id_adm) REFERENCES administrador(id_adm),
    FOREIGN KEY (Jogos_id_jogo) REFERENCES Jogos(id_jogo)
);

CREATE TABLE Jogadores (
    usuario_id_usuario INT,
    Jogos_id_jogo INT,
    PRIMARY KEY (usuario_id_usuario, Jogos_id_jogo),
    FOREIGN KEY (usuario_id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (Jogos_id_jogo) REFERENCES Jogos(id_jogo)
);