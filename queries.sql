-- Querie 1
WITH TMP AS (
	SELECT *
	FROM local_publico
	NATURAL JOIN item
)
SELECT nome
FROM TMP
GROUP BY nome
HAVING COUNT(*) >= ALL(
	SELECT COUNT(*)
	FROM TMP
	GROUP BY nome
);

-- Querie 2
WITH TMP AS (
	SELECT i.email, i.anomalia_id, a.id, a.tem_anomalia_redacao, a.ts
	FROM incidencia as i, anomalia as a
	WHERE i.anomalia_id = a.id and a.tem_anomalia_redacao = 'false'
	AND a.ts BETWEEN '2019-01-01 00:00:00' and '2019-06-30 23:59:59'
)
SELECT TMP.email, COUNT(*)
FROM TMP, utilizador_regular as ur
WHERE TMP.email = ur.email
GROUP BY TMP.email
HAVING COUNT(*) >= ALL(
	SELECT COUNT(*)
	FROM TMP
	GROUP BY email
); 

-- Querie 3
SELECT
FROM
WHERE

-- Querie 4
SELECT
FROM
WHERE
