<?php
//Помощники
function edit($params=false){
    if($params===false) {
        $params=array(d()->this);
    }
	if(!is_array($params)) {
		$params=array($params);
		$obj_table = $params[0]->table;
		$obj_id = $params[0]->id;
	}else{
		if(!is_object($params[0])){
			$obj_table = $params[0]['table'];
			$obj_id = $params[0]['id'];
		}else{
			$obj_table = $params[0]->table;
			$obj_id = $params[0]->id;
		}
	}
	
	$attr='';
	if(isset($params['style'])) {
		$attr .= ' style="'.$params['style'].'" ';
	}
	if(isset($params['class'])) {
		$attr .= ' class="'.$params['class'].'" ';
	}else{
		$attr .= ' class="adm_icon" ';
	}

	$need_add_button=false;
	if(isset($params['panel_title'])) {
		$need_add_button=true;
		$panel_button_title = $params['panel_title'];
		unset($params['panel_title']);
	}

	if(isset($params['title'])) {
		$attr .= ' title="'.$params['title'].'" ';
	}
	if(isset($params['fields'])) {
		$addition_params = '?fields='.$params['fields'];
	}else{
		$addition_params = '';
	}	
	if(!isset($_SESSION['admin'])) {
		return ""; //Проверка на права администратора
	}
	if(!iam_allow($obj_table)){
		return '';
	}

	if(isset($params['href'])) {
		print '<a href="'.$params['href'] . $addition_params .'"  style="display:inline;" onclick="if (jQuery.browser.opera && parseInt(jQuery.browser.version) >= 12){window.open(this.href);return false;}"  target="_blank" '.$attr.' ><img style="border:none;"  src="/cms/internal/gfx/edit.png"></a>';
	
		if($need_add_button){
			d()->admin_add_panel_button('/admin/edit/'.$params['href'] . $addition_params,$panel_button_title);
		}
	}elseif(is_string($params[0]) && strpos($params[0],'/')!==false){
		print '<a href="/admin/edit/'.$params[0] . $addition_params .'"  style="display:inline;" onclick="if (jQuery.browser.opera && parseInt(jQuery.browser.version) >= 12){window.open(this.href);return false;}"  target="_blank" '.$attr.' ><img style="border:none;"  src="/cms/internal/gfx/edit.png"></a>';
	
		if($need_add_button){
			d()->admin_add_panel_button('/admin/edit/'.$params[0] . $addition_params,$panel_button_title);
		}
	}else{
		print '<a href="/admin/edit/'.$obj_table.'/'.$obj_id. $addition_params .'"  style="display:inline;" target="_blank" '.$attr.' onclick="if (jQuery.browser.opera && parseInt(jQuery.browser.version) >= 12){window.open(this.href);return false;}" ><img style="border:none;" src="/cms/internal/gfx/edit.png"></a>';
	
		if($need_add_button){
			d()->admin_add_panel_button('/admin/edit/'.$obj_table.'/'.$obj_id. $addition_params,$panel_button_title);
		}
	}
	
}

/**
 *
 * Проверяет, авторизован ли администратор сайта.
 *
 * @param string $username Имя пользователя
 * @return boolean true, если авторизован
 */
function iam($username='')
{
	if($username!=''){
		if(isset($_SESSION['admin']) && ($_SESSION['admin'] == $username)) {
			return true;
		}
	}else{
		if(isset($_SESSION['admin'])) {
			return true;
		}
	}
	return false;
}
function admin_logout()
{
	unset($_SESSION['whitelist']);
	unset($_SESSION['admin']);
	header('Location: /');
}
function delete($params=false){
    if($params===false) {
        $params=array(d()->this);
    }
    $attr='';
	if(isset($params['class'])) {
		$attr .= ' class="'.$params['class'].'" ';
	}else{
		$attr .= ' class="adm_icon" ';
	}
	
	if(!is_array($params)) {
		$params=array($params);
		$obj_table = $params[0]->table;
		$obj_id = $params[0]->id;
	}else{
		if(!is_object($params[0])){
			$obj_table = $params[0]['table'];
			$obj_id = $params[0]['id'];
		}else{
			$obj_table = $params[0]->table;
			$obj_id = $params[0]->id;
		}
	}
	if(!iam_allow($obj_table)){
		return '';
	}		
	if(!isset($_SESSION['admin'])) {
		return ""; //Проверка на права администратора
	}
		

	print '<a onclick="if (jQuery.browser.opera && parseInt(jQuery.browser.version) >= 12){window.open(this.href);return false;}"  href="/admin/delete/'.$obj_table.'/'.$obj_id.'"  style="display:inline;" target="_blank" '.$attr.'><img style="border:none;" src="/cms/internal/gfx/delete.png"></a>';
}

function add($params){
 
	if(!isset($_SESSION['admin'])) {
		return ""; //Проверка на права администратора
	}
	
	d()->_last_add_params = $params;

	if(!is_array($params)) {
		$params=array($params);	
	}
	if(!iam_allow($params[0])){
		return '';
	}
	$attr='';
	if(isset($params['style'])) {
		$attr .= ' style="'.$params['style'].'" ';
		unset($params['style']);
	}
	if(isset($params['class'])) {
		$attr .= ' class="'.$params['class'].'" ';
		unset($params['class']);
	}else{
		$attr .= ' class="adm_icon" ';
	}
	
	$need_add_button=false;
	if(isset($params['panel_title'])) {
		$need_add_button=true;
		$panel_button_title = $params['panel_title'];
		unset($params['panel_title']);
	}
	
	
	if(isset($params['title'])) {
		$attr .= ' title="'.$params['title'].'" ';
		unset($params['title']);
	}
	
	if(!isset($_SESSION['admin'])) {
		return ""; //Проверка на права администратора
	}
	
	$params_string='';

	foreach($params as $key=>$value){
		if(!is_numeric($key)) {
			if ($params_string=='') {
				$params_string='?';
			} else {
				$params_string.='&';
			}
			$params_string.= $key.'='.$value;
		}
	}
	if($need_add_button){
		d()->admin_add_panel_button('/admin/edit/'.$params[0].'/add'.$params_string,$panel_button_title);
	}
	print '<a onclick="if (jQuery.browser.opera && parseInt(jQuery.browser.version) >= 12){window.open(this.href);return false;}"  href="/admin/edit/'.$params[0].'/add'.$params_string.'" '.$attr.'  style="display:inline;" target="_blank" ><img style="border:none;" src="/cms/internal/gfx/add.png"></a>';
}

