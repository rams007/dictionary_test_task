
Условие:

1.  Необходимо разработать API сервис словаря английских слов.

2.  Реализовать сущность словаря и слова. Должны быть реализованы следующие функциональные возможности:

3.  Создавать/удалять словари. Имя словаря ограничено 50 символами, максимальное количество слов в словаре - 100.

4.  Находить и выводить информацию определения и примеры использования слова, используя для этого API сервис api.dictionaryapi.dev.

5.  Добавлять слова в словарь и удалять их из него.

6.  Вывод всех словарей в отсортированном и пагинированном виде по возрастанию имени (по 10 элементов).

7.  Вывод добавленных слов в словарь в отсортированном и пагинированном виде по возрастанию имени (по 20 элементов).

8.  При превышении лимита слов в словаре отправлять администратору на почту предупреждение (админ почта задается в переменных окружения).


Упрощения: 
- отсутствует модели пользоватеоей и все связанніе с ней функции ( авторизацияб привязка словарей к пользователям)
- отсутсвует функционал редактирования сущностей
