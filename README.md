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
