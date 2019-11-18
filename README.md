# Propertiese Serach Table
 - laravel@6.2
 - vue@2.5.17
## Installation
 - `git clone git@github.com:SupachaiTho/laravel-fazwaz-test.git`
 - `cd laravel-fazwaz-test`
 - `composer install`
 - `npm install`
 - `npm run dev`
 - create `mysql` at local following
  ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_fazwaz_test
    DB_USERNAME=root
    DB_PASSWORD=root
  ```
 - `php artisan migrate:fresh --seed`
 - `php artisan serve`
 - visit http://127.0.0.1:8000/

## Feature
 - Filtering with Text (non sensitive-case)
 - Filterng by Select
 - Sorting
## Testing (phpunit)
### test Seeding (state 3)
 - at default this test will be skipped.
 - make the change following the comment in `tests/Unit/SeederTest.php`
 - then run `phpunit --testsuite Seeder`
### Unit test
 - test all model attribute and relationship.
 - test Feature test
 - test all api in project
## Demo
 - https://laravufazwaz.herokuapp.com/
 - database is not match at State 3 because of issue with free-plan on heroku, it terminate the process after run for 2 hours still not finish.
## Future Implement
 - Implement materialized view for this code, so the App will much more faster.
 ```
Property::join('property_types', 'properties.property_type_id', 'property_types.id')
          ->join('statuses', 'properties.status_id', 'statuses.id')
          ->join('projects', 'properties.project_id', 'projects.id')
          ->join('regions', 'properties.region_id', 'regions.id')
          ->join('countries', 'regions.country_id', 'countries.id')
```
 - Implement feture test for sort and filter at PropertiesApi, now we have style to test the whole data from request with data from Database via PropretyResource