## projet Chocoblast
### 1 Clone du repository ou un fork
```bash
git clone https://github.com/evaluationWeb/projet-chocoblast.git # ou le votre si fork
cd projet-chocoblast
```
### 2 Editer le fichier composer.json (avec vos propres valeurs)
### 3 installer les dépendances
```bash
composer install
```
### 4 créer un fichier .env si vous utilisez avec le serveur PHP avec les entrées suivantes :
```env
DATABASE_HOST=localhost
DATABASE_NAME="nom BDD"
DATABASE_USERNAME="Login de BDD" 
DATABASE_PASSWORD="Password de la BDD"
```
### 5 démarrer le projet :
```bash
php -S 127.0.0.1:8000 -t public
```

## lancer le projet avec Docker
### 1 créer une copie de .env.example avec vos valeurs  
### (ports externes apache et mysql)  
```env
# Configuration de la base de données
DATABASE_HOST=mysql
DATABASE_NAME=chocoblast
DATABASE_USERNAME=app_user
DATABASE_PASSWORD=app_password

# Configuration MySQL Root (pour Docker)
DB_ROOT_PASSWORD=rootpassword

# Configuration de l'application
APP_ENV=development
APP_DEBUG=true
APP_URL=http://localhost

# Configuration des ports (pour Docker)
APACHE_PORT=8000
MYSQL_PORT=3307
```
### 2 Builder l'image 
```bash
# build image docker
docker compose up -d --build
# démarrer si build
docker compose up -d
```

### 3 lancer le projet
Le projet est accessible sur l'url (si port apache : 8000) 
http://localhost:8000

