<?php

/*
	����� - ��������� ��� ������ ������ ��������� � ������ ��������
*/
class SimpleController extends Controller
{
	
	/**
	* ����������� ��������
	*/
	function show($id)
	{
		$model_name=$this->model_name();
		d()->this = d()->{$model_name}->find($id);
		print d()->view();
	}
	

	/**
	* ������ ���� ���������
	*/	
	function index()
	{
		$obj_list= $this->obj_name() . "_list";
		$model_name=$this->model_name();
		d()->{$obj_list} = d()->{$model_name};
		print d()->view();
	}


	
}


