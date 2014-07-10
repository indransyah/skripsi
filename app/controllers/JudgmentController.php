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

	public function getPairwisecomparison($id = null)
	{
		if (empty($id)) {
			$judgments = CriteriaJudgment::all();
			$items = Criteria::all();
			$itemId = "criteria_id";
		} else {
			$judgments = SubcriteriaJudgment::all();
			$items = Subcriteria::where('criteria_id', '=', $id)->get();
			$itemId = "subcriteria_id";
		}
		// return $judgments;
		$max = count($judgments);
		if ($max == 0) {
			return "NOL";
		}
		return "NOPE";
		// return $judgments;
		// $judgments = CriteriaJudgment::all();
		// $criterias = Criteria::all();
		// $max = count($criterias);
		if (!empty($judgments)) {
			$loop = 0;
			for ($i=0; $i < $max; $i++) { 
				for ($j=0; $j < $max; $j++) { 
					$data[$i][$j] = (float) $judgments[$loop]->judgment;
					$loop++;
				}
				$loop=$loop;
			}

			// Menghitung jumlah judgment
			for ($i=0; $i < $max; $i++) { 
				$judgmentTotal[$i] = 0;
				for ($j=0; $j < $max; $j++) { 
					$judgmentTotal[$i] += $data[$j][$i];
				}
			}

			// Matrik normalisasi
			for ($i=0; $i < $max; $i++) { 
				for ($j=0; $j < $max; $j++) { 
					$normalization[$i][$j] = $data[$i][$j] / $judgmentTotal[$j];
				}
			}

			// Menghitung jumlah matrik normalisasi
			for ($i=0; $i < $max; $i++) { 
				$normalizationTotal[$i] = 0;
				for ($j=0; $j < $max; $j++) { 
					$normalizationTotal[$i] += $normalization[$j][$i];
				}
			}

			// Menghitung tpv
			for ($i=0; $i < $max; $i++) { 
				$tpv[$i] = 0;
				for ($j=0; $j < $max; $j++) { 
					$tpv[$i] += $normalization[$i][$j];
					if ($j == $max-1) {
						$tpv[$i] /= $max;
					}
				}
			}

			// Menghitung rating
			for ($i=0; $i < $max; $i++) { 
				$rating[$i] = 0;
				for ($j=0; $j < $max; $j++) { 
					$rating[$i] = $tpv[$i]/max($tpv);
				}
			}

			// Matrix Ax
			for ($i=0; $i < $max; $i++) { 
				$Ax[$i] = 0;
				for ($j=0; $j < $max; $j++) { 
					$Ax[$i] += $data[$i][$j] * $tpv[$j];
				}
			}

			// Menghitung lamda
			$lamda = array();
			for ($i=0; $i < $max; $i++) { 
				$lamda[$i] = $Ax[$i]/$tpv[$i];
			}

			$lamdaMax = array_sum($lamda)/$max;
			$CI = ($lamdaMax-$max)/($max-1);
			$CR = $CI/$this->RI[$max];
			$consistent = true;

			// return "OK";
			$this->layout->content = View::make('backend.judgment.pairwisecomparison')
			->with(array(
				'items'=>$items, 
				'judgments'=>$judgments, 
				'judgmentTotal'=>$judgmentTotal, 
				'normalization'=>$normalization, 
				'normalizationTotal'=>$normalizationTotal,
				'tpv'=>$tpv,
				'rating'=>$rating,
				'Ax'=>$Ax,
				'lamda'=>$lamda,
				'lamdaMax'=>$lamdaMax,
				'CI'=>$CI,
				'RI'=>$this->RI[$max],
				'CR'=>$CR,
				'consistent'=>$consistent,
				'data'=>$data
				));
		} else {
			return Redirect::to('judgment/criteria');
		}
	}

	public function getCriteria()
	{
		$criterias = Criteria::all();
		// $criterias = DB::select('select * from criterias');
		$this->layout->content = View::make('backend.judgment.criteriajudgment')->with(array('criterias'=>$criterias, 'options'=>$this->options));
	}

	public function postPairwisecomparison()
	{
		return "OK";
	}

	public function postPairwisecomparisonold($id = null)
	{
		// $data[] = array();
		// $judgments[] = array();
		// $judgmentTotal = array();
		// $normalization[] = array();
		// $normalizationTotal = array();
		// $tpv = array();
		// $rating = array();
		// $Ax = array();

		if (empty($id)) {
			$items = Criteria::all();
			$itemId = "criteria_id";
		} else {
			$items = Subcriteria::where('criteria_id', '=', $id)->get();
			$itemId = "subcriteria_id";
		}
		$max = count($items);
		
		$index = 0;
		for ($i=0; $i < $max; $i++) {
			$total[$i] = 0; 
			for ($j=0; $j < $max; $j++) {
				if ($i==$j) {
					$judgments[$i][$j] = (float) 1;
					$data[$index][$itemId] = $items[$i]->$itemId;
					$data[$index]['judgment'] = (float) 1;
					$data[$index]['compared_'.$itemId] = $items[$j]->$itemId;
					$index++;
				} else {
					$tmp = Input::get($items[$i]->$itemId.'-'.$items[$j]->$itemId);
					if (is_null($tmp)) {
						$input = (float) 1 / Input::get($items[$j]->$itemId.'-'.$items[$i]->$itemId);
						$data[$index][$itemId] = $items[$i]->$itemId;
						$data[$index]['judgment'] = $input;
						$data[$index]['compared_'.$itemId] = $items[$j]->$itemId;
						$index++;
					} else {
						$input = (float) Input::get($items[$i]->$itemId.'-'.$items[$j]->$itemId);
						$data[$index][$itemId] = $items[$i]->$itemId;
						$data[$index]['judgment'] = $input;
						$data[$index]['compared_'.$itemId] = $items[$j]->$itemId;
						$index++;
					}
					$judgments[$i][$j] = $input;
				}
			}
		}

		// Menghitung jumlah judgment
		for ($i=0; $i < $max; $i++) { 
			$judgmentTotal[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$judgmentTotal[$i] += $judgments[$j][$i];
			}
		}

		// Matrik normalisasi
		for ($i=0; $i < $max; $i++) { 
			for ($j=0; $j < $max; $j++) { 
				$normalization[$i][$j] = $judgments[$i][$j] / $judgmentTotal[$j];
			}
		}

		// Menghitung jumlah matrik normalisasi
		for ($i=0; $i < $max; $i++) { 
			$normalizationTotal[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$normalizationTotal[$i] += $normalization[$j][$i];
			}
		}

		// Menghitung tpv
		for ($i=0; $i < $max; $i++) { 
			$tpv[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$tpv[$i] += $normalization[$i][$j];
				if ($j == $max-1) {
					$tpv[$i] /= $max;
				}
			}
		}

		// Menghitung rating
		for ($i=0; $i < $max; $i++) { 
			$rating[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$rating[$i] = $tpv[$i]/max($tpv);
			}
		}

		// Matrix Ax
		for ($i=0; $i < $max; $i++) { 
			$Ax[$i] = 0;
			for ($j=0; $j < $max; $j++) { 
				$Ax[$i] += $judgments[$i][$j] * $tpv[$j];
			}
		}

		// $lamda = array();
		// Menghitung lamda
		for ($i=0; $i < $max; $i++) { 
			$lamda[$i] = $Ax[$i]/$tpv[$i];
		}

		$lamdaMax = array_sum($lamda)/$max;
		$CI = ($lamdaMax-$max)/($max-1);
		$CR = $CI/$this->RI[$max];
		
		if (round($CR,2) <= 0.1) {
			$consistent = true;
			// DB::table('criteria_judgments')->delete();
			// foreach ($data as $key => $value) {
			// 	$criteriaJudgment = new CriteriaJudgment;
			// 	$criteriaJudgment->criteria_id = $value['criteria_id'];
			// 	$criteriaJudgment->judgment = $value['judgment'];
			// 	$criteriaJudgment->compared_criteria_id = $value['compared_criteria_id'];
			// 	$criteriaJudgment->save();
			// }
		} else {
			$consistent = false;
		}

		$this->layout->content = View::make('backend.judgment.pairwisecomparison')
		->with(array(
			'items'=>$items, 
			'judgments'=>$judgments, 
			'judgmentTotal'=>$judgmentTotal, 
			'normalization'=>$normalization, 
			'normalizationTotal'=>$normalizationTotal,
			'tpv'=>$tpv,
			'rating'=>$rating,
			'Ax'=>$Ax,
			'lamda'=>$lamda,
			'lamdaMax'=>$lamdaMax,
			'CI'=>$CI,
			'RI'=>$this->RI[$max],
			'CR'=>$CR,
			'consistent'=>$consistent,
			'data'=>$data
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
			$this->layout->content = View::make('backend.judgment.subcriteriajudgment')
			->with(array(
				'id'=>$id,
				'criteria'=>$criteria,
				'subcriterias'=>$subcriterias,
				'options'=>$this->options
				));
		}
	}
	
}
