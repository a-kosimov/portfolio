1.Описание сусщности клиент

Принцип разделения ответственности (SOLID)

То есть:

✅ Валидация — через Form Request (ClientRequest) файлы (StoreClientRequest и UpdateClientRequest)
https://github.com/a-kosimov/portfolio/blob/main/app/Http/Requests/StoreClientRequest.php

https://github.com/a-kosimov/portfolio/blob/main/app/Http/Requests/UpdateClientRequest.php

✅ Бизнес-логика — через ClientService
https://github.com/a-kosimov/portfolio/blob/main/app/Services/ClientService.php

✅ использование DTO 
https://github.com/a-kosimov/portfolio/blob/main/app/DTOs/ClientDTO.php

✅ Контроллер — только маршрутизация и возврат ответа (ClientController)
https://github.com/a-kosimov/portfolio/blob/main/app/Http/Controllers/ClientController.php

Таблица сама

![Screenshot from 2025-06-23 11-47-50](https://github.com/user-attachments/assets/9a6a0ba9-dba2-4bf4-9ee5-c50dbe3f4af8)

Проверка: api - Route::apiResource('clients', ClientController::class);

GET id

![Screenshot from 2025-06-23 11-52-16](https://github.com/user-attachments/assets/265fe4fb-938a-4ad8-abaa-f6904379893e)

GET all
![Screenshot from 2025-06-23 11-52-43](https://github.com/user-attachments/assets/6a3b534e-1b2d-4627-9f95-941b6f86071a)


Post create
![Screenshot from 2025-06-23 11-47-50](https://github.com/user-attachments/assets/cbfae51d-863b-4032-835d-137e79d4f9c2)


Другой пример (еще сырой):

Поиск в реальном времени 



![Screenshot from 2025-06-23 11-55-24](https://github.com/user-attachments/assets/b1ade080-82e8-404b-b127-8af8e48a51f4)


Контроллер:

https://github.com/a-kosimov/portfolio/blob/main/app/Http/Controllers/ProductController.php
