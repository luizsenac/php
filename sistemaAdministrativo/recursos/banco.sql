CREATE TABLE funcionario (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    codigo VARCHAR(45),
    nome VARCHAR(45),
    salario VARCHAR(45),
    data_nascimento VARCHAR(45),
 	cpf VARCHAR(45),
    senha VARCHAR(45),
    funcao INT
 
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;


INSERT INTO funcionario(id, codigo, nome, salario, data_nascimento, cpf, senha, funcao) VALUES
(1, '111', 'gilmar', 4000, '1990-01-01', '123.123.123-12', '123', 1),
(2, '222', 'sophia', 3000, '2000-01-01', '234.234.234-23', '123', 1),
(3, '333', 'samuel', 2000, '1995-01-01', '456.456.456-45', '123', 2),
(4, '444', 'amanda', 4000, '1997-01-01', '789.789.789-78', '123', 1);

CREATE TABLE funcao(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(45),
    obs TEXT
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO funcao(id, descricao, obs) VALUES
(1, 'Programador Junior', 'Tome cuidado ele é perigoso'),
(2, 'Analista Pleno', 'Entrou na empresa a pouco tempo'),
(3, 'Testador', 'O medo de todos programadores'),
(4, 'Gerente', 'O lider da equipe');

CREATE TABLE usuario (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    codigo VARCHAR(45),
    nome VARCHAR(45),
    cpf VARCHAR(45),
    senha VARCHAR(45)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

INSERT INTO usuario (id, codigo, nome, cpf, senha) VALUES
(1, '123', 'adm', '123.123.123-12', '123');

CREATE TABLE agenda (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data DATE,
    hora_inicio TIME,
    hora_fim TIME,
    horas TIME,
    curso VARCHAR(255),
    codigo VARCHAR(45),
    obs TEXT,
    funcionario INT
);

INSERT INTO agenda (data, hora_inicio, hora_fim, horas, curso, codigo, obs, funcionario)
VALUES ('2023-11-07','13:30:00','17:30:00','', 'Informática', '01', 'obs', 1);

/* CRIANDO UM TRIGGER*/
DELIMITER //
CREATE TRIGGER calcular_horas
BEFORE INSERT ON agenda
FOR EACH ROW
BEGIN 
    SET new.horas = TIMEDIFF(NEW.hora_fim, NEW.hora_inicio);
END;
// DELIMITER ;


/* CRIANDO UM TRIGGER*/
DELIMITER //
CREATE TRIGGER calcular_horas_atualizar
BEFORE UPDATE ON agenda
FOR EACH ROW
BEGIN 
    SET new.horas = TIMEDIFF(NEW.hora_fim, NEW.hora_inicio);
END;
// DELIMITER ;





