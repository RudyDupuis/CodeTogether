symfony console lexik:jwt:generate-keypair
sleep 5
setfacl -R -m u:www-data:rX -m u:$(whoami):rwX /srv/api/config/jwt
setfacl -dR -m u:www-data:rX -m u:$(whoami):rwX /srv/api/config/jwt
exec "$@"
