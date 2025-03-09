# Отчет по лабораторной работе №3: Массивы и Функции

## Инструкции по запуску проекта

1. Установите PHP (если не установлен).
2. Скачайте файлы `index_part_one.php` и `index_part_two.php`.
3. Откройте нужный файл в `Visual Studio Code`.
4. Откройте терминал и запустите локальный сервер с помощью команды:
   ```sh
   php -S localhost:8000 -t .
   ```
5. Откройте браузер и перейдите по адресу:
- Для первой части лабораторной - `http://localhost:8000/index_part_one.php`
- Для второй части лабораторной - `http://localhost:8000/index_part_two.php`

## Описание лабораторной работы

Цель работы – освоить использование массивов, функций и циклов в PHP. В рамках работы реализуется обработка транзакций с использованием функций и вывод галереи изображений с применением циклов.

## Краткая документация к проекту

1. Файл `index_part_one.php` содержит реализацию системы управления транзакциями с функциями для подсчета суммы, поиска и добавления транзакций, а также вывод таблицы с данными.
2. Файл `index_part_two.php` демонстрирует работу цикла `for` для создания галереи изображений из заданной директории.

## Фрагменты кода, описание выполнения заданий

### `index_part_one.php`:

В этом файле реализована система управления транзакциями с использованием массивов и функций. Основные задачи:
- Создание массива транзакций с полями `id`, `date`, `amount`, `description`, `merchant`.
- Реализация функций:
  - `calculateTotalAmount` – подсчитывает общую сумму транзакций.
  - `findTransactionByDescription` – ищет транзакции по описанию.
  - `findTransactionById` – ищет транзакцию по идентификатору.
  - `daysSinceTransaction` – вычисляет количество дней с даты транзакции.
  - `addTransaction` – добавляет новую транзакцию в глобальный массив.
- Сортировка транзакций по дате и сумме с использованием `usort`.
- Вывод таблицы транзакций в HTML с использованием цикла `foreach`.

Пример кода функции и вывода таблицы:
```php
function calculateTotalAmount(array $transactions): float {
    $total = array_sum(array_column($transactions, 'amount'));
    return $total;
}

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Merchant</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction) {
            echo "<tr>
                <td>{$transaction['id']}</td>
                <td>{$transaction['date']}</td>
                <td>" . number_format($transaction['amount']) . "</td>
                <td>{$transaction['description']}</td>
                <td>{$transaction['merchant']}</td>
            </tr>";
        } ?>
    </tbody>
</table>
```

### `index_part_two.php`:

В этом файле реализована галерея изображений с использованием цикла `for` и работа с файлами. Основные задачи:
- Сканирование директории `image/` для получения списка файлов.
- Фильтрация файлов по допустимым расширениям (`jpg`, `jpeg`).
- Вывод изображений в виде галереи с использованием HTML и CSS.

Пример кода цикла:
```php
$dir = 'image/';
$files = array_diff(scandir($dir), [".", ".."]);
$files = array_values($files);
$allowed_extensions = ['jpg', 'jpeg'];

for ($i = 0; $i < count($files); $i++) {
    $extension = strtolower(pathinfo($files[$i], PATHINFO_EXTENSION));
    if (in_array($extension, $allowed_extensions)) {
        $path = $dir . $files[$i];
        echo "<img src='$path'>";
    }
}
```

## Ответы на контрольные вопросы

TODO: 

## Список использованных источников

- Официальная документация PHP: [https://www.php.net/manual/ru/](https://www.php.net/manual/ru/)
- Руководство по лабораторной работе (предоставлено преподавателем).

## Дополнительные важные аспекты

- В `index_part_one.php` использованы строгая типизация (`declare(strict_types=1)`) и PHPDoc для документирования функций.
- В `index_part_two.php` применены базовые стили CSS для оформления галереи.
