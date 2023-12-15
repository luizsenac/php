CREATE TABLE usuario(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45),
    cpf VARCHAR(45),
    senha VARCHAR(45)
);

INSERT INTO usuario (nome, cpf, senha) VALUES
('Joaquim', '123', '123'),
('Marlon', '111', '111');

CREATE TABLE funcao(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(45),
    obs VARCHAR(255)
);

INSERT INTO funcao(descricao, obs) VALUES
('Programador', 'Iniciante'),
('Gerente', 'Expert');

CREATE TABLE funcionario(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45),
    salario VARCHAR(45),
    data_nascimento VARCHAR(45),
    cpf VARCHAR(45),
    funcao INT
);
INSERT INTO funcionario(nome, salario, data_nascimento, cpf, funcao) VALUES
('Leticia','2000','01-01-2000','123', 1),
('Matheus','2000','02-02-1990','222', 2);




