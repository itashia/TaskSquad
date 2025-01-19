## TaskSquad

A Tasks Management Project Based on Laravel and Livewire 

## How to use

To install, proceed in the following order.

1- Download - Install and Run:

```bash
git clone https://github.com/Rayiumir/TaskSquad.git
cd /TaskSquad
composer install
php artisan migrate
php artisan serve
```
2- Run Seeders:

```bash
php artisan db:seed --class=PermissionsSeeder
php artisan db:seed --class=RolesSeeder
php artisan db:seed --class=StatusSeeder
```

