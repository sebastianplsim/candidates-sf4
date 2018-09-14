```
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate
bin/console doctrine:fixtures:load
bin/console server:run
yarn encore dev --watch
```

Access to available API actions: `http://127.0.0.1:8000/api`
