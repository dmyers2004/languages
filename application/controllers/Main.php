<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public $views = ['index','foo','bar'];

	public function index($view=null,$lang=null) {
		$lang = $this->tools->figure_out_language($lang);

		$view = (in_array($view,$this->views)) ? $view : 'index';

		$this->load->view('/'.$lang.'/'.$view);
	}

} /* end class */
