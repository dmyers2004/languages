<?php

class Tools {
	public $languages = ['en','fr','gr']; /* lanagues in prefered order */

	public function figure_out_language($lang=null) {
		$languages = get_instance()->agent->languages();
		
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