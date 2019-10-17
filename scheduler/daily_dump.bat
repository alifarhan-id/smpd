    @echo off
   for /f "tokens=1-4 delims=/ " %%i in ("%date%") do (
     set dow=%%i
     set month=%%j
     set day=%%k
     set year=%%l
   )
   set datestr=%month%_%day%_%year%
   echo datestr is %datestr%
    
   set BACKUP_FILE=D:/backup_db/sikp_db_%datestr%.sql
   set BACKUP_RAR=D:/backup_db/sikp_db_%datestr%.rar
   echo backup file name is %BACKUP_FILE%
   SET PGPASSWORD=sikp
   echo on
   pg_dump -h 172.16.20.3 -p 5444 -U sikp -f %BACKUP_FILE% sikp_db
   rar a %BACKUP_RAR% %BACKUP_FILE%
   erase D:\backup_db\sikp_db_%datestr%.sql