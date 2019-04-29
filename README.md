# Real estate xml ads parser
- Based on Porto (Software Architectural Pattern) https://github.com/Mahmoudz/Porto
- APIATO https://github.com/apiato/apiato

# Used libraries
- https://github.com/Rodenastyle/stream-parser
- https://github.com/andersao/l5-repository

# Requirements
- Docker
- Ports 3306, 80, 443, 6379 should be available on your host machine, stop your local mysql, nginx, redis

# Installation
- ```git clone git@github.com:denis019/realestate.git```
- ```cd realestate```
- ```./Docker/setup.sh```
- Update your hosts file ```127.0.0.1 api.realestate.test```

# Import Ads
```docker exec real_estate_php_fpm php artisan ads:migrate```

# API
### Sorting & Ordering
```https://api.realestate.test/v1/ads?orderBy=city&sortedBy=asc```
- you can order by any Ad field id, title, link, city, image_url. 
- SortedBy options: asc, desc

### Searching
```https://api.realestate.test/v1/ads?search=title:Wonderful%20shared```

For more query params check http://docs.apiato.io/features/query-parameters

# Run tests
```docker exec real_estate_php_fpm ./vendor/bin/phpunit```