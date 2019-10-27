<?php
class CatalogsController
{
	function show($url){
		d()->this = d()->Catalog->find_by_url($url);
		if (d()->this->is_empty) {
			$mas = array ();
			$mas[] = array ('title' => 'Главная', 'link' => '/');
			$mas[] = array ('title' => 'Каталог', 'link' => '/catalogs');
			$mas[] = array ('title' => 'Ошибка 404');
			d()->message="Такой страницы не существует".d()->add(array('catalogs','url'=>$url));
			d()->breadcrumbs = $mas;
			return d()->error('404');
		}
		d()->cat = d()->this;
		$mas = array ();
		$mas1 = array ();
    while (true) {
      $mas1[] = array ('title' => d()->cat->title, 'link' => '/catalogs/' . d()->cat->url);
      d()->cat = d()->Catalog->where('id = ?', d()->cat->catalog_id);
      if (d()->cat->is_empty) {
        break;
      }
		}
    $mas1[] = array ('title' => 'Каталог', 'link' => '/catalogs');
    $mas1[] = array ('title' => 'Главная', 'link' => '/');
		$mas = array_reverse($mas1);
		d()->breadcrumbs = $mas;
		
		print d()->view();
	}


	function index()
	{
		$url = url();
		d()->this = d()->Page->find_by_url($url);
		if (d()->this->is_empty) {
			d()->message="Запрашиваемая страница не найдена".d()->add(array('pages','url'=>$url));
			return d()->error('404');
		}
		$mas = array ();
		$mas[] = array ('title' => 'Главная', 'link' => '/');
		$mas[] = array ('title' => d()->this->title, 'link' => d()->this->link);
		d()->breadcrumbs = $mas;
		print d()->view();
	}
}

