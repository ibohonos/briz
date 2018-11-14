<?php

class View
{
	protected $template_view = "default.php";

	public function generate($content_view, $data = null)
	{
		if ($data) :
			extract($data);
		endif;

		include VIEW_PATH . $this->template_view;
	}
}