nomes = ['Seymour', 'Vern', 'Catherine', 'Antione', 'Rusty', 'Windy', 'Garth', 'Lynda', 'Steve', 'Hassan', 'Luna', 'Richard', 'Pete', 'An', 'Darleen', 'Angel', 'Lajuana', 'Margert', 'Nikole', 'Sherlyn']

passwords = ['GmnABXxC', 'wU3ATdN3', 'dtbEjEeS', 'tHSdErjj', 'ctUuYx2s', 'YExgf57s', 'VBg4YKLe', 'PbDpev92', '7Q2ua3Ea', 'FHXNxApx', 'JdGt6LP4', 'fwfzQESq', '3T7Mm8Em', 'kpqDKZeE', 'GcH2wfw7', 'WR7QvDKr', '5tf4RcgL', 'ff2bxAG5', '4rA3FuaL', 'pA4JZwYA']

locais_publicos = ['45.28', '9.11', 'Milan', '64.08', '21.56', 'Reykjavik', '64.45', '20.57', 'Skelleftea', '62.27', '114.24', 'Yellowknife', '54.30', '18.33', 'Gdynia', '69.54', '27.01', 'Utsjoki', '68.58', '33.05', 'Murmansk', '50.51', '4.21', 'Brussels', '25.23', '68.22', 'Hyderabad', '18.55', '48.17', 'Uberlandia', '31.46', '52.21', 'Pelotas', '7.45', '8.49', 'Nzerekore', '28.45', '24.46', 'Kimberley', '16.30', '68.09', 'La Paz', '27.28', '89.39', 'Thimphu', '73.30', '80.31', 'Dikson', '36.42', '137.13', 'Toyama', '26.49', '65.13', 'San Miguel de Tucuman', '25.04', '102.41', 'Kunming', '25.37', '85.09', 'Patna']

descricoes = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't']

imagens = ['aIMG', 'bIMG', 'cIMG', 'dIMG', 'eIMG', 'fIMG', 'gIMG', 'hIMG', 'iIMG', 'jIMG', 'kIMG', 'lIMG', 'mIMG', 'nIMG', 'oIMG', 'pIMG', 'qIMG', 'rIMG', 'sIMG', 'tIMG']

linguas = ['aLNG', 'bLNG', 'cLNG', 'dLNG', 'eLNG', 'fLNG', 'gLNG', 'hLNG', 'iLNG', 'jLNG', 'kLNG', 'lLNG', 'mLNG', 'nLNG', 'oLNG', 'pLNG', 'qLNG', 'rLNG', 'sLNG', 'tLNG']

ts = ['2019-11-20 08:00:32', '2019-11-20 08:30:56', '2019-11-21 11:45:27', '2019-11-21 15:31:12', '2019-11-22 02:46:00', '2019-11-22 23:03:15', '2019-11-23 05:39:19', '2019-11-23 22:30:00', '2019-11-24 12:28:56', '2019-11-24 16:33:22', '2019-11-25 10:03:29', '2019-11-25 10:59:46', '2019-11-26 19:15:59', '2019-11-26 20:01:51', '2019-11-27 00:45:00', '2019-11-27 06:10:21', '2019-11-28 13:37:00', '2019-11-28 23:59:10', '2019-11-29 04:20:00', '2019-11-29 07:07:07']

tem_anomalia_redacao = ['true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false']

correcoes = ['correcao1', 'correcao2', 'correcao3', 'correcao4', 'correcao5', 'correcao6', 'correcao7', 'correcao8', 'correcao9', 'correcao10']


f = open('populate.sql', 'w')

i = 0
while i < len(locais_publicos):
    f.write('INSERT INTO local_publico VALUES (\'' + locais_publicos[i] + '\', \'' + locais_publicos[i + 1] + '\', \'' + locais_publicos[i + 2] + '\');\n')
    i += 3
f.write('\n')

i = 0
j = 0
while i < len(locais_publicos):
    f.write('INSERT INTO item VALUES (DEFAULT, \'' + descricoes[j] + '\', \'' + locais_publicos[i + 2] + '\', \'' + locais_publicos[i] + '\', \'' + locais_publicos[i + 1] + '\');\n')
    j += 1
    i += 3
f.write('\n')

i = 0
j = 0
while i < len(locais_publicos):
    f.write('INSERT INTO anomalia VALUES (DEFAULT, \'(' + str(j) + ', ' + str(j + 1) + ', ' + str(j) + ', ' + str(j + 1) + ')\', \'' + imagens[j] + '\', \'' + linguas[j] + '\', \'' + ts[j] + '\', \'' + descricoes[j] + '\', \'' + tem_anomalia_redacao[j] + '\');\n')
    j += 1
    i += 3
f.write('\n')

i = 0
j = 3
while i < 20:
    if i != 19:
        f.write('INSERT INTO anomalia_traducao VALUES (' + str(i + 1) + ', \'(' + str(i) + ', ' + str(i + 1) + ', ' + str(i) + ', ' + str(i + 1) + ')\', \'' + linguas[i + 1] + '\');\n')
    else:
        f.write('INSERT INTO anomalia_traducao VALUES (' + str(i + 1) + ', \'(' + str(i) + ', ' + str(i + 1) + ', ' + str(i) + ', ' + str(i + 1) + ')\', \'' + linguas[0] + '\');\n')
    i += 1
    j += 3
    if i == 19:
        j = 0
f.write('\n')

i = 1
while i < 20:
    f.write('INSERT INTO duplicado VALUES (' + str(i) + ', ' + str(i + 1) + ');\n')
    i += 1
f.write('\n')

i = 0
while i < len(nomes):
    f.write('INSERT INTO utilizador VALUES (\'' + nomes[i] + '@gmail.com' + '\', \'' + passwords[i] + '\');\n')
    i += 1
f.write('\n')

i = 0
while i < 10:
    f.write('INSERT INTO utilizador_qualificado VALUES (\'' + nomes[i] + '@gmail.com' + '\');\n')
    i += 1
f.write('\n')

i = 10
while i < 20:
    f.write('INSERT INTO utilizador_regular VALUES (\'' + nomes[i] + '@gmail.com' + '\');\n')
    i += 1
f.write('\n')

i = 0
while i < 20:
    f.write('INSERT INTO incidencia VALUES (' + str(i + 2) + ', ' + str(i + 1) + ', \'' + nomes[i] + '@gmail.com' + '\');\n')
    i += 2
f.write('\n')

i = 0
while i < 10:
    f.write('INSERT INTO proposta_de_correcao VALUES (\'' + nomes[i] + '@gmail.com' + '\', ' + str(i + 1) + ', \'' + ts[i + 10] + '\', \'' + correcoes[i] + '\');\n')
    i += 1
f.write('\n')

i = 0
while i < 10:
    f.write('INSERT INTO correcao VALUES (\'' + nomes[i] + '@gmail.com' + '\', ' + str(i + 1) + ', ' + str(i + 2) + ');\n')
    i += 1
f.write('\n')

f.close()
