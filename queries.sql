-- Querie 1
WITH TMP AS (
	SELECT *
	FROM item
	JOIN incidencia
	ON item.id = incidencia.item_id
	NATURAL JOIN local_publico

)
SELECT nome, COUNT(*)
FROM TMP
GROUP BY nome
HAVING COUNT(*) >= ALL(
	SELECT COUNT(*)
	FROM TMP
	GROUP BY nome);

-- Querie 2
WITH anomalias AS (
	SELECT *
	FROM anomalia_traducao
	NATURAL JOIN anomalia
	),
	TMP AS (
	SELECT i.email, i.anomalia_id, a.id, a.tem_anomalia_redacao, a.ts
	FROM incidencia as i, anomalias as a
	WHERE i.anomalia_id = a.id
	AND a.ts BETWEEN '2019-01-01 00:00:00' and '2019-3-30 23:59:59'
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
WITH TMP AS (
	SELECT latitude, longitude, anomalia_id, item_id, email, item.id, ts, anomalia.id
	FROM item
	JOIN incidencia
	ON item.id = incidencia.item_id
	NATURAL JOIN local_publico
	JOIN anomalia
	ON incidencia.anomalia_id = anomalia.id

)
SELECT DISTINCT email
FROM TMP
WHERE TMP.ts BETWEEN '2019-01-01 00:00:00' and '2019-12-31 23:59:59'
	AND TMP.latitude > 39.336775;

-- Querie 4
WITH incidencias AS (
		SELECT  *
		FROM utilizador
		Natural JOIN utilizador_qualificado
		NATURAL JOIN incidencia
		NATURAL JOIN proposta_de_correcao
	),
	correcoes AS (
		SELECT *
		FROM incidencias
		NATURAL JOIN correcao
	),
	TMP AS(
		SELECT *
		FROM incidencias
		WHERE anomalia_id IN (
		SELECT anomalia_id
		FROM incidencias
		WHERE anomalia_id NOT IN (
			SELECT anomalia_id
			FROM correcoes
		))
	)
	
SELECT DISTINCT email
FROM TMP
JOIN item
ON item.id = TMP.item_id
WHERE latitude < 39.336775;
