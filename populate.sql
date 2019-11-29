INSERT INTO local_publico VALUES ('35.286977', '9.117095', 'Milan');
INSERT INTO local_publico VALUES ('14.085776', '21.568109', 'Reykjavik');
INSERT INTO local_publico VALUES ('64.452532', '20.573876', 'Skelleftea');
INSERT INTO local_publico VALUES ('62.277445', '114.245334', 'Yellowknife');
INSERT INTO local_publico VALUES ('54.304870', '18.335831', 'Gdynia');
INSERT INTO local_publico VALUES ('9.547727', '27.016843', 'Utsjoki');
INSERT INTO local_publico VALUES ('28.581563', '33.054823', 'Murmansk');
INSERT INTO local_publico VALUES ('30.516422', '4.217623', 'Brussels');
INSERT INTO local_publico VALUES ('25.235219', '68.222105', 'Hyderabad');
INSERT INTO local_publico VALUES ('18.553292', '48.171222', 'Uberlandia');
INSERT INTO local_publico VALUES ('31.464109', '52.212188', 'Pelotas');
INSERT INTO local_publico VALUES ('7.456239', '8.491433', 'Nzerekore');
INSERT INTO local_publico VALUES ('28.450963', '24.464675', 'Kimberley');
INSERT INTO local_publico VALUES ('16.308764', '68.097462', 'La Paz');
INSERT INTO local_publico VALUES ('27.287038', '89.394867', 'Thimphu');
INSERT INTO local_publico VALUES ('13.308535', '80.318428', 'Dikson');
INSERT INTO local_publico VALUES ('36.421425', '137.132527', 'Toyama');
INSERT INTO local_publico VALUES ('26.498933', '65.138476', 'San Miguel de Tucuman');
INSERT INTO local_publico VALUES ('25.040710', '102.419965', 'Kunming');
INSERT INTO local_publico VALUES ('25.373606', '85.099710', 'Patna');
INSERT INTO local_publico VALUES ('39.336775', '-8.936379', 'Rio Maior');

INSERT INTO item VALUES (DEFAULT, 'a', 'Milan', '35.286977', '9.117095');
INSERT INTO item VALUES (DEFAULT, 'b', 'Reykjavik', '14.085776', '21.568109');
INSERT INTO item VALUES (DEFAULT, 'c', 'Skelleftea', '64.452532', '20.573876');
INSERT INTO item VALUES (DEFAULT, 'd', 'Yellowknife', '62.277445', '114.245334');
INSERT INTO item VALUES (DEFAULT, 'e', 'Gdynia', '54.304870', '18.335831');
INSERT INTO item VALUES (DEFAULT, 'f', 'Utsjoki', '9.547727', '27.016843');
INSERT INTO item VALUES (DEFAULT, 'g', 'Murmansk', '28.581563', '33.054823');
INSERT INTO item VALUES (DEFAULT, 'h', 'Brussels', '30.516422', '4.217623');
INSERT INTO item VALUES (DEFAULT, 'i', 'Hyderabad', '25.235219', '68.222105');
INSERT INTO item VALUES (DEFAULT, 'j', 'Uberlandia', '18.553292', '48.171222');
INSERT INTO item VALUES (DEFAULT, 'k', 'Pelotas', '31.464109', '52.212188');
INSERT INTO item VALUES (DEFAULT, 'l', 'Nzerekore', '7.456239', '8.491433');
INSERT INTO item VALUES (DEFAULT, 'm', 'Kimberley', '28.450963', '24.464675');
INSERT INTO item VALUES (DEFAULT, 'n', 'La Paz', '16.308764', '68.097462');
INSERT INTO item VALUES (DEFAULT, 'o', 'Thimphu', '27.287038', '89.394867');
INSERT INTO item VALUES (DEFAULT, 'p', 'Dikson', '13.308535', '80.318428');
INSERT INTO item VALUES (DEFAULT, 'q', 'Toyama', '36.421425', '137.132527');
INSERT INTO item VALUES (DEFAULT, 'r', 'San Miguel de Tucuman', '26.498933', '65.138476');
INSERT INTO item VALUES (DEFAULT, 's', 'Kunming', '25.040710', '102.419965');
INSERT INTO item VALUES (DEFAULT, 't', 'Patna', '25.373606', '85.099710');
INSERT INTO item VALUES (DEFAULT, 'a', 'Milan', '35.286977', '9.117095');

