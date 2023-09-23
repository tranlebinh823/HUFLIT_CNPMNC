Đầu tiên git clone project
composer install
composer update
npm install
npm run dev
chỉnh database trong env tương ứng
chạy php artisan migrate:refresh
chạy lần lượt 
php artisan db:seed --class=PermissionTableSeeder
php artisan db:seed --class=CreateAdminUserSeeder


chạy php artisan serve :
truy cập/login để đăng nhập
admin@gmail.com
password
