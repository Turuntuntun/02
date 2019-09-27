# Логика программы
# Файл index.php
1. Открывает файл result.txt(файл с данными).
2. Считывает id пользователя из куки.
3. Если куки нет, получает id из файла(Последний id + 1).
4. Записывает результат с id в файл result.txt.
5. Запускает шаблон layouts/layout.php
# Файл layout.php
1. Заполняется верстка.
2. Подкдючается файл styles.css и библиотека jQuery.
3. Считывает нажатия на кнопки.
4. Описывается два ajax - запроса ( на файл addLink.php и showLinks.php).
# Файл addLink.php
1. Открывает файл result.txt(файл с данными).
2. Случайным образом формирует короткую ссылку из 3-5 символов.
3. Изменяет массив (добавляет новую ссылку к пользователю), взятых по id пользователя, записанных в куки.
4. Записвает измененный массив в result.txt
5. Заполняет строку с редиректом в конец файла .htacces, формата /helpers/updateCount.php?link=Короткая ссылка&fullLink=Длинная ссылка.
# Файл showLinks.php
1. Открывает файл result.txt(файл с данными).
2. Формирует таблицу из данных, взятых по id пользователя, записанных в куки.
3. Возвращает таблицу в формате Json в layout.php, после чего выводится в DOM.
# Файл updateCount.php
1. Получает данные из GET запроса.
2. Открывает файл result.txt(файл с данными).
3. Ищет ключ по значению короткой ссылки и увеличивает значение количества переходов на 1.
4. Пересылает на искомую ссылку.

# План тестирования.
1. Зайти на главную страницу.
2. В поле записать ссылку и нажать кнопку ввести.
3. В зависимости от корректности ссылки она может добавится или нет.
4. Нажать на кнопкупоказать список ссылок.
5. Перейти по короткой ссылке и должна открыться длинная ссылка.
6. Проверить увелечение количества переходов.

# Тестирование 
Я проводил тестирование через ab.
1. Я провели в общей сложности 10000 запросов для 10 параллельных клиентов. Из них было 0 запросов, завершившихся ошибкой вебсервера
2. Я получили производительность вебсервера 142 запроса в секунду
3. Среднее время обработки 1 запроса 70.332 мс, т.е. 0.070 секунды
4. 50% запросов выполнились за 64 мс, еще 40% запросов за 101 мс, самый долгий запрос составил 476 мс.

# Оптимизация
По моему мнению оптимизацию можно произвести двумя способами:
1. Изменением кода на ООП.
2. Вместо файла в качестве хранилища данных использовать базу данных + кешировать нужные данные отдельно для пользователя.
