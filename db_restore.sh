sudo -u postgres dropdb roacheopen
sudo -u postgres pg_restore -C -d postgres roacheopen.dump
