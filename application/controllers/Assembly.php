<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application {

	function __construct()
	{
		parent::__construct();
		$this->load->model('contacts'); // so we can use this everywhere here
		$this->load->library('parser'); // so we don't have to do this inside methods
	}

	public function index()
	{
		$this->data['pagebody'] = 'assembly';
		$this->render();
	}

	// Panels - 4 column layout from cssplay
	function p01()
	{
		$this->load->library('parsedown');
		$text = file_get_contents('../data/lorem1.md');
		$this->data['cols'] = $this->parsedown->parse($text);
		$this->parser->parse('bob/p01', $this->data);		
	}

}
