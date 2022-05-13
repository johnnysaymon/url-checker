# URL Checker

## Configuração

1. Criar uma cópia do arquivo `.env.example` e renomear para `.env`;
2. Definir usuário e local de cache do Composer e NPM;


## Instalar dependências

```
docker compose run --rm composer install
docker compose run --rm npm install
```

## Levantar projeto

```
docker compose up server
docker compose exec server php artisan migrate
docker compose exec server php artisan db:seed
```
