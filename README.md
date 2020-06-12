#Laravel Mailchimp subscription

### How to use this
```sh
- Rename .env.example to .env
- Fill in database info
- Fill in mailchimp info, you need api key and list id
- run in console
    - php artisan migrate --seed 
    - php artisan schedule:run (Need to setup crontab entry)
```
Additional commands:
* subscribers:add -> adds all subscribers to mailchimp audience
* subscribers:refresh -> checks mailchimp audience and updates our subscribers status accordingly
 
