-- Apresentar o SQL para as seguintes consultas

--  * Atores do filme com título “XYZ”
SELECT Ator.id, Ator.nome
FROM Ator

  INNER JOIN AtorFilme
  ON Ator.id = AtorFilme.idator

  INNER JOIN Filme
  ON Filme.id = AtorFilme.idfilme

WHERE Filme.titulo LIKE '%XYZ%';

--  * Filmes que o ator de nome “FULANO” participou
SELECT Filme.titulo
FROM Filme

  INNER JOIN AtorFilme
  ON Filme.id = AtorFilme.idator

  INNER JOIN Ator
  ON Ator.id = AtorFilme.idfilme

WHERE Ator.nome LIKE '%XYZ%';

--  * Listar os filmes do ano 2015 ordenados pelo quantidade de atores participantes e pelo título em ordem alfabética.
SELECT Filme.titulo, count(AtorFilme.idator) as qtde_atores
FROM AtorFilme
  INNER JOIN Filme
  ON AtorFilme.idfilme = Filme.id
WHERE Filme.ano >= 2015
ORDER BY qtde_atores, Filme.titulo

--  * Listar os atores que trabalharam em filmes cujo diretor foi “SPIELBERG”
SELECT Ator.id, Ator.nome
FROM Ator

  INNER JOIN AtorFilme
  ON Ator.id = AtorFilme.idator

  INNER JOIN Filme
  ON AtorFilme.idfilme = Filme.id

  INNER JOIN Ator Diretor
  ON Filme.iddiretor = Diretor.id

WHERE Diretor.nome LIKE '%SPIELBERG%'
