<?php

class JudgmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth');
	}

	protected $layout = 'backend.layouts.index';

	// protected $ri = array(0,0,0,0.58,0.90,1.12,1.24,1.32,1.41,1.45,1.49,1.51,1.48,1.56,1.57,1.59);
	protected $RI = array(0,0,0,0.58,0.90,1.12,1.24,1.32,1.41,1.45,1.49,1.51);

	protected $options = array(
			'1'=>'1. Sama penting dengan',
			'2'=>'2. Mendekati sedikit lebih penting dari',
			'3'=>'3. Sedikit lebih penting dari',
			'4'=>'4. Mendekati lebih penting dari',
			'5'=>'5. Lebih penting dari',
			'6'=>'6. Mendekati sangat penting dari',
			'7'=>'7. Sangat penting dari',
			'8'=>'8. Mendekati mutlak dari',
			'9'=>'9. Mutlak sangat penting dari'
		);

	public function getIndex()
	{
		return Redirect::to('judgment/criteria');
	}

	public function getCriteria()
	{
		$criterias = Criteria::all();
		$this->layout->content = View::make('backend.judgment.criteriajudgment')->with(array('criterias'=>$criterias, 'options'=>$this->options));
	}

	public function postCriteria()
	{
		$judgments[] = array();
		$criterias = Criteria::all();
		$max = count($criterias);
		for ($i=0; $i < $max; $i++) {
			$total[$i] = 0; 
			for ($j=0; $j < $max; $j++) {
				if ($i==$j) {
					$judgments[$i][$j] = (float) 1;
				} else {
					$tmp = Input::get($criterias[$i]->criteria_id.'-'.$criterias[$j]->criteria_id);
					if (is_null($tmp)) {
						$input = (float) 1 / Input::get($criterias[$j]->criteria_id.'-'.$criterias[$i]->criteria_id);
					} else {
						$input = (float) Input::get($criterias[$i]->criteria_id.'-'.$criterias[$j]->criteria_id);
					}
					$judgments[$i][$j] = $input;
				}
			}
		}

		$judgmentTotal = array();
		for ($i=0; $i < $max; $i++) { 
			$judgmentTotal[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$judgmentTotal[$i] += $judgments[$j][$i];
			}
		}	

		$normalization[] = array();
		for ($i=0; $i < $max; $i++) { 
			for ($j=0; $j < $max; $j++) { 
				$normalization[$i][$j] = $judgments[$i][$j] / $judgmentTotal[$j];
			}
		}

		$normalizationTotal = array();
		for ($i=0; $i < $max; $i++) { 
			$normalizationTotal[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$normalizationTotal[$i] += $normalization[$j][$i];
			}
		}

		$tpv = array();
		for ($i=0; $i < $max; $i++) { 
			$tpv[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$tpv[$i] += $normalization[$i][$j];
				if ($j == $max-1) {
					$tpv[$i] /= $max;
				}
			}
		}

		$ranking = array();
		for ($i=0; $i < $max; $i++) { 
			$ranking[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$ranking[$i] = $tpv[$i]/max($tpv);
			}
		}

		$Ax = array();
		for ($i=0; $i < $max; $i++) { 
			$Ax[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$Ax[$i] += $judgments[$i][$j] * $tpv[$j];
				// echo $i." Ax ".round($Ax[$i],2)." = ".round($judgments[$i][$j],2)."*".round($tpv[$j],2).'|';
			}
			// echo "<br>";
		}

		$tmp = 0;
		for ($i=0; $i < $max; $i++) { 
			$tmp += $Ax[$i]/$tpv[$i];
		}
		$t = (1/$max)*$tmp;
		$CI = ($t-$max)/($max-1);
		$CR = $CI/$this->RI[$max];
		if ($CR <= 0.1) {
			$status = "KONSISTEN";
		} else {
			$status = "TIDAK KONSISTEN";
		}

		$criterias = Criteria::all();
		$this->layout->content = View::make('backend.judgment.pairwisecomparison')
			->with(array(
				'criterias'=>$criterias, 
				'judgments'=>$judgments, 
				'judgmentTotal'=>$judgmentTotal, 
				'normalization'=>$normalization, 
				'normalizationTotal'=>$normalizationTotal,
				'tpv'=>$tpv,
				'ranking'=>$ranking,
				'Ax'=>$Ax,
				'status'=>$status
				));
	}

	public function getSubcriteria($id = null)
	{
		if (empty($id)) {
			$criterias = Criteria::all();
			$this->layout->content = View::make('backend.judgment.criteria')->with('criterias', $criterias);
		} else {
			$criteria = Criteria::find($id);
			$subcriterias = Subcriteria::where('criteria_id', '=', $id)->get();
			$this->layout->content = View::make('backend.judgment.subcriteriajudgment')->with(array('criteria'=>$criteria, 'subcriteria'=>$subcriterias));
		}
		
	}

}
