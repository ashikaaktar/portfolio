@echo off
title Ashika Portfolio Live Server
echo ========================================================
echo        ASHIKA PORTFOLIO - STARTING LIVE SERVER
echo ========================================================
echo.
echo [1/2] Starting local background services...
start "" "C:\xampp\mysql\bin\mysqld.exe" --defaults-file="C:\xampp\mysql\bin\my.ini" --standalone
start "" "C:\xampp\php\php.exe" artisan serve --port=8000
timeout /t 3 /nobreak >nul
echo.
echo [2/2] Launching Cloudflare Live Public Tunnel...
echo.
echo ========================================================
echo COPY THE HTTPS URL BELOW AND SHARE WITH ANYONE!
echo ========================================================
echo.
"%LOCALAPPDATA%\Programs\cloudflared.exe" tunnel --url http://127.0.0.1:8000
pause