function sort_icon($params=false){
 
 
	if(!isset($_SESSION['admin'])) {
		return ""; //Проверка на права администратора
	}

	if($params == false){
		$params = (d()->_last_add_params);
	}

	if(!is_array($params)) {
		$params=array($params);	
	}
	if(!iam_allow($params[0])){
		return '';
	}
	$addition_params_string='?sort=yes';
	
	if(isset($params['sort_field'])) {
		$addition_params_string .= '&sort_field='.$params['sort_field'];
		unset($params['sort_field']);
	}
	if(isset($params['sort_direction'])) {
		$addition_params_string .= '&sort_direction='.$params['sort_direction'];
		unset($params['sort_direction']);
	}
	
	
	$attr='';
	if(isset($params['style'])) {
		$attr .= ' style="'.$params['style'].'" ';
		unset($params['style']);
	}
	if(isset($params['class'])) {
		$attr .= ' class="'.$params['class'].'" ';
		unset($params['class']);
	}else{
		$attr .= ' class="adm_icon" ';
	}
	if(isset($params['title'])) {
		$attr .= ' title="'.$params['title'].'" ';
		unset($params['title']);
	}
	
	if(!isset($_SESSION['admin'])) {
		return ""; //Проверка на права администратора
	}
	
	$params_string='';

	
	
	if(isset($params['href'])) {
		$href = $params['href'];
		unset($params['href']);
	} else {
		$href = '';
		unset($params['href']);
	}
	
	$counted=0;
	foreach($params as $key=>$value){
		if(!is_numeric($key) && $counted==0) {
			$params_string.= '/'.$key.'/'.$value;
			$counted++;
			continue;
		}
		if(!is_numeric($key) && $counted>0) {
			$addition_params_string.='&'.$key.'='.$value;
		}
	}
	
	$params_string .= $addition_params_string;
	
	if($href ==''){
		$href = '/admin/list/'.$params[0].''.$params_string;
	}
	
	print '<a href="'.$href.'" '.$attr.'  style="display:inline;" target="_blank" ><img style="border:none;" src="/cms/internal/gfx/sort.png"></a>';
}

