<?php
/*
	Модуль для работы с текстовыми страницами, для вывода меню, выода подстраниц
*/
class PagesController
{
	function cook () {
		if (d()->validate('cook')) {
			setcookie("_politika", 'agree', 0x7FFFFFFF, '/');
			
			print '$(".cook_foot").hide();';
		}
		
		d()->reload();
	}

	function show()
	{
		$url = url();
		d()->this = d()->Page->find_by_url($url);
		if (d()->this->is_empty) {
			$mas = array ();
			$mas[] = array ('title' => 'Главная', 'link' => '/');
			$mas[] = array ('title' => 'Ошибка 404');
			d()->message="Такой страницы не существует".d()->add(array('pages','url'=>$url));
			d()->breadcrumbs = $mas;
			return d()->error('404');
		}
		$mas = array ();
		$mas[] = array ('title' => 'Главная', 'link' => '/');
		$mas[] = array ('title' => d()->this->title, 'link' => d()->this->link);
		d()->breadcrumbs = $mas;
		
		print d()->view();
	}

	function contacts()
	{
		$url = url();
		d()->this = d()->Page->find_by_url($url);
		if (d()->this->is_empty) {
			d()->message="Такой страницы не существует".d()->add(array('pages','url'=>$url));
			return d()->error('404');
		}
		$mas = array ();
		$mas[] = array ('title' => 'Главная', 'link' => '/');
		$mas[] = array ('title' => d()->this->title, 'link' => d()->this->link);
		d()->breadcrumbs = $mas;
		
		print d()->view();
	}
	function reviews()
	{
		$url = url();
		d()->this = d()->Page->find_by_url($url);
		if (d()->this->is_empty) {
			d()->message="Такой страницы не существует".d()->add(array('pages','url'=>$url));
			return d()->error('404');
		}
		$mas = array ();
		$mas[] = array ('title' => 'Главная', 'link' => '/');
		$mas[] = array ('title' => d()->this->title, 'link' => d()->this->link);
		d()->breadcrumbs = $mas;
		
		print d()->view();
	}

}

