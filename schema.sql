DROP TABLE IF EXISTS local_publico CASCADE;
DROP TABLE IF EXISTS item CASCADE;
DROP TABLE IF EXISTS anomalia CASCADE;
DROP TABLE IF EXISTS anomalia_traducao CASCADE;
DROP TABLE IF EXISTS duplicado CASCADE;
DROP TABLE IF EXISTS utilizador CASCADE;
DROP TABLE IF EXISTS utilizador_qualificado CASCADE;
DROP TABLE IF EXISTS utilizador_regular CASCADE;
DROP TABLE IF EXISTS incidencia CASCADE;
DROP TABLE IF EXISTS proposta_de_correcao CASCADE;
DROP TABLE IF EXISTS correcao CASCADE;

CREATE TABLE local_publico (
	latitude DECIMAL (9, 6) NOT NULL,
	longitude DECIMAL(9, 6) NOT NULL,
	nome VARCHAR(255) NOT NULL,
	constraint pk_local_publico PRIMARY KEY (latitude, longitude)
);

CREATE TABLE item (
	id SERIAL PRIMARY KEY,
	descricao VARCHAR(255) NOT NULL,
	localizacao VARCHAR(255) NOT NULL,
	latitude DECIMAL (9, 6) NOT NULL,
	longitude DECIMAL(9, 6) NOT NULL,
	FOREIGN KEY (latitude, longitude) REFERENCES local_publico(latitude, longitude)
);

CREATE TABLE anomalia (
	id SERIAL PRIMARY KEY,
	zona VARCHAR(255) NOT NULL,
	imagem VARCHAR(255) NOT NULL,
	lingua VARCHAR(255) NOT NULL,
	ts TIMESTAMP NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	tem_anomalia_redacao BOOLEAN NOT NULL
);

CREATE TABLE anomalia_traducao ( /* Não sei ao certo como aplicar aqui as restrições */
	id INT NOT NULL PRIMARY KEY,
	zona2 VARCHAR(255) NOT NULL,
	lingua2 VARCHAR(255) NOT NULL,
	FOREIGN KEY (id) REFERENCES anomalia(id)
);

CREATE TABLE duplicado ( /* Novamente, não sei bem aplicar as restrições */
	item1 INT NOT NULL REFERENCES item(id),
	item2 INT NOT NULL REFERENCES item(id),
	CONSTRAINT pk_duplicado PRIMARY KEY (item1, item2),
	CHECK item1 < item2
);

CREATE TABLE utilizador ( /* Same as above */
	email VARCHAR(255) NOT NULL PRIMARY KEY,
	password VARCHAR(255) NOT NULL
);




/* DINIS */

CREATE TABLE utilizador_qualificado (
	email VARCHAR(255) NOT NULL PRIMARY KEY,
	FOREIGN KEY (email) REFERENCES utilizador(email)
	/* (RI-5) email não pode figurar em utilizador_regular */
);

CREATE TABLE utilizador_regular (
	email VARCHAR(255) NOT NULL PRIMARY KEY,
	FOREIGN KEY (email) REFERENCES utilizador(email)
	/* (RI-5) email não pode figurar em utilizador_qualificado */
);

CREATE TABLE incidencia (
	anomalia_id INT NOT NULL PRIMARY KEY,
	item_id INT NOT NULL,
	email VARCHAR(255) NOT NULL,
	FOREIGN KEY (anomalia_id) REFERENCES anomalia(id),
	FOREIGN KEY (item_id) REFERENCES item(id),
	FOREIGN KEY (email) REFERENCES utilizador(email)
);

CREATE TABLE proposta_de_correcao (
	email VARCHAR(255) NOT NULL,
	nro INT NOT NULL,
	data_hora TIMESTAMP NOT NULL,
	texto TEXT,
	FOREIGN KEY (email) REFERENCES utilizador(email),
	constraint pk_proposta_de_correcao PRIMARY KEY (email, nro)
	/* (RI-7) email e nro têm de figurar em correção S*/
);

CREATE TABLE correcao (
	email VARCHAR(255) NOT NULL,
	nro INT NOT NULL,
	anomalia_id INT NOT NULL,
	FOREIGN KEY (nro, email) REFERENCES proposta_de_correcao(nro, email),
	FOREIGN KEY (anomalia_id) REFERENCES anomalia(id),
	constraint pk_correcao PRIMARY KEY (email, nro, anomalia_id)
);
