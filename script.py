nomes = ["Seymour", "Vern", "Catherine", "Antione", "Rusty", "Windy", "Garth", "Lynda", "Steve", "Hassan", "Luna", "Richard", "Pete", "An", "Darleen", "Angel", "Lajuana", "Margert", "Nikole", "Sherlyn"]

passwords = ["GmnABXxC", "wU3ATdN3", "dtbEjEeS", "tHSdErjj", "ctUuYx2s", "YExgf57s", "VBg4YKLe", "PbDpev92", "7Q2ua3Ea", "FHXNxApx", "JdGt6LP4", "fwfzQESq", "3T7Mm8Em", "kpqDKZeE", "GcH2wfw7", "WR7QvDKr", "5tf4RcgL", "ff2bxAG5", "4rA3FuaL", "pA4JZwYA"]

locais_publicos = ["45°28'N", "9°11'E", "Milan", "64°08'N", "21°56'W", "Reykjavik", "64°45'N", "20°57'E", "Skelleftea", "62°27'N", "114°24'W", "Yellowknife", "54°30'N", "18°33'E", "Gdynia", "69°54'N", "27°01'E", "Utsjoki", "68°58'N", "33°05'E", "Murmansk", "50°51'N", "4°21'E", "Brussels", "25°23'N", "68°22'E", "Hyderabad", "18°55'S", "48°17'W", "Uberlandia", "31°46'S", "52°21'W", "Pelotas", "7°45'N", "8°49'W", "Nzerekore", "28°45'S", "24°46'E", "Kimberley", "16°30'S", "68°09'W", "La Paz", "27°28'N", "89°39'E", "Thimphu", "73°30'N", "80°31'E", "Dikson", "36°42'N", "137°13'E", "Toyama", "26°49'S", "65°13'W", "San Miguel de Tucuman", "25°04'N", "102°41'E", "Kunming", "25°37'N", "85°09'E", "Patna"]

descricoes = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t"]

imagens = ["aIMG", "bIMG", "cIMG", "dIMG", "eIMG", "fIMG", "gIMG", "hIMG", "iIMG", "jIMG", "kIMG", "lIMG", "mIMG", "nIMG", "oIMG", "pIMG", "qIMG", "rIMG", "sIMG", "tIMG"]

linguas = ["aLNG", "bLNG", "cLNG", "dLNG", "eLNG", "fLNG", "gLNG", "hLNG", "iLNG", "jLNG", "kLNG", "lLNG", "mLNG", "nLNG", "oLNG", "pLNG", "qLNG", "rLNG", "sLNG", "tLNG"]

ts = ["20/11/2019 08:00:32", "20/11/2019 08:30:56", "21/11/2019 11:45:27", "21/11/2019 15:31:12", "22/11/2019 02:46:00", "22/11/2019 23:03:15", "23/11/2019 05:39:19", "23/11/2019 22:30:00", "24/11/2019 12:28:56", "24/11/2019 16:33:22", "25/11/2019 10:03:29", "25/11/2019 10:59:46", "26/11/2019 19:15:59", "26/11/2019 20:01:51", "27/11/2019 00:45:00", "27/11/2019 06:10:21", "28/11/2019 13:37:00", "28/11/2019 23:59:10", "29/11/2019 04:20:00", "29/11/2019 07:07:07"]

tem_anomalia_redacao = ["true", "true", "true", "true", "true", "true", "true", "true", "true", "true", "false", "false", "false", "false", "false", "false", "false", "false", "false", "false"]

correcoes = ["correcao1", "correcao2", "correcao3", "correcao4", "correcao5", "correcao6", "correcao7", "correcao8", "correcao9", "correcao10"]


f = open("populate.sql", "w")

i = 0
while i < len(locais_publicos):
    f.write("INSERT INTO local_publico VALUES (\"" + locais_publicos[i] + "\", \"" + locais_publicos[i + 1] + "\", \"" + locais_publicos[i + 2] + "\")\n")
    i += 3
f.write("\n")

i = 0
j = 0
while i < len(locais_publicos):
    f.write("INSERT INTO item VALUES (NULL, \"" + descricoes[j] + "\", \"" + locais_publicos[i + 2] + "\", \"" + locais_publicos[i] + "\", \"" + locais_publicos[i + 1] + "\")\n")
    j += 1
    i += 3
f.write("\n")

i = 0
j = 0
while i < len(locais_publicos):
    f.write("INSERT INTO anomalia VALUES (NULL, \"" + locais_publicos[i + 2] + "\", \"" + imagens[j] + "\", \"" + linguas[j] + "\", \"" + ts[j] + "\", \"" + descricoes[j] + "\", \"" + tem_anomalia_redacao[j] + "\")\n")
    j += 1
    i += 3
f.write("\n")

i = 0
while i < 20:
    f.write("INSERT INTO anomalia_traducao VALUES (NULL, NULL, NULL)\n")
    i += 1
f.write("\n")

i = 0
while i < 20:
    f.write("INSERT INTO duplicado VALUES (NULL, NULL)\n")
    i += 1
f.write("\n")

i = 0
while i < len(nomes):
    f.write("INSERT INTO utilizador VALUES (\"" + nomes[i] + "@gmail.com" + "\", \"" + passwords[i] + "\")\n")
    i += 1
f.write("\n")

i = 0
while i < 10:
    f.write("INSERT INTO utilizador_qualificado VALUES (\"" + nomes[i] + "@gmail.com" + "\")\n")
    i += 1
f.write("\n")

i = 10
while i < 20:
    f.write("INSERT INTO utilizador_regular VALUES (\"" + nomes[i] + "@gmail.com" + "\")\n")
    i += 1
f.write("\n")

i = 0
while i < 20:
    f.write("INSERT INTO incidencia VALUES (" + str(i + 2) + ", " + str(i + 1) + ", \"" + nomes[i] + "@gmail.com" + "\")\n")
    i += 2
f.write("\n")

i = 0
while i < 10:
    f.write("INSERT INTO proposta_de_correcao VALUES (\"" + nomes[i] + "@gmail.com" + "\", " + str(i + 1) + ", \"" + ts[i + 10] + "\", \"" + correcoes[i] + "\")\n")
    i += 1
f.write("\n")

i = 0
while i < 10:
    f.write("INSERT INTO correcao VALUES (\"" + nomes[i] + "@gmail.com" + "\", " + str(i + 2) + ", " + str(i + 1) + ")\n")
    i += 1
f.write("\n")

f.close()
