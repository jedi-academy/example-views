<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application {

	function __construct()
	{
		parent::__construct();
		$this->load->model('contacts'); // so we can use this everywhere here
		$this->load->library('parser'); // so we don't have to do this inside methods
		$this->load->library('parsedown'); // markdown parser
	}

	public function index()
	{
		$this->data['pagebody'] = 'assembly';
		$this->render();
	}

	// Panels - 3 column layout from startbootstrap.com
	function p01()
	{
		$text = file_get_contents(DATAPATH . 'lorem1.md');
		$this->data['col1'] = $this->parsedown->parse($text);
		$this->data['col2'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem2.md'));
		$this->data['col3'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem3.md'));
		$this->parser->parse('bob/p01', $this->data);
	}

	// Panels - 4 column layout from cssplay
	function p02()
	{
		$this->data['col1'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem5.md'));
		$this->data['col2'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem6.md'));
		$this->data['col3'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem7.md'));
		$this->data['col4'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem4.md'));
		$this->parser->parse('bob/p02', $this->data);
	}

	// Same data, different layouts
	function p03($which = 'play01')
	{
		$this->data['col1'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem5.md'));
		$this->data['col2'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem6.md'));
		$this->data['col3'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem7.md'));
		$this->data['col4'] = $this->parsedown->parse(file_get_contents(DATAPATH . 'lorem4.md'));
		$this->parser->parse('bob/' . $which, $this->data);
	}

}
