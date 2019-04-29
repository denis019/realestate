startTime=`date +%s%3N`
cd "$(dirname "$0")"
echo "Setting up the environment..."

echo "Do you want to overwrite the .env (if not, you need to manually update your .env files) [Y/N]? "
read overwriteEnvFiles
if [ $overwriteEnvFiles == "y" ] || [ $overwriteEnvFiles == "Y" ] ; then
    cp ../.env.example ../.env
fi

echo "Starting Docker..."

export MSYS_NO_PATHCONV=1;
docker-compose up --build -d
docker exec real_estate_php_fpm composer install
docker exec real_estate_php_fpm php artisan migrate
docker exec real_estate_php_fpm chgrp -R www-data storage bootstrap/cache
docker exec real_estate_php_fpm chmod -R ug+rwx storage bootstrap/cache

endTime=`date +%s%3N`
runtimeInSeconds=$(expr $(expr $endTime - $startTime) / 1000)
runtimeInMinutes=$(expr $runtimeInSeconds / 60)
remainingSeconds=$(expr $runtimeInSeconds - $(expr $runtimeInMinutes "*" 60))
echo "Runtime is: $runtimeInMinutes minutes and $remainingSeconds seconds"
