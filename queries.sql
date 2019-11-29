-- Querie 1
WITH TMP AS (
	SELECT latitude, longitude, nome
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
	SELECT id, ts, tem_anomalia_redacao
	FROM anomalia_traducao
	NATURAL JOIN anomalia
	),
	TMP AS (
	SELECT i.email
	FROM incidencia as i, anomalias as a
	WHERE i.anomalia_id = a.id
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
WITH TMP AS (
	SELECT DISTINCT longitude, latitude, email
	FROM item
	JOIN incidencia
	ON item.id = incidencia.item_id
	NATURAL JOIN local_publico
	JOIN anomalia
	ON incidencia.anomalia_id = anomalia.id
	WHERE latitude > 39.336775 and ts > '2019-01-01 00:00:00'
	),
	Locais_Norte AS (
	SELECT latitude, longitude
	FROM local_publico
	WHERE latitude > 39.336775
	)
SELECT TMP.email, COUNT(*)
FROM TMP, Locais_Norte
WHERE TMP.latitude = Locais_Norte.latitude AND TMP.longitude = Locais_Norte.longitude
GROUP BY TMP.email
HAVING COUNT(*) = ALL (
	SELECT COUNT(*)
	FROM Locais_Norte
)

-- Querie 4
WITH incidencias AS (
		SELECT  email, anomalia_id, item_id
		FROM utilizador
		Natural JOIN utilizador_qualificado
		NATURAL JOIN incidencia
		
	
	),
	correcoes AS (
		SELECT email, anomalia_id
		FROM incidencias
		NATURAL JOIN proposta_de_correcao
		NATURAL JOIN correcao
		WHERE date_part('year', data_hora) = date_part('year', CURRENT_DATE)
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
