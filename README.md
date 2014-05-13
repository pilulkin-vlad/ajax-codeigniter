Main rules of install
=======

Добавить в /application/config/routes.php  
- $route['send'] = 'ajax/index'; (после $route['default_controller']).

Запросы осуществляются через sendQ.send('types','query'); //В QUERY можно передать Object,String,Int
На сервере проверка по TYPES


