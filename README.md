**Список методов**
*replaceEmail - автозамена email
*replaceUrl - автозамена url
*truncateText - обрезает текст, без учета html тегов
*stripImages - вырезает изображеие из текста 
*stripScripts - вырезает скрипты из текста 
*toSlug - создает slug из текста 
*stripTags - убираем теги конструкции <X></X>
*html - преобразуем теги для отображения на странице
**Пример вызова некоторых методов**
```php
$text = 'Тест автозамены email в тексте hello@domain.com';
etu::replaceEmail($text);
// Тест автозамены email в тексте <a href="mailto:hello@domain.com">hello@domain.com</a>
```
```php
$text = 'Тест автозамены url в тексте http://domain.com';
etu::replaceEmail($text);
//Тест автозамены url в тексте <a href="http://domain.com">http://domain.com</a>
```
```php
$text = 'Вот логотип нашей компании <img src="logo.png">';
echo etu::stripImages($text);
//Вот логотип нашей компании</a>
```
```php
$text = 'Вот логотип нашей компании';
echo etu::toSlug($text);
//вот-логотип-нашей-компании</a>
```