INSERT INTO anomalia VALUES (DEFAULT, '(0, 1, 0, 1)', 'aIMG', 'aLNG', '2019-01-20 08:00:32', 'a', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(1, 2, 1, 2)', 'bIMG', 'bLNG', '2019-01-20 08:30:56', 'b', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(2, 3, 2, 3)', 'cIMG', 'cLNG', '2019-02-21 11:45:27', 'c', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(3, 4, 3, 4)', 'dIMG', 'dLNG', '2019-02-21 15:31:12', 'd', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(4, 5, 4, 5)', 'eIMG', 'eLNG', '2019-03-22 02:46:00', 'e', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(5, 6, 5, 6)', 'fIMG', 'fLNG', '2019-03-22 23:03:15', 'f', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(6, 7, 6, 7)', 'gIMG', 'gLNG', '2019-11-23 05:39:19', 'g', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(7, 8, 7, 8)', 'hIMG', 'hLNG', '2019-11-23 22:30:00', 'h', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(8, 9, 8, 9)', 'iIMG', 'iLNG', '2019-11-24 12:28:56', 'i', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(9, 10, 9, 10)', 'jIMG', 'jLNG', '2019-11-24 16:33:22', 'j', 'false');
INSERT INTO anomalia VALUES (DEFAULT, '(10, 11, 10, 11)', 'kIMG', 'kLNG', '2019-11-25 10:03:29', 'k', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(11, 12, 11, 12)', 'lIMG', 'lLNG', '2019-11-25 10:59:46', 'l', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(12, 13, 12, 13)', 'mIMG', 'mLNG', '2019-11-26 19:15:59', 'm', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(13, 14, 13, 14)', 'nIMG', 'nLNG', '2019-11-26 20:01:51', 'n', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(14, 15, 14, 15)', 'oIMG', 'oLNG', '2019-11-27 00:45:00', 'o', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(15, 16, 15, 16)', 'pIMG', 'pLNG', '2019-11-27 06:10:21', 'p', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(16, 17, 16, 17)', 'qIMG', 'qLNG', '2019-11-28 13:37:00', 'q', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(17, 18, 17, 18)', 'rIMG', 'rLNG', '2019-11-28 23:59:10', 'r', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(18, 19, 18, 19)', 'sIMG', 'sLNG', '2019-11-29 04:20:00', 's', 'true');
INSERT INTO anomalia VALUES (DEFAULT, '(19, 20, 19, 20)', 'tIMG', 'tLNG', '2019-11-29 07:07:07', 't', 'true');

INSERT INTO anomalia_traducao VALUES (1, '(0, 1, 0, 1)', 'bLNG');
INSERT INTO anomalia_traducao VALUES (2, '(1, 2, 1, 2)', 'cLNG');
INSERT INTO anomalia_traducao VALUES (3, '(2, 3, 2, 3)', 'dLNG');
INSERT INTO anomalia_traducao VALUES (4, '(3, 4, 3, 4)', 'eLNG');
INSERT INTO anomalia_traducao VALUES (5, '(4, 5, 4, 5)', 'fLNG');
INSERT INTO anomalia_traducao VALUES (6, '(5, 6, 5, 6)', 'gLNG');
INSERT INTO anomalia_traducao VALUES (7, '(6, 7, 6, 7)', 'hLNG');
INSERT INTO anomalia_traducao VALUES (8, '(7, 8, 7, 8)', 'iLNG');
INSERT INTO anomalia_traducao VALUES (9, '(8, 9, 8, 9)', 'jLNG');
INSERT INTO anomalia_traducao VALUES (10, '(9, 10, 9, 10)', 'kLNG');

INSERT INTO duplicado VALUES (1, 2);
INSERT INTO duplicado VALUES (2, 3);
INSERT INTO duplicado VALUES (3, 4);
INSERT INTO duplicado VALUES (4, 5);
INSERT INTO duplicado VALUES (5, 6);
INSERT INTO duplicado VALUES (6, 7);
INSERT INTO duplicado VALUES (7, 8);
INSERT INTO duplicado VALUES (8, 9);
INSERT INTO duplicado VALUES (9, 10);
INSERT INTO duplicado VALUES (10, 11);
INSERT INTO duplicado VALUES (11, 12);
INSERT INTO duplicado VALUES (12, 13);
INSERT INTO duplicado VALUES (13, 14);
INSERT INTO duplicado VALUES (14, 15);
INSERT INTO duplicado VALUES (15, 16);
INSERT INTO duplicado VALUES (16, 17);
INSERT INTO duplicado VALUES (17, 18);
INSERT INTO duplicado VALUES (18, 19);
INSERT INTO duplicado VALUES (19, 20);

INSERT INTO utilizador VALUES ('Seymour@gmail.com', 'GmnABXxC');
INSERT INTO utilizador VALUES ('Vern@gmail.com', 'wU3ATdN3');
INSERT INTO utilizador VALUES ('Catherine@gmail.com', 'dtbEjEeS');
INSERT INTO utilizador VALUES ('Antione@gmail.com', 'tHSdErjj');
INSERT INTO utilizador VALUES ('Rusty@gmail.com', 'ctUuYx2s');
INSERT INTO utilizador VALUES ('Windy@gmail.com', 'YExgf57s');
INSERT INTO utilizador VALUES ('Garth@gmail.com', 'VBg4YKLe');
INSERT INTO utilizador VALUES ('Lynda@gmail.com', 'PbDpev92');
INSERT INTO utilizador VALUES ('Steve@gmail.com', '7Q2ua3Ea');
INSERT INTO utilizador VALUES ('Hassan@gmail.com', 'FHXNxApx');
INSERT INTO utilizador VALUES ('Luna@gmail.com', 'JdGt6LP4');
INSERT INTO utilizador VALUES ('Richard@gmail.com', 'fwfzQESq');
INSERT INTO utilizador VALUES ('Pete@gmail.com', '3T7Mm8Em');
INSERT INTO utilizador VALUES ('An@gmail.com', 'kpqDKZeE');
INSERT INTO utilizador VALUES ('Darleen@gmail.com', 'GcH2wfw7');
INSERT INTO utilizador VALUES ('Angel@gmail.com', 'WR7QvDKr');
INSERT INTO utilizador VALUES ('Lajuana@gmail.com', '5tf4RcgL');
INSERT INTO utilizador VALUES ('Margert@gmail.com', 'ff2bxAG5');
INSERT INTO utilizador VALUES ('Nikole@gmail.com', '4rA3FuaL');
INSERT INTO utilizador VALUES ('Sherlyn@gmail.com', 'pA4JZwYA');

INSERT INTO utilizador_qualificado VALUES ('Seymour@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Vern@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Catherine@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Antione@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Rusty@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Windy@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Garth@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Lynda@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Steve@gmail.com');
INSERT INTO utilizador_qualificado VALUES ('Hassan@gmail.com');

INSERT INTO utilizador_regular VALUES ('Luna@gmail.com');
INSERT INTO utilizador_regular VALUES ('Richard@gmail.com');
INSERT INTO utilizador_regular VALUES ('Pete@gmail.com');
INSERT INTO utilizador_regular VALUES ('An@gmail.com');
INSERT INTO utilizador_regular VALUES ('Darleen@gmail.com');
INSERT INTO utilizador_regular VALUES ('Angel@gmail.com');
INSERT INTO utilizador_regular VALUES ('Lajuana@gmail.com');
INSERT INTO utilizador_regular VALUES ('Margert@gmail.com');
INSERT INTO utilizador_regular VALUES ('Nikole@gmail.com');
INSERT INTO utilizador_regular VALUES ('Sherlyn@gmail.com');

INSERT INTO incidencia VALUES (2, 1, 'Seymour@gmail.com');
INSERT INTO incidencia VALUES (3, 2, 'Vern@gmail.com');
INSERT INTO incidencia VALUES (4, 3, 'Catherine@gmail.com');
INSERT INTO incidencia VALUES (5, 4, 'Margert@gmail.com');
INSERT INTO incidencia VALUES (6, 5, 'Margert@gmail.com');
INSERT INTO incidencia VALUES (7, 6, 'Windy@gmail.com');
INSERT INTO incidencia VALUES (8, 7, 'Garth@gmail.com');
INSERT INTO incidencia VALUES (9, 8, 'Lynda@gmail.com');
INSERT INTO incidencia VALUES (10, 9, 'Steve@gmail.com');
INSERT INTO incidencia VALUES (11, 10, 'Hassan@gmail.com');
INSERT INTO incidencia VALUES (1, 1, 'Nikole@gmail.com');
INSERT INTO incidencia VALUES (12, 21, 'Rusty@gmail.com');
INSERT INTO incidencia VALUES (13, 4, 'Catherine@gmail.com');
INSERT INTO incidencia VALUES (14, 5, 'Catherine@gmail.com');
INSERT INTO incidencia VALUES (15, 4, 'Margert@gmail.com');

INSERT INTO proposta_de_correcao VALUES ('Seymour@gmail.com', 1, '2019-11-25 10:03:29', 'correcao1');
INSERT INTO proposta_de_correcao VALUES ('Vern@gmail.com', 2, '2019-11-25 10:59:46', 'correcao2');
INSERT INTO proposta_de_correcao VALUES ('Catherine@gmail.com', 3, '2019-11-26 19:15:59', 'correcao3');
INSERT INTO proposta_de_correcao VALUES ('Antione@gmail.com', 4, '2019-11-26 20:01:51', 'correcao4');
INSERT INTO proposta_de_correcao VALUES ('Rusty@gmail.com', 5, '2019-11-27 00:45:00', 'correcao5');
INSERT INTO proposta_de_correcao VALUES ('Windy@gmail.com', 6, '2019-11-27 06:10:21', 'correcao6');
INSERT INTO proposta_de_correcao VALUES ('Garth@gmail.com', 7, '2019-11-28 13:37:00', 'correcao7');
INSERT INTO proposta_de_correcao VALUES ('Lynda@gmail.com', 8, '2019-11-28 23:59:10', 'correcao8');
INSERT INTO proposta_de_correcao VALUES ('Steve@gmail.com', 9, '2019-11-29 04:20:00', 'correcao9');
INSERT INTO proposta_de_correcao VALUES ('Hassan@gmail.com', 10, '2019-11-29 07:07:07', 'correcao10');

INSERT INTO correcao VALUES ('Seymour@gmail.com', 1, 2);
INSERT INTO correcao VALUES ('Vern@gmail.com', 2, 3);
INSERT INTO correcao VALUES ('Catherine@gmail.com', 3, 4);
INSERT INTO correcao VALUES ('Antione@gmail.com', 4, 5);
INSERT INTO correcao VALUES ('Rusty@gmail.com', 5, 6);
INSERT INTO correcao VALUES ('Windy@gmail.com', 6, 7);
INSERT INTO correcao VALUES ('Garth@gmail.com', 7, 8);
INSERT INTO correcao VALUES ('Lynda@gmail.com', 8, 9);
INSERT INTO correcao VALUES ('Steve@gmail.com', 9, 10);
INSERT INTO correcao VALUES ('Hassan@gmail.com', 10, 11);

