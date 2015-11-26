**Пример вызова методов** 

    $text = 'Тест автозамены email в тексте hello@domain.com';
    etu::replaceEmail($text); // Тест автозамены email в тексте <a href="mailto:hello@domain.com">hello@domain.com</a>
