# KTH Bibliotekets Språk Tandem
Applikation för Språk

##

###


#### Dependencies

PHP 7.3 och MySql 5.6

- OBS med MySql 8.0 blev vissa frågor extremt långsamma. Någon sida tog 14-16 sekunder istället för 1-2 sekunder

##### Installation

1.  Skapa folder på server med namnet på repot: "/local/docker/tandem"
2.  Skapa och anpassa docker-compose.yml i foldern
```
version: "3.6"

services:
  tandem:
    container_name: tandem
    depends_on:
      - tandem-db
    image: ghcr.io/kth-biblioteket/tandem:${REPO_TYPE}
    restart: unless-stopped
    labels:
      - "traefik.enable=true"
      - "traefik.http.routers.tandem.rule=Host(`${DOMAIN_NAME}`) && PathPrefix(`${PATHPREFIX}`)"
      - "traefik.http.routers.tandem.entrypoints=websecure"
      - "traefik.http.routers.tandem.tls=true"
      - "traefik.http.routers.tandem.tls.certresolver=myresolver"
    volumes:
      - /local/docker/tandem/config.php:/var/www/html/tandem/config.php
    networks:
      - "apps-net"

  tandem-db:
    container_name: tandem-db
    image: mysql:5.6
    volumes:
      - persistent-tandem-db:/var/lib/mysql
      - ./dbinit:/docker-entrypoint-initdb.d
    restart: unless-stopped
    command: --default-authentication-plugin=mysql_native_password --character-set-server=utf8mb4 --collation-server=utf8mb4_unicode_ci
    environment:
      LANG: C.UTF-8
      MYSQL_DATABASE: ${DB_DATABASE}
      MYSQL_USER: ${DB_USER}
      MYSQL_PASSWORD: ${DB_PASSWORD}
      MYSQL_ROOT_PASSWORD: ${DB_ROOT_PASSWORD}
    networks:
      - "apps-net"

volumes:
  persistent-tandem-db:

networks:
  apps-net:
    external: true
```
3.  Skapa och anpassa .env(för composefilen) i foldern
```
DB_DATABASE=tandemlearn
DB_USER=tandem
DB_PASSWORD=xxxxx
DB_ROOT_PASSWORD=xxxxx
PATHPREFIX=/tandem
DOMAIN_NAME=apps-ref.lib.kth.se
REPO_TYPE=ref
```
4.  Skapa och anpassa config.php (för applikationen) i foldern
```
<?php

$return_url="https://www.kth.se/biblioteket/testtesttest/thomas/tandem-admin/login.php";
$app_url="https://www.kth.se/biblioteket/testtesttest/thomas/tandem-admin/index.php";
$tandem_home="https://www.kth.se/biblioteket/testtesttest/thomas";

$tandemapi = 'tandem-api/v1/'

$kth_auth_endpoint = 'https://login.ref.ug.kth.se/adfs';
$kth_client_id ='xxxxxxxxxxxx';
$kth_client_secret ='xxxxxxxxxxxx';

$DB_HOST="tandem-db";
$DB_DATABASE="tandemlearn";
$DB_USERNAME="tandem";
$DB_PASSWORD="xxxxx";

?>
```
5. Skapa dbinit folder med init.sql(för att skapa databasen)
7. Skapa deploy_ref.yml i github actions
7. Skapa deploy_prod.yml i github actions
9. Github Actions bygger en dockerimage i github packages
10. Starta applikationen med docker compose up -d --build i "local/docker/tandem"
11. Importera data från dump

