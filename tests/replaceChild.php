<?php
/*

Copyright 2009 The SimpleDOM authors

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

##require_once 'PHPUnit/Framework.php';
#require_once dirname(__FILE__) . '/../SimpleDOM.php';
 
class SimpleDOM_TestCase_replaceChild extends PHPUnit\Framework\TestCase
{
	public function testReplaceFirstChild()
	{
		$root = new SimpleDOM('<root><child1 /><child2 /><child3 /></root>');
		$new = new SimpleDOM('<new />');

		$expected_return = clone $root->child1;
		$return = $root->replaceChild($new, $root->child1);

		$this->assertXmlStringEqualsXmlString('<root><new /><child2 /><child3 /></root>', $root->asXML());
		$this->assertEquals($expected_return, $return);
		$this->assertNotSame(
			dom_import_simplexml($return),
			dom_import_simplexml($new)
		);
	}

	public function testReplaceMiddleChild()
	{
		$root = new SimpleDOM('<root><child1 /><child2 /><child3 /></root>');
		$new = new SimpleDOM('<new />');

		$expected_return = clone $root->child2;
		$return = $root->replaceChild($new, $root->child2);

		$this->assertXmlStringEqualsXmlString('<root><child1 /><new /><child3 /></root>', $root->asXML());
		$this->assertEquals($expected_return, $return);
		$this->assertNotSame(
			dom_import_simplexml($return),
			dom_import_simplexml($new)
		);
	}

	public function testReplaceLastChild()
	{
		$root = new SimpleDOM('<root><child1 /><child2 /><child3 /></root>');
		$new = new SimpleDOM('<new />');

		$expected_return = clone $root->child3;
		$return = $root->replaceChild($new, $root->child3);

		$this->assertXmlStringEqualsXmlString('<root><child1 /><child2 /><new /></root>', $root->asXML());
		$this->assertEquals($expected_return, $return);
		$this->assertNotSame(
			dom_import_simplexml($return),
			dom_import_simplexml($new)
		);
	}

	/**
	* @expectedException DOMException
	*/
	public function testNotFound()
	{
		$root = new SimpleDOM('<root><child><grandchild /></child></root>');
		$new = new SimpleDOM('<new />');

		try
		{
			$root->replaceChild($new, $root->child->grandchild);
		}
		catch (DOMException $e)
		{
			$this->assertSame(DOM_NOT_FOUND_ERR, $e->code);
			throw $e;
		}
	}

	public function testWrongDocument()
	{
		$root = new SimpleDOM('<root />');
		$new = new SimpleDOM('<new />');
		$node = new SimpleDOM('<node />');

		$this->assertFalse($root->replaceChild($new, $node));
	}
}