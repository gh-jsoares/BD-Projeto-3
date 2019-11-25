/* local_publico */
INSERT INTO local_publico VALUES (420.69, 420.69, 'Leroy Jenkins');
INSERT INTO local_publico VALUES (123.12, 123.12, 'Marco');
INSERT INTO local_publico VALUES (456.45, 456.45, 'Polo');

/* item */
INSERT INTO item VALUES (DEFAULT, 'descricao original 1', 'local fixe 1', 420.69, 420.69);
INSERT INTO item VALUES (DEFAULT, 'descricao original 2', 'local fixe 2',
(SELECT latitude from local_publico WHERE nome='Marco'), (SELECT longitude from local_publico WHERE nome='Marco'));
INSERT INTO item VALUES (DEFAULT, 'descricao original 3', 'local fixe 3',
(SELECT latitude from local_publico WHERE nome='Polo'), (SELECT longitude from local_publico WHERE nome='Polo'));

