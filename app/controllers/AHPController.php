<?php

class AHPController extends BaseController {

	protected $layout = 'backend.layouts.index';

	public function getIndex()
	{
		$scale[0][0] = 5;
		$scale[0][1] = 3;
		$scale[0][2] = 5;
		$scale[0][2] = 5;
		$scale[1][2] = 5;

		// $pairwise[]=array();
		$pairwise[0] = array(1,4000,0.2,0.4);
		$pairwise[1] = array(3,1,0.2,0.4);
		$pairwise[2] = array(3,4000,1,0.4);
		$pairwise[3] = array(3,4000,0.2,1);
		$this->layout->content = View::make('backend.ahp.index')->with('pairwise', $pairwise);;
	}

}
