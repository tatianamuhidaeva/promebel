<?php
class NewsController
{
	function show($url)
	{
		d()->this = d()->News->find_by_url($url);
		if (d()->this->is_empty) {
			$mas = array ();
			$mas[] = array ('title' => 'Главная', 'link' => '/');
			$mas[] = array ('title' => 'Новости', 'link' => '/news');
			$mas[] = array ('title' => 'Ошибка 404');
			d()->message="Такой страницы не существует".d()->add(array('news','url'=>$url));
			d()->breadcrumbs = $mas;
			return d()->error('404');
		}
		$mas = array ();
    $mas[] = array ('title' => 'Главная', 'link' => '/');
		$mas[] = array ('title' => 'Новости', 'link' => '/news');
		$mas[] = array ('title' => d()->this->title, 'link' => '/news/' . d()->this->url);
		d()->breadcrumbs = $mas;
		print d()->view();
	}

	function index()
	{
		$url = url();
		d()->this = d()->Page->find_by_url($url);
		d()->news = d()->News;
		d()->news->order_by('date_at desc');
		if (d()->this->is_empty) {
			d()->message="Запрашиваемая страница не найдена".d()->add(array('pages','url'=>$url));
			return d()->error('404');
		}
		$mas = array ();
		$mas[] = array ('title' => 'Главная', 'link' => '/');
		$mas[] = array ('title' => d()->this->title, 'link' => d()->this->link);
		d()->breadcrumbs = $mas;
		d()->news->paginate(d()->Option->news_paginator);
		d()->paginator = d()->Paginator->generate(d()->news);
		print d()->view();
	}
	
	
}

