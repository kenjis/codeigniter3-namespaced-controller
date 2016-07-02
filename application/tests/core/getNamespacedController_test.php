<?php

class getNamespacedController_test extends TestCase
{
	public function test_abc()
	{
		$controller = getNamespacedController('Abc');
		$this->assertEquals('app\\controllers\\Abc', $controller['fqcn']);
		$this->assertStringEndsWith('/application/controllers/Abc.php', $controller['path']);
	}

	public function test_abc_def_ghi()
	{
		$controller = getNamespacedController('Ghi', 'abc/def/');
		$this->assertEquals('app\\controllers\\abc\\def\\Ghi', $controller['fqcn']);
		$this->assertStringEndsWith('/application/controllers/abc/def/Ghi.php', $controller['path']);
	}
}
