# Star專案

## 資訊

- Laravel 8.73.2

## 建置

- 執行install
```bash
composer install --ignore-platform-reqs 
```

- 複製環境變數
```bash
cp .env.example .env
```
如有和本機其他服務port衝突，請自行調整 .env ，加入:

```bash
APP_PORT=自訂埠號
FORWARD_DB_PORT=自訂埠號
FORWARD_REDIS_PORT=自訂埠號
```

- 啟動服務
```bash
./vendor/bin/sail up -d
```

啟動後可call **http://localhost/info**

- 停止服務
```bash
./vendor/bin/sail down
```

## 服務

- MySQL
- Redis
- PHP



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
