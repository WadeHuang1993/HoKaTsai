# 心理諮商診所入口網站

## 開發環境需求
- Docker
- Docker Compose
- Git

## 開發環境設定
1. 複製專案
```bash
git clone git@github.com:WadeHuang1993/HoKaTsai.git
cd HoKaTsai
```

2. 複製環境設定檔
```bash
cp .env.example .env
```

3. 啟動開發環境
```bash
cd laradock
docker-compose up -d
```

4. 進入 workspace 容器
```bash
docker-compose exec workspace bash
```

5. 安裝依賴套件
```bash
composer install
npm install
```

6. 產生應用程式金鑰
```bash
php artisan key:generate
```

7. 建立 storage 連結
```bash
php artisan storage:link
```

8. 編譯前端資源
```bash
npm run dev
```

9. 設定資料庫
```bash
php artisan migrate
```

10. 設定權限
```bash
chmod -R 777 storage bootstrap/cache
```

## 開發指令
- 啟動開發環境：`docker-compose up -d`
- 停止開發環境：`docker-compose down`
- 進入容器：`docker-compose exec workspace bash`
- 執行 Laravel 指令：`docker-compose exec workspace php artisan [command]`
- 執行 Composer 指令：`docker-compose exec workspace composer [command]`
- 執行 NPM 指令：`docker-compose exec workspace npm [command]`

## 專案結構
- `app/` - 應用程式核心程式碼
- `config/` - 設定檔
- `database/` - 資料庫遷移和種子
- `public/` - 公開資源
- `resources/` - 視圖和前端資源
- `routes/` - 路由定義
- `storage/` - 檔案儲存
- `tests/` - 測試檔案

## 開發規範
- 遵循 PSR-4 自動載入標準
- 使用 Laravel 9 框架
- 使用 MongoDB 作為資料庫
- 使用 Tailwind CSS 進行樣式設計

## 部署步驟
1. 複製專案到伺服器
```bash
git clone [repository_url]
cd [project_name]
```

2. 複製環境設定檔
```bash
cp .env.example .env
```

3. 修改 .env 檔案
- 設定資料庫連線資訊
- 設定應用程式金鑰
- 設定其他環境變數

4. 安裝依賴套件
```bash
composer install --no-dev --optimize-autoloader
npm install
npm run production
```

5. 產生應用程式金鑰
```bash
php artisan key:generate
```

6. 建立 storage 連結
```bash
php artisan storage:link
```

7. 設定資料庫
```bash
php artisan migrate
```

8. 設定權限
```bash
chmod -R 777 storage bootstrap/cache
```

9. 設定 Web 伺服器
- 設定 Nginx 或 Apache
- 設定 SSL 憑證（如需要）

10. 啟動佇列處理程序（如需要）
```bash
php artisan queue:work
```

## 注意事項
- 確保 storage 和 bootstrap/cache 目錄具有寫入權限
- 定期備份資料庫
- 定期更新依賴套件
- 遵循安全性最佳實踐

## 授權
[授權說明]
