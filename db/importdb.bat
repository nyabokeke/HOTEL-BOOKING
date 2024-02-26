@echo off

rem Set the path to the MySQL executable in XAMPP
set MYSQL_PATH=C:\xampp\mysql\bin

rem Set the database credentials
set DB_USER=root
set DB_PASSWORD=
set DB_NAME=hotel

rem Set the path to your SQL file
set SQL_FILE_PATH=./hotel.sql

rem Check if the database exists, create it if not
"%MYSQL_PATH%\mysql.exe" -u %DB_USER% -p%DB_PASSWORD% -e "CREATE DATABASE IF NOT EXISTS %DB_NAME%;"

rem Execute the MySQL command to import the SQL file
"%MYSQL_PATH%\mysql.exe" -u %DB_USER% -p%DB_PASSWORD% %DB_NAME% < "%SQL_FILE_PATH%"

pause