function admin_add_panel_button($url,$title){
	if(d()->admin_panel_buttons==''){
		d()->admin_panel_buttons=array();
	}
	$tmp = d()->admin_panel_buttons;
	$tmp[]=array('url'=>$url,'title'=>$title);
	d()->admin_panel_buttons = $tmp;
}
function admin_show()
{
	

	unset (d()->datapool['admin']['bottombuttons']);
	unset (d()->datapool['admin']['addbuttons']);
	unset (d()->datapool['admin']['show']);
	if (isset($_GET['fields']) && $_GET['fields']!=''){
		$field = $_GET['fields'];
	} else {
		$field = url(3);
	}
	d()->load_and_parse_ini_file('app/fields/'.$field.'.ini');
	if(!empty(d()->admin['show'])){
		foreach(d()->admin['show'] as $value){

			$url=$value[0];
			if(substr($url,-1)=='/'){
				$url .= url(4);
			}
			$subarray=explode('/', $url);
			if(!isset($subarray[1])){
				$subarray[1]='';
			}
			if(!isset($subarray[2])){
				$subarray[2]='';
			}
			d()->curr_title=$value[1];
			if(!iam_allow($subarray[0])){
				return 'Вам запрещён доступ к этому разделу.';
			}
			print d()->admin_show_one_list($subarray[0],$subarray[1],$subarray[2]);
		}
	}

}
function admin_show_one_list($table,$id1,$id2)
{
	if(!iam_allow($table)){
		return 'Вам запрещён доступ к этому разделу.';
	}
	unset (d()->datapool['admin']['bottombuttons']);
	unset (d()->datapool['admin']['addbuttons']);
	unset (d()->datapool['admin']['columns']);

	d()->curr_table=$table;
	$curr_table = $table;
	if($table == 'admin_users'){
		d()->load_and_parse_ini_file('cms/mod_admin_users/admin_users_fields.ini');
	}else{
		d()->load_and_parse_ini_file('app/fields/'.$table.'.ini');
	}
	//модель для опасного запроса к списку сущностей
	d()->_list_safe_data=true; //Если переопределяем, то safe пропадает,
	/*
	[admin.titles]
list_title = Текстовые страницы
	*/
	if(isset(d()->datapool['admin']['titles']['list_title']) && d()->datapool['admin']['titles']['list_title'] !=''){
		d()->curr_title=d()->datapool['admin']['titles']['list_title'];
	}
	//d()->curr_title='Список объектов из таблицы '.url(3);
	
	$model_suffix = '_safe';
	if(empty($_GET['sort'])){
		if(d()->admin['use_model']['list']){
			$param = trim(strtolower( d()->admin['use_model']['list']));
			if(in_array($param,array('1','true','yes','use'))){
				//используем опасную модель
				$model_suffix='';
			}
		}		
	}else{
		if(d()->admin['use_model']['sort']){
			$param = trim(strtolower( d()->admin['use_model']['sort']));
			if(in_array($param,array('1','true','yes','use'))){
				//используем опасную модель
				$model_suffix='';
			}
		}
	}	
	if($model_suffix!='_safe'){
		d()->_list_safe_data=false;
	}
	if(isset(d()->admin['use_model']['source'])){
		$model=eval('return ' . d()->admin['use_model']['source'].';');
		d()->curr_table = $model->table;
		$curr_table = $model->table;
	}else{
		$model =  activerecord_factory_from_table(et($table),$model_suffix);
	}
 
	d()->another_field=false;
	if(!empty($_GET['show_field'])){
		d()->another_field=$_GET['show_field'];//TODO: возможна подмена
	}
	
	if(!isset(d()->datapool['admin']['columns']) || !is_array(d()->datapool['admin']['columns']) || count(d()->datapool['admin']['columns'])==0){
		d()->datapool['admin']['columns']=array();
		d()->datapool['admin']['columns']['title']='Заголовок';
		d()->datapool['admin']['columns']['url']='URL';
	}
	$sort_field = 'sort';
	if(isset(d()->admin['list']) && isset(d()->admin['list']['sort_field'] )){
		$sort_field = et(d()->admin['list']['sort_field']);
	}
	if(isset($_GET['sort_field'])){
		$sort_field = et($_GET['sort_field']);
	}
	$sort_direction='';
	
	if(isset($_GET['sort_direction'])){
		$sort_direction =  strtoupper($_GET['sort_direction']);
		if($sort_direction !='DESC' && $sort_direction!='ASC'){
			$sort_direction = '';
		}
		$sort_direction = ' '.$sort_direction;
	}elseif(isset(d()->admin['list']) && isset(d()->admin['list']['sort_direction'] )){
		$sort_direction =  strtoupper(d()->admin['list']['sort_direction'] );
		if($sort_direction !='DESC' && $sort_direction!='ASC'){
			$sort_direction = '';
		}
		$sort_direction = ' '.$sort_direction;
	}

	/* Дополнительная сортировка по различным параметрам */
	foreach($_GET as $key=>$value){
		if(! in_array($key, array('sort_field','show_field', 'sort_direction','page', 'style', 'class', 'title', 'sort', 'href'))){
			$model->where(DB_FIELD_DEL . $key .DB_FIELD_DEL . " = ?",$value);
		}
	}
	if(!isset(d()->admin['use_model']['source'])){
		$model->order_by(DB_FIELD_DEL . $sort_field . DB_FIELD_DEL . ' ' . $sort_direction);
	}
	
	if ($id1=='') {
		//list/goods     просто список всех полей
		$query='select * from '.et($table).'   order by '.DB_FIELD_DEL.$sort_field .DB_FIELD_DEL.$sort_direction;
		d()->list_addbutton='';
		d()->list_addbutton.='<a class="btn" href="/admin/edit/'. $curr_table .'/add"><i class="icon-plus"></i> Добавить</a>';

		if(isset(d()->admin['bottombuttons'])) {
			$bottombuttons=d()->admin['bottombuttons'];

			foreach($bottombuttons as $bottombutton) {
				d()->list_addbutton.=' <a class="btn" href="/admin'.$bottombutton[0].'">'.$bottombutton[1].'</a>';
			}
		}


	} else {
	
		
		
		if($id2 == '') {
			if($id1=='index') {
				//list/goods/    список полей с goods_id = NULL
				$query='select * from '.DB_FIELD_DEL . et($curr_table).DB_FIELD_DEL . ' where '.DB_FIELD_DEL .et(to_o($curr_table)).'_id'.DB_FIELD_DEL.' is NULL  order by '.DB_FIELD_DEL .$sort_field.DB_FIELD_DEL.$sort_direction;
				
				$model->where(DB_FIELD_DEL .et(to_o($curr_table)).'_id'.DB_FIELD_DEL.' is NULL ');
				
				d()->list_addbutton='<a class="btn" href="/admin/edit/'. h($curr_table) .'/add">Добавить</a>';
			} else {
				//list/goods/4    список полей с goods_id = 4
				if(is_numeric($id1)) {
					$query='select * from '.DB_FIELD_DEL.et($curr_table).DB_FIELD_DEL.' where '.DB_FIELD_DEL .et(to_o($curr_table))."_id".DB_FIELD_DEL ." = ".e($id1)." order by ".DB_FIELD_DEL. $sort_field.DB_FIELD_DEL.$sort_direction;
					
					$model->where(DB_FIELD_DEL .et(to_o($curr_table))."_id".DB_FIELD_DEL ." = ".e($id1));
					
					d()->list_addbutton='<a class="btn" href="/admin/edit/'. h($curr_table) .'/add?'.h(to_o($curr_table)).'_id='.h($id1).'">Добавить</a>';
				}else{
					$query='select * from '.DB_FIELD_DEL .et($curr_table).DB_FIELD_DEL . ' where '.DB_FIELD_DEL .et(to_o($curr_table)).'_id'.DB_FIELD_DEL . ' IN (select id from '.DB_FIELD_DEL .et($curr_table).DB_FIELD_DEL ." where ".DB_FIELD_DEL."url".DB_FIELD_DEL." = ".e($id1).")  order by ".DB_FIELD_DEL . $sort_field.DB_FIELD_DEL.$sort_direction;
					
					
					
					$model->where(DB_FIELD_DEL .et(to_o($curr_table)).'_id'.DB_FIELD_DEL . ' IN (select id from '.DB_FIELD_DEL .et($curr_table).DB_FIELD_DEL ." where ".DB_FIELD_DEL."url".DB_FIELD_DEL." = ".e($id1).") ");
					
					d()->list_addbutton=' ';
				}

			}
		} else {
			//list/goods/catalog_id/4             список полей с catalog_id = 4
			$query='select * from '.DB_FIELD_DEL.et($curr_table).DB_FIELD_DEL .' where '.DB_FIELD_DEL .et($id1).DB_FIELD_DEL. " = ".e($id2)."  order by ".DB_FIELD_DEL.$sort_field.DB_FIELD_DEL.$sort_direction;
			
			$model->where(DB_FIELD_DEL .et($id1).DB_FIELD_DEL. " = ".e($id2));
			
			d()->list_addbutton='<a class="btn" href="/admin/edit/'. h($curr_table) .'/add?'.et($id1).'='.h($id2).'">Добавить</a>';
		}
	}
	print '<!-- OLD MODE! Dangerous! '.$query.' -->';
	//Определение дополнительных кнопок



	$addbuttons = array();

	if(isset(d()->admin['addbuttons'])) {
		$addbuttons=d()->admin['addbuttons'];
	}

	//$result=d()->db->query($query); //Уже не нужно, пора удалить
	$data=array();

	$all_lines=array();
	$paginator_per_page=100; //Константа, заданная по умолчанию
	if(isset(d()->admin['use_model']['paginator'])){
		$paginator_per_page=d()->admin['use_model']['paginator'];
	}
	if(is_numeric($paginator_per_page)){
		$model->paginate($paginator_per_page);
	}
	d()->available_columns = $model->columns();
	d()->paginator=d()->Paginator->bootstrap->generate($model);
	
	foreach($model->all as $key0=> $line){
		$all_lines[$key0] =  $line;
		$all_lines[$key0]['addbuttons']='';
		foreach($addbuttons as $key => $value) {
			$all_lines[$key0]['addbuttons'] .= '<a href="/admin'.  $value[0] . $line['id'] . '" class="btn btn-mini">'.$value[1].'</a> ';
		}
		if (empty($line['sort'])) {
			//ВНЕЗАПНО сортировка пустая
			//TODO: ХЕРОВО
			d()->db->exec('UPDATE  `'.et($table).'` set `sort` = `id` where `id` = '.((int)$line['id']));
		}
	}
	
	
	
	
	$data = $all_lines;
	$sort_title='';
	if(isset(d()->admin['sortoptions']) && isset(d()->admin['sortoptions']['title'])){
		$sort_title = d()->admin['sortoptions']['title'];
		foreach ($data as $key=>$value){
			$data[$key]['title']=$data[$key][$sort_title];
		}
	}  else {
		foreach ($data as $key=>$value){
			if($data[$key]['title']=='' && isset($data[$key]['ru_title']) && $data[$key]['ru_title']!=''){
				$data[$key]['title']=$data[$key]['ru_title'];
			}
		}
	}
	
	d()->objectrow = $data;
	
	if(empty($_GET['sort'])){
		print d()->view();
	}else{
		
		if(d()->validate('admin_do_sort')){
			$url = preg_replace('/\?.*/','',$_SERVER['REQUEST_URI']);
			$oldlist=d()->objectrow;
			$newlist=d()->params['elements'];
			
			foreach ($newlist as $key=>$value){
				if($oldlist[$key]['id']*1 != $value*1){
					// Элементу с ID = $value присваеваем новый SORT, тот которы йбыл под номером $key ( $oldlist[$key]['sort'] ) 
					d()->db->exec('UPDATE  `'.et($table).'` set `sort` = '.((int)$oldlist[$key]['sort']).' WHERE `id` = '.((int)$value)).'';
				}
			}
			
			if($_POST['admin_command_redirect_close']=='yes') {
		
				return  "<script> window.opener.document.location.href=window.opener.document.location.href;window.open('','_self','');window.close();</script>";
			}else{

				header('Location: '.$url) ;
				exit();
			}
			
			
			
			exit();
		}
		print d()->admin_show_one_sortable_list();		
	}

}
function admin_list()
{
	if(!iam_allow(url(3))){
		return 'Вам запрещён доступ к этому разделу.';
	}
	d()->curr_title='Список объектов из таблицы '.url(3);
	print d()->admin_show_one_list(url(3),url(4),url(5));
	
	print d()->admin_show();
}

