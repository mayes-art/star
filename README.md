# Star專案

## 資訊

- Laravel 8.73.2

## Mac、Linux建置

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

## Windows 建置

有以下兩種方式: 

1. 使用laradock

2. 安裝WSL2 (安裝後與Mac、Linux建置方式相同)


## 服務

- MySQL
- Redis
- PHP


## DB設置
因使用MySQL8，需調整密碼驗證方式

進入mysql容器內登入，執行:
```bash
MySQL> ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'password';

MySQL> FLUSH PRIVILEGES;
```

## 排錯工具

服務啟動後，使用路徑

http://localhost/telescope




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
