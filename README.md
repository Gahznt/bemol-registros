<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Considerações iniciais
O projeto foi desenvolvido localmente e todo conteinerizado, então, caso for testar no Windows, recomendo fortemente que seja testado usando WSL para emular o Linux, pois rodar o docker no windows gera lentidão no sistema, fato que se dá por conta do docker ter que rodar o kernel do linux por "de baixo dos panos". Então recomendo fortemente que caso for testar no Windows, utilize o WSL (nada impede de testar sem o WSL, porém ficará mais lento por conta dessa estrutura do windows->docker.)
## Requisitos

- Docker com docker-compose instalados.
- A aplicação irá utilizar as portas 80 e 3360, então essas portas devem estar desocupadas.

## Rodar a aplicação

- Após clonar a aplicação no diretório desejado, antes de tudo, deve-se configuar o arquivo .env, basta copiar o arquivo `.env.example` e renomear para `.env`
- Os dados para conexão com o banco estão no arquivo `docker-compose.yml`.
## NOTA DE ATENÇÃO:
Como o banco está conteinerizado pelo docker, no .env na váriavel `DB_HOST` preencha o valor com `db`, assim ele irá reconhecer o host como o container do mysql.

- Agora com o .env configurado, basta rodar os comandos em sequencia:

- `docker-compose up -d`
- `docker exec bemol-app composer install`
- `docker exec bemol-app php artisan key:generate`
- `docker exec bemol-app php artisan migrate`
- `docker exec bemol-app chmod -R ugo+rw storage`

- Com isso a aplicação já deverá estar funcionando, basta acessar `127.0.0.1` ou `localhost` no navegador

