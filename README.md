# Real estate xml ads parser
- Based on Porto (Software Architectural Pattern) https://github.com/Mahmoudz/Porto
- APIATO https://github.com/apiato/apiato

# Used libraries
- https://github.com/Rodenastyle/stream-parser
- https://github.com/andersao/l5-repository

# Requirements
- Docker

# Installation
```git clone git@github.com:denis019/realestate.git```
```cd realestate```
```./Docker/setup.sh```

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
```./Docker/setup.sh```