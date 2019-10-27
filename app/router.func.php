<?php
//Автоматически регистрировать все контроллеры
route_all();

route('/error_404', 'error_404');
route('/', 'pages#');
route('/reviews', 'pages#reviews');
route('/contacts', 'pages#contacts');
route('/catalogs', 'catalogs#index');
route('/catalogs/', 'catalogs#show');
route('/services/', 'services#show');

route('/ajax/popup', 'main', 'popup#popup');
// route('/ajax/thanks', 'main', 'popup#thanks');

route('/ajax/form1', 'main', 'popup#send_form');

route('/robots.txt', 'main', 'show_robots');
route('/ajax/cook', 'main', 'pages#cook');