//	Основная функция редактирования, которая получает данные, выводит форму, обрабатывает действия, перезагружает страницу
function admin_edit()
{
/*
<form method="post">
 <input type="hidden" name="admin_action" value="edit_field">
	<textarea style="width:96%;height:252px;border:1px solid gray;background:white;font-family:consolas, 'courier new', monospace" class="edit_field_content"  name="content"><?php
		
		if(file_exists($_SERVER['DOCUMENT_ROOT'].$filename)){
			print htmlspecialchars(file_get_contents($_SERVER['DOCUMENT_ROOT'].$filename));
		}
	
	?></textarea>
 </form>
*/
 	if(!iam_allow(url(3))){
		return 'Вам запрещён доступ к этому разделу.';
	}
	if(isset($_POST['admin_action']) && $_POST['admin_action']=='edit_field'){
		if (isset($_GET['fields']) && $_GET['fields']!=''){
			if(substr($field,0,1)=='/'){
				$field = $_GET['fields'];
				$filename= str_replace('.','',substr($field,1)).'.ini';
			} else {
				$field = $_GET['fields'];
				$filename= '/app/fields/'.str_replace('.','',str_replace('/','',str_replace('\\','',$field))).'.ini';
			}
			
		} else {
			$field = url(3);
			$filename= '/app/fields/'.str_replace('.','',str_replace('/','',str_replace('\\','',$field))).'.ini';
		}
		
				
	
		
		 
		$fhandler=fopen($_SERVER['DOCUMENT_ROOT'].$filename,'w+');
		fwrite($fhandler,$_POST['content']);
		fclose($fhandler);
		chmod($_SERVER['DOCUMENT_ROOT'].$filename, 0777);
		header('Location: '.$_SERVER['REQUEST_URI']);
		exit();
	}
	$tableortype = url(3);
	$action_needed =  action('admin_save_data');
	if($action_needed){
		return $action_needed;
	}
	$rows=array();
	$scenario=0;
	$tableortype = url(3);
	d()->admin_potential_multi_domain = SERVER_NAME;
	d()->admin_multi_domain_title = SERVER_NAME;
	//Перенаправление
	if(!is_numeric(url(4)) && url(4)!='add'){
			$scenario=1;
	}
	if (url(4)!='add') {
		if($scenario==1){
			$model =  activerecord_factory_from_table(et(url(3)), '_safe')->where('`url` = ?',url(4)); //для избавления от багов
			if(count($model)==0){
				$scenario=2;
				$_GET['url']=url(4);
				$line=array();
			}else{
				$line = $model;
			}
			/*$result=d()->db->query("select * from `".et(url(3))."` where `url` = ".e(url(4)));
			if ($result===false ||  ($line=$result->fetch())===false) {
				$scenario=2;
				$_GET['url']=url(4);
				$line=array();
			}*/
		} else {
			/*$result=d()->db->query("select * from `".et(url(3))."` where `id` = ".(int)url(4));
			if ($result===false ||  ($line=$result->fetch())===false) {
				$line=array();
			}
			*/
			$model =  activerecord_factory_from_table(et(url(3)), '_safe')->find(url(4));//для избавления от багов
			if(count($model)==0){
				$line=array();
			}else{
				$line = $model;
			}
		}
	} else {
		$line=array();
	}
	if(iam('developer')){
		if( d()->db->errorCode()=='42S02'){
			if(d()->validate('admin_attempt_create_table')){
				$table=url(3);
				$one_element=to_o(url(3));
				$result = d()->Scaffold->create_table($table,$one_element);
				header('Location: '.$_SERVER['REQUEST_URI']);
				exit();
			}
			d()->missing_table=url(3);
			return d()->admin_error_create_table_tpl();
		}
	}
	

	
	if(isset($_GET['type']) && $_GET['type']!='') {
		$tableortype = to_p($_GET['type']);
	}
	
	if (isset($_GET['fields']) && $_GET['fields']!=''){
		$tableortype = $_GET['fields'];
	}
	
	$fields=d()->admin_get_fields($tableortype);

	if(substr(url(3),-8)=='__fields' && (url(4)=='add')){
		array_unshift($fields,array('name'=>'field_name','type'=>'field_name','title'=>'Название поля на латинице','all'=>array('field_name','field_name','Название поля на латинице', 'Необязательно. Изменить это поле будет нельзя.')));
	}

	if(empty($fields)){
		$filename= '/app/fields/'.str_replace('.','',str_replace('/','',str_replace('\\','',url(3)))).'.ini';
		$filename= $_SERVER['DOCUMENT_ROOT'].$filename;
		if (!file_exists($filename) && iam('developer')){
			d()->field_not_found='yes';
		}
	}
	//список элементов, для которых переопределелили скрытые параметры
	//при помощи GET. Если их нет, то создаются новые скрытые е параметры.
	$setted_flag=array();
	d()->row_data = $line;
	d()->admin_current_scenario = $scenario;
	foreach ($fields as $field) {
		d()->title=$field['title'];
		d()->name='data['.$field['name'].']';
		$setted_flag[$field['name']]=true;
		d()->value='';
		d()->field_params=$field['all'];
		if ((url(4)=='add' || $scenario==2) && isset($_GET[$field['name']])) {
			d()->value=$_GET[$field['name']];
		}
		if ((url(4)=='add' || $scenario==2) && isset($_POST['data'][$field['name']])) {
			d()->value=$_POST['data'][$field['name']];
		} 
		if($field['name']){
			if (isset($line[$field['name']])) {
				d()->value=$line[$field['name']];
			}
			
			if (  isset($_GET[$field['name']])) {
				d()->value=$_GET[$field['name']];
			}
		}
		//Мультисайтовость
		
		if($field['type']=='multi'){

			//d()->admin_current_page_is_multi = true;
			if(isset($line['multi_domain']) && $line['multi_domain']!=''){
				d()->admin_current_page_is_multi = false;
				d()->admin_multi_domain = $line['multi_domain'];
				d()->admin_potential_multi_domain = $line['multi_domain'];
			}else{
				d()->admin_current_page_is_multi = true;
			}

			
		}
		$rows[]=d()->call('admin_'.$field['type']);
	}	
	
	if(url(4)=='add' || $scenario==2) {
		//Установка скрытых полей
		foreach($_GET as $key=>$value) {
			if (!isset($setted_flag[$key]) && $key!='fields') {
				d()->name = 'data['.$key.']';		
				d()->value = $value;
				$rows[]=d()->call('admin_hidden');
			}
		}
	}
	if($scenario==2){
		d()->name = '_scenario';
		d()->value = 'add';
		$rows[]=d()->call('admin_hidden');
	}
	if($scenario==1){
			d()->name = '_scenario';
			d()->value = 'edit';
			$rows[]=d()->call('admin_hidden');
	}
	d()->tabletitle = 'Редактирование элемента';
	if(url(4)=='add' || $scenario==2) {
		d()->tabletitle = 'Добавление нового элемента';
		if(isset(d()->admin['multiple']) && d()->admin['multiple']=='yes'){
			d()->tabletitle .= ' | <a href="#" class="enable_multiple">Добавить несколько элементов</a>';
		}
		
	}
	d()->tablerow = $rows;
	if(d()->admin_multi_domain){
		d()->admin_multi_domain_title = d()->admin_multi_domain;
	}
	/*if(d()->admin_potential_multi_domain)
	{
		d()->admin_multi_domain_title = d()->admin_potential_multi_domain;
	}*/
	print d()->view(); //Эту функцию можно переопределять
}

