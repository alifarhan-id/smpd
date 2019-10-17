    @echo off
   SET PGPASSWORD=sikp
   echo on
   psql -f E:\schedule_surat_teguran\query_update_denda_skpdkb_jabatan.sql -h 172.16.20.3 -p 5444 -U sikp sikp_db
   