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
 
class SimpleDOM_TestCase_insertXML extends PHPUnit\Framework\TestCase
{
	public function testChild()
	{
		$root = new SimpleDOM('<root><child /></root>');
		$new = '<new />';

		$root->insertXML($new);

		$this->assertXmlStringEqualsXmlString('<root><child /><new /></root>', $root->asXML());
	}

	public function testGrandchild()
	{
		$root = new SimpleDOM('<root><child /></root>');
		$root->child->insertXML('<new />');

		$this->assertXmlStringEqualsXmlString(
			'<root><child><new /></child></root>',
			$root->asXML()
		);
	}

	public function testTextNode()
	{
		$root = new SimpleDOM('<root><child /></root>');
		$root->insertXML('my text node');

		$this->assertXmlStringEqualsXmlString('<root><child />my text node</root>', $root->asXML());
	}

	/**
	* @expectedException BadMethodCallException
	*/
	public function testInsertXMLOutsideOfRootNode()
	{
		$root = new SimpleDOM('<root><child /></root>');
		$root->insertXML('my text node', 'after');
	}

	/**
	* @expectedException InvalidArgumentException
	*/
	public function testInvalidXML()
	{
		$root = new SimpleDOM('<root><child /></root>');
		$root->insertXML('<bad><xml>');
	}
}