function admin_save_data($params)
{

	if(!iam_allow(url(3))){
		return 'Вам запрещён доступ к этому разделу.';
	}
	//TODO: Новое API для добавление новых элементов в базу данных;  
	$elemid=url(4);
	$scenario=0;
	if(isset($_POST['_scenario']) && $_POST['_scenario']=='add'){
		$scenario=2;
	}
	if(isset($_POST['_scenario']) && $_POST['_scenario']=='edit'){
		$scenario=1;
	}
	
	
	$orig_params=$params;
	$iterations = array();
	if(isset($_POST['_enable_multiple']) && $_POST['_enable_multiple']=='1' && url(4)=='add'){
		
		
		$images = explode(';',$params['image']);
		foreach($images as $image){
			$params_row = $orig_params;
			$params_row['image']=$image;
			$iterations[] = $params_row;
		}
		
	}else{
		$iterations[0]=$params;
	}
	//FIXME: костыль
	foreach($iterations as $params){
		$elemid=url(4);
		
		if($elemid=='add'){
			if(substr(url(3),-8)=='__fields' && isset($params['field_name']) && $params['field_name']!=''){
				if(!preg_match('/^[a-z]+[a-z0-9_]+$/',$params['field_name'])){
					d()->_field_name_error_situation=true;
					d()->_field_name_error = 'Поле должно начинаться с буквы, содержать только латинские буквы и цифры.';
					return d()->view();
				}

				if(strlen($params['field_name'])>75){
					d()->_field_name_error_situation=true;
					d()->_field_name_error = 'Длина поля должна быть менее 80 символов.';
					return d()->view();
				}
				if(substr($params['field_name'],0,8)=='deleted_'){
					d()->_field_name_error_situation=true;
					d()->_field_name_error = 'Поле не должно начинаться с deleted_ во избежания проблем в будущем.';
					return d()->view();
				}

				//Проверка на уже существующий столбец в базе данных полей (метаинформации)
				if(count( d()->db->query('select * from '. et(url(3)) .' where field_name = '.e($params['field_name']))->fetchAll())!=0){
					d()->_field_name_error_situation=true;
					d()->_field_name_error = 'Такое поле уже есть.';
					return d()->view();	
				}
				
				//Проверка на существование поля в искомой таблице
				$tablename = substr(url(3),0,-8);
				$res = d()->db->query('select * from '. et($tablename) .' limit 0');
				
				for ($i = 0; $i < $res->columnCount(); $i++) {
				    $col = $res->getColumnMeta($i);
				    $columns[] = $col['name'];
				}

				$columns =array_flip($columns);
				if(isset($columns[$params['field_name']]))
				{
					d()->_field_name_error_situation=true;
					d()->_field_name_error = 'Вы не можете управлять этим полем.';
					return d()->view();	
				}
			}
		}

		if($elemid=='add' || $scenario=='2') {
		//	$params['sort']=$elemid;
			//Добавление элементов - делаем малой кровью - предварительно создаём строку в таблице
			$model =  activerecord_factory_from_table(et(url(3)), '_safe')->new;
			$model->save();
			//d()->db->exec("insert into `".et(url(3))."`  () values ()");
			$elemid= $model->insert_id;
		}
		if($scenario=='1') {
			//Добавление элементов - делаем малой кровью - предварительно создаём строку в таблице
			$result = d()->db->query("select * from `".et(url(3))."` where `url` = ".e(url(4))."");
			if($result){
				$line=$result->fetch();
				$elemid=$line['id'];
			}else{
			//	d()->db->exec("insert into `".et(url(3))."`  () values ()");
			//	$elemid=d()->db->lastInsertId();
				$model =  activerecord_factory_from_table(et(url(3)), '_safe')->new;
				$model->save();
				$elemid= $model->insert_id;
			}
		}
		if(substr(url(3),-8)=='__fields' &&  url(4)=='add' && (!isset($params['field_name']) || $params['field_name']=='')){
			$params['field_name']='field'.$elemid;
		}	
		//FIXME: костыль
		if(isset($params['url'])){
			if($params['url']=='') {
				$params['url']=to_o(url(3)).$elemid;
			}

			if(substr($params['url'],0,1)=='/') {
				$params['url']=substr($params['url'],1);
			}
			
			//$params['url']=str_replace('/','_',$params['url']);
		}

		/*
		$result_str="update `".et(url(3))."` set  ";
		*/
		$i=0;
		
		$options_field=array();
		foreach($params as $key=>$value) {
			if(preg_match('/\<img\ssrc=\"\/cms\/external\/tiny_mce\/plugins\/mymodules\/module\.php\?[\@\-\_0-9a-z\=A-Z\&]+\".[^\>]*\>/',$value)){
				$options_field[$key]=1;
			}
		}
		if(count($options_field)!=0){
			$params['admin_options']=serialize($options_field);
		}else{
			$params['admin_options']='';
		
		}
		$model =  activerecord_factory_from_table(et(url(3)), '_safe')->find($elemid);
		
		
		foreach ($params as $field_name => $value){
			$model->{$field_name} = $value;
		}
		$model->save();

		if(substr(url(3),-8)=='__fields' && url(4)=='add'){
			//Добавление столбца в таблицу
			$tablename = substr(url(3),0,-8);
			d()->Scaffold->create_field($tablename, $params['field_name']);
		}

	}
	
	/*

	//Устаревший вариант, комментарий будет удалён в ближайших версиях
	
	
	//todo: обеспечить в API
	
	foreach($params as $key=>$value) {
		$i++;
		if (substr($key,-3)=='_id' && $value == '') {
			$result_str.=" `" . $key . "`= NULL ";
		} else {
			$result_str.=" `" . $key . "`= ".e($value)." ";
		}
        if ($i<count($params)) $result_str.=' , ';
    }
	
    $result_str.=" where `id`=".(int)($elemid);

 
	$not_reqursy=0;
	
	doitClass::$instance->db->exec($result_str);
	$error_code=doitClass::$instance->db->errorInfo();
	$error_code=$error_code[1];

	if (1054 == $error_code) {
		
		
		$_res=doitClass::$instance->db->query('SHOW COLUMNS FROM `'.et(url(3)).'`');		
		$list_of_existing_columns=array();
		foreach ($_res->fetchAll(PDO::FETCH_NUM) as $_tmpline) {
			$list_of_existing_columns[] = $_tmpline[0];
		}

		foreach($params as  $value=>$key){
			if(!in_array($value,$list_of_existing_columns)){
				doitClass::$instance->Scaffold->create_field(et(url(3)),$value);
			}
		}
		doitClass::$instance->db->exec($result_str);
	}
	*/
	
	if(isset($_POST['_save_and_add'])){
		print '
		<script>
			parent.$(".js-iframe-flyer").css("top","20%");
			setTimeout(function(){
				parent.$(".js-iframe-flyer").css("top","-50%");
			},2000);
			parent.$(".admin_edit_form").removeAttr("target");
		</script>';
		exit;
	}

	if($_POST['admin_command_redirect_close']=='yes') {
		$tableortype = url(3);


		if(isset($_GET['type']) && $_GET['type']!='') {
			$tableortype = to_p($_GET['type']);
		}

		if (isset($_GET['fields']) && $_GET['fields']!=''){
			$tableortype = $_GET['fields'];
		}
		d()->load_and_parse_ini_file('app/fields/'.$tableortype.'.ini');	
		
		
		if(isset(d()->admin['urlredirect']) && url(4)!='add'){
			return  "<script> window.opener.document.location.href='".d()->admin['urlredirect']. h($params['url']) ."';window.open('','_self','');window.close();</script>";		
		}else{
			return  "<script> window.opener.document.location.href=window.opener.document.location.href;window.open('','_self','');window.close();</script>";		
		}
		
	}else{

		header('Location: '.$_POST['_http_referer']);
		exit();
	}

}


