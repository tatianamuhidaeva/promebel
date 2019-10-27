<?php
function stuff_for_test()
{
	return 'result';
}

class CoreTest extends Test
{
	function test_coverage(){
		$this->assertCoverage('cms/cms.php');
		//����������
		d()->test_var='test value';
		$this->assertEquals(d()->test_var,'test value');
		$this->assertEquals(doit()->test_var,'test value');
		
		
		 
		
		$this->assertEquals(d()->url(),url());
		
		$this->assertEquals(d()->stuff_for_test(), 'result');
		$this->assertEquals(d()->render('stuff_for_test'), 'result');
		d()->stuff_for_test = 'another result';
		$this->assertEquals(d()->render('stuff_for_test'), 'another result');
		
		
		$dummy = new PDODummy();
		$this->assertEquals($dummy, $dummy->someUnusualFunc());
		
		$this->assertEquals(get_class(d()->SomeAnyStuff), 'SomeAnyStuff');
		
	}
	
	/*
	Issue #27
	���������������� ���������:

		{{helper client 'user' admin user => list }}
		� ���������
		{{helper d()->client, 'user', d()->admin,'user'=> d()->list }}
	
	*/
	
	function test_advanced_syntaxer(){
		$this->assertEquals(d()->compile_advanced_chain(array('test')),'$_c_tmp=$doit->test');
		$this->assertEquals(d()->compile_advanced_chain(array('test','test2')),'$_c_tmp=(is_object($_c_tmp=$doit->test)?$_c_tmp->test2:$_c_tmp["test2"])');
		$this->assertEquals(d()->compile_advanced_chain(array('a','b','c')),'$_c_tmp=(is_object($_c_tmp=(is_object($_c_tmp=$doit->a)?$_c_tmp->b:$_c_tmp["b"]))?$_c_tmp->c:$_c_tmp["c"])');
	}
	
	function test_simple_syntaxis()
	{
	
		//������������� �����
		$this->assertEquals(d()->shablonize('{test}'),'<?php print $_c_tmp=$doit->test; ?>');
		$this->assertEquals(d()->shablonize('{{test}}'),'<?php print $doit->call("test"); ?>');
		$this->assertEquals(d()->shablonize('{{test "user"}}'),'<?php print $doit->call("test",array(array( "user")));?>');
		$this->assertEquals(d()->shablonize('{{edit "href"=> "/admin/edit/plugins/name?fields=textblock" }}'),'<?php print $doit->call("edit",array(array( "href"=> "/admin/edit/plugins/name?fields=textblock" )));?>');
		 
		
		
		/*
		$this->assertEquals(d()->shablonize('{{test user admin les}}'),'<?php print $doit->call("test",array(array(user, admin,	 les))); ?>');
		*/
		
		
	}
}
 
?>