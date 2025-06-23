1.Описание сусщности клиент
Принцип разделения ответственности (SOLID)
То есть:
✅ Валидация — через Form Request (ClientRequest) файлы (StoreClientRequest и UpdateClientRequest)


✅ Бизнес-логика — через ClientService


✅ использование DTO 

✅ Контроллер — только маршрутизация и возврат ответа (ClientController)

Таблица сама ![Screenshot from 2025-06-23 11-47-50](https://github.com/user-attachments/assets/9a6a0ba9-dba2-4bf4-9ee5-c50dbe3f4af8)
