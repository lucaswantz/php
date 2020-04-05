CREATE DATABASE cinema;

USE cinema;

CREATE TABLE Filme
(
  id INT IDENTITY NOT NULL ,
  titulo VARCHAR(50) NOT NULL,
  ano INT NOT NULL,
  iddiretor INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_ator_diretor FOREIGN KEY (iddiretor) REFERENCES Ator (id)
);


CREATE TABLE Ator
(
  id INT IDENTITY NOT NULL ,
  nome VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE AtorFilme
(
  idfilme INT NOT NULL,
  idator INT NOT NULL,
  ordem INT NOT NULL,
  PRIMARY KEY (idfilme, idator),
  CONSTRAINT fk_filme_ator FOREIGN KEY (idfilme) REFERENCES Filme (id),
  CONSTRAINT fk_ator_filme FOREIGN KEY (idator) REFERENCES Ator (id)
);
