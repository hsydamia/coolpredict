<?php

namespace App\Http\Controllers;

use Excel;
use Cache;
use Storage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	private $label = [
		'positive',
		'negative'
	];

	public function chart(Request $request)
	{
		$company = $request->company;
		$cacheKey = "$company:chart";

    	if (Cache::has($cacheKey)) {
    		$data = Cache::get($cacheKey);

    		return view('article-chart', compact('data', 'company'));
    	}

    	$data = [];
    	foreach ($this->label as $label) {
    		$predictionCsvPath = storage_path('\app\data\prediction\\'. $company . '-prediction.csv');
    		$articlePath = 'data\labelled\\'. $label . '\\' . $company . '-data.json';

    		$predictionList = Excel::load($predictionCsvPath)->get()->toArray();
    		$articleList = json_decode(Storage::get($articlePath), true);

    		$count = 0;

    		foreach ($predictionList as $prediction) {
    			$predictionDate = Carbon::parse(trim($prediction['date']));
    			$articles = array_filter($articleList, function ($article) use ($predictionDate) {
    				$articleDate = Carbon::parse(str_replace('/', '-', $article['date_posted']));

    				return $predictionDate->equalTo($articleDate);
    			});

    			if (empty($articles)) {
    				continue;
    			}

    			$count += count($articles);
    		}

    		$data[$label] = $count;
    	}

    	Cache::put($cacheKey, $data, 480);
    	return view('article-chart', compact('data', 'company'));
	}

    public function articles(Request $request)
    {
    	$label = 'positive';
    	$company = $request->company;

    	if ($request->label) {
    		$label = $request->label;
    	}

    	$cacheKey = "$company:$label:articles";

    	if (Cache::has($cacheKey)) {
    		$data = Cache::get($cacheKey);

    		return view('article', compact('data', 'label', 'company'));
    	}

    	$predictionCsvPath = storage_path('\app\data\prediction\\'. $company . '-prediction.csv');
    	$articlePath = 'data\labelled\\'. $label . '\\' . $company . '-data.json';

    	$predictionList = Excel::load($predictionCsvPath)->get()->toArray();
    	$articleList = json_decode(Storage::get($articlePath), true);

    	$data = [];

    	foreach ($predictionList as $prediction) {
    		$predictionDate = Carbon::parse(trim($prediction['date']));
    		$articles = array_filter($articleList, function ($article) use ($predictionDate) {
    			$articleDate = Carbon::parse(str_replace('/', '-', $article['date_posted']));

    			return $predictionDate->equalTo($articleDate);
    		});

    		if (empty($articles)) {
    			continue;
    		}

    		$predictionArticle = [
    			'date' => $predictionDate->format('d-m-Y'),
    			'actual_price' => number_format($prediction['close'], 2),
    			'price_prediction' => number_format($prediction['predictionclose'], 2),
    			'articles' => array_values($articles)
    		];

    		array_push($data, $predictionArticle);
    	}

    	Cache::put($cacheKey, $data, 480);

    	return view('article', compact('data', 'label', 'company'));
    }
}
