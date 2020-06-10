#Laravel Mailchimp subscription

### How to use this
```sh
- Rename .env.example to .env
- Fill in database info
- Fill in mailchimp info, you need api key and list id
- run in console
    - php artisan migrate --seed 
    - php artisan schedule:run
```
Additional commands:
* subs:add -> adds all subscribers to mailchimp audience
* subs:refresh -> checks mailchimp audience and updates our subscribers status accordingly
 
