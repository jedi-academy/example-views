<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Variables extends Application {

	public function index()
	{
		$this->data['pagebody'] = 'variables';
		$this->render();
	}

	// Vanilla PHP - note that we have to explicitly tell PHP where to find it
	function p01()
	{
		include (VIEWPATH . "vars/p01.php");
	}

	// Vanilla PHP with variables in view - note that we have to explicitly tell PHP where to find it
	function p02()
	{
		include (VIEWPATH . "vars/p02.php");
	}

	// Vanilla PHP with variables in controller - note that we have to explicitly tell PHP where to find it
	function p03()
	{
		$name = "Jim";
		$target = "Spuzzum";

		include (VIEWPATH . "vars/p03.php");
	}

	// Vanilla PHP with short-form syntax - note that we have to explicitly tell PHP where to find it
	function p04()
	{
		$name = "Jim";
		$target = "Spuzzum";

		include (VIEWPATH . "vars/p04.php");
	}

	// Vanilla PHP with curly brace syntax - note that we have to explicitly tell PHP where to find it
	function p05()
	{
		$name = "Jim";
		$target = "Spuzzum";

		include (VIEWPATH . "vars/p05.php");
	}

	// Use the CI view
	function p06()
	{
		$name = "Jim";
		$target = "Spuzzum";

		$this->load->view("vars/p04");
	}

	// Use the CI view, with parameters
	function p07()
	{
		$parms = ['name' => "Jim", 'target' => "Spuzzum"];

		$this->load->view("vars/p04",$parms);
	}

	// Use the CI parser
	function p08()
	{
		$name = "Jim";
		$target = "Spuzzum";

		$this->load->library('parser');
		$this->parser->parse("vars/p04");
	}

	// Use the CI parser, with substitution variables
	function p09()
	{
		$parms = ['name' => "Jim", 'target' => "Spuzzum"];

		$this->load->library('parser');
		$this->parser->parse("vars/p06",$parms);
	}

	// Use the CI parser, with substitution variables & script
	function p10()
	{
		$parms = ['name' => "Jim", 'target' => "Spuzzum"];

		$this->load->library('parser');
		$this->parser->parse("vars/p03",$parms);
	}

	// Demonstrate escaping output
	function p11()
	{
		$funkyName = '<script>alert("Boo")</script>';
		$parms = ['name' => html_escape($funkyName), 'target' => "Spuzzum"];

		$this->load->library('parser');
		$this->parser->parse("vars/p03",$parms);
	}

}
