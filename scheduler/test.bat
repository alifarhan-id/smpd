    @echo off
   SET PGPASSWORD=sikp
   echo on
   psql -f test.sql -h 172.16.20.3 -p 5444 -U sikp sikp_db 
   pause
