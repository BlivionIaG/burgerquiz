# Projet CIR2 ISEN Brest/Rennes BurgerQuiz 2018

Le Projet BurgerQuiz comporte deux parties, l'outil d'administration et le site Web.

# Déployement

## Téléchargement

Deux solutions sont possibles pour télécharger le projet :

* Vous pouvez cloner le Git officiel du projet, en utilisant la commande suivante (en supposant que l'utilitaire Git est installé sur votre machine) : 
``` 
git clone https://github.com/BlivionIaG/burgerquiz.git
```
* Vous pouvez télécharger le projet au lien suivant : ![ICI](https://github.com/BlivionIaG/burgerquiz/archive/master.zip) puis le dézipper dans le dossier de votre choix
```
unzip master.zip
```

## Dépendances

### Outil administration système
Pour compiler le projet vous aurez besoin de QT5 et MySQL Connector C++ et de G++

### Site Web
Le site web fonctionne avec PHP7 et MySQL (Oracle ou MariaDB)

## Installation

### La Base de donnée
Pour installer la base, ouvrez MySQL dans la racine du projet :
```
mysql -u root -p
```
* ou si vous n'avez pas mis de mot de passe
```
mysql -u root
```
* Puis chargez le script SQL contenu dans le dossier interfaceWeb/
> Remplacez "Burgerquiz" dans "DROP TABLE Burgerquiz;", "USE Burgerquiz"  
et "CREATE TABLE 
Burgerquiz;" par le nom de votre table ( ou supprimez ces lignes )
```
source interfaceWeb/burgerquiz.sql;
```
Remarque : Si une base du même nom existe, elle sera remplacée, de même dans le cas des tables
* Ensuite, ouvrez votre navigateur et allez sur ![http://localhost/phpmyadmin](127.0.0.1/phpmyadmin)
* Pour finir, il faut modifier le fichier consts.php dans interfaceWeb/php/consts.php
> Remplacez 'Burgerquiz' à la ligne 'DB_USER' par l'utilisateur de la base
	Remplacez 'bq2018' à la ligne 'DB_PASSWORD' par le mot de passe de l'utilisateur
	Remplacez 'Burgerquiz' à la ligne 'DB_NAME' par le nom de la base ('Burgerquiz' par défault avec le script)
	Remplacez 'localhost' à la ligne 'DB_SERVER' par l'addresse de la BDD (si besoin)
```
  define('DB_USER', 'Burgerquiz');
  define('DB_PASSWORD', 'bq2018');
  define('DB_NAME', 'Burgerquiz');
  define('DB_SERVER', 'localhost');
```

### Le Site Web
Pour installer le site web, c'est simple il suffit de copier le contenu de interfaceWeb dans votre dossier sur lequel votre virtualhost pointe.

### L'outil administration système
Allez dans interfaceCpp/burger/
Pour compiler :
```
qmake
make
```
Vous pouvez maintenant executer:
```
./burger
```
