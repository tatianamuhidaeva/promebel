<?php
function show_robots(){

	header('Content-type: text/plain; Charset=UTF-8');
	print d()->Robot->text;
}