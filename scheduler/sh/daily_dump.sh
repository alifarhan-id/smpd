tanggal=$(date +'%Y-%m-%d_%H-%M')
PGPASSWORD='bapendalokut@)!&' /opt/PostgresPlus/9.5AS/bin/pg_dump -U sikp -f '/home/mpdklu/backup_db/bapenda_db_'$tanggal'.sql' -p 5444 bapenda_db
gzip '/home/mpdklu/backup_db/bapenda_db_'$tanggal'.sql'
chmod 777 '/home/mpdklu/backup_db/bapenda_db_'$tanggal'.sql.gz'
