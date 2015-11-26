**Пример вызова методов** 

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