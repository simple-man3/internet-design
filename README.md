# Локальный запуск

```sh
composer i
cp .env.example .env
```

Необходимо в .env файле прописать данные для следующих параметров:

- TICKET_PROVIDER=testApi
- TEST_TICKET_PROVIDER_HOST=<url-to-service>
- TEST_TICKET_PROVIDER_TOKEN=<token-for-api>

также необходимо прописать доступы к бд

после:
```sh
./vendor/bin/sail up -d
sail artisan migrate
```

сервис будет доступен по url: localhost

свагер доступен по url:  localhost/api/documentation
