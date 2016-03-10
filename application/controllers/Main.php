<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public $languages = ['en','fr','de']; /* lanagues in prefered order */
	public $views = ['index','foo','bar'];

	public function index($view=null,$lang=null) {
		$lang = $this->figure_out_language($lang);

		$view = (in_array($view,$this->views)) ? $view : 'index';

		$this->load->view('/'.$lang.'/'.$view);
	}

	protected function figure_out_language($lang=null) {
		$this->load->library('user_agent');
	
		$languages = $this->agent->languages();

		/* did they send in a language? */
		if (in_array($lang,$this->languages)) {
			/* yes and it filters so return that */
			return $lang;
		}

		foreach ($languages as $l) {
			foreach ($this->languages as $o) {
				if ($l == $o) {
					return $o;
				}
			}
		}

		/* return the first */
		return $this->languages[0];
	}

} /* end class */