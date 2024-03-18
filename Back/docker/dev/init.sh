# add key for jwt
symfony console lexik:jwt:generate-keypair

setfacl -R -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt
setfacl -dR -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt

# start the server
symfony server:ca:install
symfony serve --port=5001