function admin_delete()
{
	if(!iam_allow(url(3))){
		return 'Вам запрещён доступ к этому разделу.';
	}
	print action('admin_delete_element');
	print d()->admin_delete_tpl(); 
}
function admin_delete_element($params)
{
	if(!iam_allow(url(3))){
		return 'Вам запрещён доступ к этому разделу.';
	}
	if(substr(url(3),-8)=='__fields'){
		$tablename = substr(url(3),0,-8);
		$columns = d()->db->query ('select * from '.et(url(3)).' where id = '.e(url(4)))->fetchAll();
		if($columns){

			d()->Scaffold->rename_column($tablename,$columns[0]['field_name'],'deleted_field_'. $columns[0]['id'] );
		}
	}
	d()->db->exec("delete from `".et(url(3))."`  where id= ".e(url(4))." ");
	return  "<script> window.opener.document.location.href=window.opener.document.location.href;window.open('','_self','');window.close();</script>";
}

//Функция возвращает массив возможных полей
function admin_get_fields($tableortype='')
{
	$data=array();
	if ($tableortype=='') {
		$tableortype=url(3);
	}
	
	 
	if(substr($tableortype,0,1)=='/'){
		$correcttableortype= str_replace('.','',substr($tableortype,1)).'.ini';
		d()->load_and_parse_ini_file($correcttableortype);
	} else{
		d()->load_and_parse_ini_file('app/fields/'.$tableortype.'.ini');	
	}

	if ($handle = opendir('app/fields/')) {
		while (false !== ($file = readdir($handle))) {
			if(preg_match('/'.$tableortype.'\..*?.ini/i', $file)){
				d()->load_and_parse_ini_file('app/fields/'.$file);
			}
		}
		closedir($handle);
	}
	$rows = d()->admin['fields'];
 
	foreach ($rows as $key=>$value) {
		$data[]=array('name'=>$value[1],'type'=>$value[0],'title'=>$value[2],'all'=>$value);
	}
	
    return $data;
	
}


