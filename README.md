1/ Thiết kế database
Hãy xem thiết kế ở link này. Nó đầy đủ tables và những liên kết của các tables
https://drawsql.app/teams/roberts-team-5/diagrams/health-app

2/ Cách để chạy source code 

PHP: >= 7.4
Mysql: 8

Tải source code và chạy những lệnh sau:
cd health-app
cp .env.example .env
 
Ở trong file .env bạn hãy thêm database mới của bạn vào




DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=health-app
DB_USERNAME=root
DB_PASSWORD=12345678


Sau đó chạy:
composer install
php artisan migrate

Tôi đã tạo fake data, bạn chạy lệnh này để tự động tạo data trong database.
php artisan db:seed

3/ Hiểu rõ hơn về tables trong database
Tất cả các tables rất tường mình, đọc và là hiểu.
Nhưng những bản này cần được hiểu nhiều hơn:

meals table: là bảng để cho phép tạo thêm các tuỳ chọn bữa ăn, nên rất là linh hoạt cho ai muốn thêm nhiều học chỉnh sửa (morning, lunch, dinner, snack,...)

meal_targets: bảng dùng để ghi mục tiêu đặt ra của user.

recommendation_categories table: bảng để chứa Danh sách các categories, bạn có thể dùng API để thêm recommendation vào tuỳ ý (column, beauty, diet, heathy, …)

4/ Về API
Tôi sử dụng postman để test api, bạn có thể xem mọi chi tiết API ở trong file tôi sẽ gửi bạn.
Có 2 files: environment và collection

Bạn có thể coi trong format json trong postman
E.g
{
   "status": 200,
   "success": true,
   "data": {
       "name": "dinner 1",
       "status": 1,
       "updated_at": "2023-02-06T11:00:50.000000Z",
       "created_at": "2023-02-06T11:00:50.000000Z",
       "id": 6
   }
}