function admin_scaffold_new()
{
	d()->table_name='';
	if(isset($_GET['table'])){
		d()->table_name = $_GET['table'];
	}
	if(d()->validate('admin_scaffold_create')){
		
		$result_messages='';
		
		$table=d()->params['name'];
		$one_element=to_o(d()->params['name']);
		$_first_letter=strtoupper(substr($one_element,0,1));
		$model = $_first_letter.substr($one_element,1);
		$_first_letter_controller=strtoupper(substr($table,0,1));
		$controller_name = $_first_letter_controller.substr($table,1);
		
		include('cms/mod_admin/scaffold_templates/scaffold_templates.php');
		foreach($scaffold_templates as $scaffold_name=>$scaffold_value){
			$scaffold_templates[$scaffold_name]=str_replace(array('#table#','#one_element#','#model#','#controller_name#'),array($table,$one_element,$model,$controller_name),$scaffold_value);
		}
		
		//Создание таблицы
		if(d()->params['create_table']=='yes') {
		
			$result_messages .= "Создаём таблицу ".h($table)."... ";
			
			$result = d()->Scaffold->create_table($table,$one_element);
			if($result!==false){
				$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
			} else {
				$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
			}
		}
		
		//Создание папки для модуля
		if(d()->params['create_show']=='yes' || d()->params['create_list']=='yes' || d()->params['create_model']=='yes' ) {
			$result_messages .=  "Создаём папку mod_".h($table)."... ";
			$result=mkdir($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table);
			chmod($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table, 0777);
			if($result){
				$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
			} else {
				$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
			}
		}
		
		
			
		
		//Создание файла с контроллером
		if((d()->params['create_show']=='yes' || d()->params['create_list']=='yes') && !file_exists($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php')) {

			$result_messages .=  "Создаём файл mod_".h($table)."/".h(et($table)).".func.php... ";
			$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php','w+');
			$t_result = fwrite($result,"<"."?php\r\n\r\n");
			fclose($result);
			chmod($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php', 0777);
			if($result!=='false' && $t_result!=='false'){
				$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
			} else {
				$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
			}
		}
		
		//Создание функций в функциональном стиле
		if(d()->params['create_type']=='func'){
		
			if((d()->params['create_show']=='yes') && file_exists($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php')) {
				
				$check=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php');
				if(false===strpos($check,$table."_show")){
					$result_messages .=  "Создаём функцию  ".h($table)."_show... ";
					$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php','a');
					$t_result = fwrite($result,$scaffold_templates["show_controller_func"]);
					fclose($result);
					if($result!=='false' && $t_result!=='false'){
						$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
					} else {
						$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
					}
				}
			}
			
			if((d()->params['create_list']=='yes') && file_exists($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php')) {
				
				$check=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php');
				if(false===strpos($check,$table."_index")){
					$result_messages .=  "Создаём функцию  ".h($table)."_index... ";
					$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php','a');
					$t_result = fwrite($result,$scaffold_templates["list_controller_func"]);
					fclose($result);
					if($result!=='false' && $t_result!=='false'){
						$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
					} else {
						$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
					}
				}
			}
		}else{
			
			
			//ООП подход
			if((d()->params['create_show']=='yes' || d()->params['create_list']=='yes') && file_exists($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php')) {
				
				$check=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php');
				if(false===strpos($check,$controller_name."Controller")){
					$result_messages .=  "Создаём и открываем класс  ".h($controller_name)."Controller... ";
					$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php','a');
					$t_result = fwrite($result,$scaffold_templates["controller_start"]);
					
					if($result!=='false' && $t_result!=='false'){
						$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
					} else {
						$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
					}
					

					
					//Создание методов
					if(d()->params['create_show']=='yes') {
						
						$check=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php');
						if(false===strpos($check,"show(")){
							$result_messages .=  "Создаём метод show... ";
							$t_result = fwrite($result,$scaffold_templates["show_controller_method"]);
							if($result!=='false' && $t_result!=='false'){
								$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
							} else {
								$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
							}
						}
					}
					
					if(d()->params['create_list']=='yes') {
						
						$check=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/'.$table.'.func.php');
						if(false===strpos($check,"index(")){
							$result_messages .=  "Создаём метод index... ";
							$t_result = fwrite($result,$scaffold_templates["list_controller_method"]);
							if($result!=='false' && $t_result!=='false'){
								$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
							} else {
								$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
							}
						}
					}					
					
					$result_messages .=  "Закрываем класс  ".h($controller_name)."Controller... ";
					$t_result = fwrite($result,$scaffold_templates["controller_end"]);

					if($result!=='false' && $t_result!=='false'){
						$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
					} else {
						$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
					}
					
					fclose($result);
					
				}
			}

		}
		
		
		
		if((d()->params['create_show']=='yes') && !file_exists($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/_show.html')) {
			$result_messages .=  "Создаём файл mod_".h($table)."/_show.html... ";
			$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/_show.html','w');
			$t_result = fwrite($result,$scaffold_templates["show_template"]);
			fclose($result);
			chmod($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/_show.html', 0777);
			if($result!=='false' && $t_result!=='false'){
				$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
			} else {
				$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
			}
		}
		

		
		if((d()->params['create_list']=='yes') && !file_exists($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/_index.html')) {
			$result_messages .=  "Создаём файл mod_".h($table)."/_index.html... ";
			$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/_index.html','w');
			$t_result = fwrite($result,$scaffold_templates["list_template"]);
			fclose($result);
			chmod($_SERVER['DOCUMENT_ROOT'].'/app/mod_'.$table.'/_index.html', 0777);
			if($result!=='false' && $t_result!=='false'){
				$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
			} else {
				$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
			}
		}
		
		
		if((d()->params['create_fields']=='yes') && !file_exists($_SERVER['DOCUMENT_ROOT'].'/app/fields/'.$table.'.ini')) {
			$result_messages .=  'Создаём файл fields/'.$table.'.ini... ';
			$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/fields/'.$table.'.ini','w');
			$t_result = fwrite($result,$scaffold_templates["field_template"]);
			fclose($result);
			chmod($_SERVER['DOCUMENT_ROOT'].'/app/fields/'.$table.'.ini', 0777);
			if($result!=='false' && $t_result!=='false'){
				$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
			} else {
				$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
			}
		}
		
		
		//Записив роутер в соотвествиии с выбранным стилем
		if((d()->params['create_router']=='yes') && file_exists($_SERVER['DOCUMENT_ROOT'].'/app/router.init.ini')) {
			if(d()->params['create_type']=='func'){
				$check=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/router.init.ini');
				if(false===strpos($check,$table."_index") && false===strpos($check,$table."_show")){
					$result_messages .=  'Записываем адреса в роутер... ';
					$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/router.init.ini','a');
					$t_result = fwrite($result,$scaffold_templates["router_template_func"]);
					fclose($result);
					if($result!=='false' && $t_result!=='false'){
						$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
					} else {
						$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
					}
				}
			}else{
				$check=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/router.init.ini');
				if(false===strpos($check,$table."_index") && false===strpos($check,$table."_show")){
					$result_messages .=  'Записываем адреса в роутер... ';
					$result=fopen($_SERVER['DOCUMENT_ROOT'].'/app/router.init.ini','a');
					$t_result = fwrite($result,$scaffold_templates["router_template_oop"]);
					fclose($result);
					if($result!=='false' && $t_result!=='false'){
						$result_messages .=  "<span style='color:#198E58'>готово</span><br>";
					} else {
						$result_messages .=  "<span style='color:#B01414'>неудачно</span><br>";
					}
				}			
			}
		}
		
	}
	d()->result_messages = $result_messages ;
	print d()->view();
}



function admin_scaffold_list_of_plugins()
{
	if(!iam('developer')){ 
		return 'Устанавливать расширения могут только разработчики';
	}
	set_time_limit(0);
	if(d()->validate('admin_scaffold_list_of_plugins')) {
		
		$plugins=$_POST['modules'];
		
		d()->message='Процесс установки проведён';
		
		
		d()->PluginInstaller->download_and_install_pack($plugins);
		
		//d()->PluginInstaller->install($plugin);
	}
	//d()->plugins_list = d()->PluginInstaller->get_list();
	
	print d()->view();
}

function admin_scaffold_install_plugin()
{
	if(!iam('developer')){ 
		return 'Устанавливать расширения могут только разработчики';
	}
	set_time_limit(0);
	if(d()->validate('admin_scaffold_install_plugin')) {
		
		$plugin=d()->params['plugin'];
		
		d()->message='Процесс установки проведён';
		
		
		d()->PluginInstaller->download($plugin);
		
		d()->PluginInstaller->install($plugin);
	}
	d()->plugins_list = d()->PluginInstaller->get_list();
	
	print d()->view();
}


function admin_update_system()
{
	if(!iam('developer')){ 
		return 'Устанавливать обновления могут только разработчики';
	}
	
	set_time_limit(0);
	if(d()->validate('admin_update_system')) {
		
		if(d()->params['i_am_sure']=='yes'){
			$_SESSION['renamed_cms']='';	
			if(d()->PluginInstaller->update_cms()){
				d()->message='Процесс обновления проведён';
				d()->message .= '<br>Резервная копия сохранена в папке '.d()->renamed_cms;
				
			} else {
				d()->message='Процесс обновления прошёл неудачно. Проверьте ваше соединение к Интернету и права на запись.';
			}
		} else {
			d()->message='Похоже, Вы не уверены в том, что делаете. Обновление отменено.';
		}
		
	}

	if(d()->validate('admin_update_system_delete_backup')) {
		
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($_SESSION['renamed_cms']),
													  RecursiveIteratorIterator::CHILD_FIRST);
		foreach ($iterator as $path) {
			if ($path->isDir()) {
				rmdir($path->__toString());
			} else {
				unlink($path->__toString());
			}
		}			
		rmdir($_SESSION['renamed_cms']);
		unset($_SESSION['renamed_cms']);
		d()->message='Резервная копия удалена.';
		 
		
	}
	
	
	print d()->view();
}


function admin_update_scheme()
{
	if(!iam('developer')){ 
		return 'Обновлять схему из интерфейса могут только разработчики';
	}
	
	set_time_limit(0);
	
	d()->Scaffold->update_scheme();
	print d()->view();
}

function admin_create_column()
{
	if(!iam('developer')){ 
		return 'Менять структуру могут только разработчики';
	}
	d()->Scaffold->create_field($_POST['table'], $_POST['column']);
	print d()->view();
}

function admin_migrate_scheme()
{
	if(!iam('developer')){ 
		return 'Производить миграцию схемы могут только разработчики';
	}
	
	set_time_limit(0);
	
	//d()->Scaffold->update_scheme();
	print d()->view();
}
function iam_allow($tablename='pages'){
	if(!isset($_SESSION['whitelist'])){
		return true;
	}

	if(in_array($tablename,$_SESSION['whitelist'])){
		return true;
	}
	return false;
}
function admin_generate_scheme()
{
	$non_migrate_columns=array('id','sort','admin_options','multi_domain');
	if(!iam('developer')){ 
		return 'Производить генерацию схемы могут только разработчики';
	}
	
	set_time_limit(0);
	if(!isset($_GET['save']) && $_GET['save'] != '1'){
		header("Content-Disposition: attachment; filename=schema.ini");
		header("Content-Type: application/octet-stream");
		header("Content-transfer-encoding: binary");
	}
	$tables = d()->db->query('SHOW TABLES')->fetchAll();
	$result = "";
	foreach ($tables as $row){
		$result.= "[schema.{$row[0]}]\r\n";
		
		$columns = d()->db->query('SHOW COLUMNS FROM '.DB_FIELD_DEL.$row[0].DB_FIELD_DEL)->fetchAll();
		$printed_array=array();
		foreach ($columns as $column){
			if(!in_array($column['Field'], $non_migrate_columns)){
				$printed_array[]=$column['Field'];
			}
		}
		sort($printed_array);
		foreach ($printed_array as $column){
			$result.= "{$column}\r\n";
		}
	}
	if(!isset($_GET['save']) && $_GET['save'] != '1'){
		print $result;	
		
	}else{
		$try = file_put_contents($_SERVER['DOCUMENT_ROOT'].'/app/schema.ini',$result);
		if($try ===false){
			header('Location: /admin/scaffold/migrate_scheme?done=0');
		}else{
			header('Location: /admin/scaffold/migrate_scheme?done=1');
		}
		exit;
	}
	//d()->Scaffold->update_scheme();
	//print d()->view();
}


//Открытие шаблона либо вывод формы авторизации
function admin()
{
	header('X-UA-Compatible: IE=edge,chrome=1');
	//TODO: переписать на валидаторах
	if(isset($_POST['action']) && $_POST['action']=='admin_login'){
		if(!is_array(d()->admin['editor']['login']) && !is_array(d()->admin['editor']['password'] )){
			d()->datapool['admin']['editor']['login']=array(d()->admin['editor']['login'],array());
			d()->datapool['admin']['editor']['password']=array(d()->admin['editor']['password'],array());
		}
		foreach(d()->admin['editor']['login'] as $key=>$value){
			$login=d()->admin['editor']['login'][$key];
			$password=d()->admin['editor']['password'][$key];
			
			if($login == $_POST['login'] && $password === md5($_POST['password'])) {
				$_SESSION['admin']=$_POST['login'];
				unset($_SESSION['whitelist']);
				header('Location: /');
				exit();
			}
		}
		if($_POST['login']!='admin' && $_POST['login']!='developer' && $_POST['login']!='' && $_POST['login']!='developer' && isset(d()->admin['users']) && isset(d()->admin['users']['enabled']) && d()->admin['users']['enabled']=='yes'){
			//Активирован режим "людей из таблицы";
			$user = d()->Admin_user->where('login = ? and password = ?',$_POST['login'],md5($_POST['password']));
			if(!$user->is_empty){
				$_SESSION['whitelist']=array_map('trim',explode(',',$user->whitelist));
				$_SESSION['admin']=$_POST['login'];
			}
		}

		d()->notice='Неверный логин или пароль';
	}

	if(!isset($_SESSION['admin'])) {
		return d()->admin_authorisation();
	}
	d()->content = d()->content();
	return d()->render('admin_tpl');
}
function form_row($field=array())
{
	if(!isset($field['name'])){
		$field['name'] = $field[1];
	}
	
	if(!isset($field['title'])){
		$field['title'] = $field[2];
	}
	
	if(!isset($field['type'])){
		$field['type'] = $field[0];
	}
	
	$line = d()->row_data;
	$scenario = d()->admin_current_scenario ;
	
	d()->title=$field['title'];
	d()->name='data['.$field['name'].']';
	
	d()->value='';
	d()->field_params=$field;
	if ((url(4)=='add' || $scenario==2) && isset($_GET[$field['name']])) {
		d()->value=$_GET[$field['name']];
	}
	if ((url(4)=='add' || $scenario==2) && isset($_POST['data'][$field['name']])) {
		d()->value=$_POST['data'][$field['name']];
	} 
	if($field['name']){
		if (isset($line[$field['name']])) {
			d()->value=$line[$field['name']];
		}
		
		if (  isset($_GET[$field['name']])) {
			d()->value=$_GET[$field['name']];
		}
	}
	return d()->call('admin_'.$field['type']);
}

function admin_utils_phpinfo(){
	if(iam('developer')){
		phpinfo();
		exit;
	}
}