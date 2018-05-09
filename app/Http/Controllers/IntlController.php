<?php

namespace MiomoSport\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IntlController extends Controller
{
  const URL = 'https://api.sportradar.us/soccer-xt3/intl/es/';
  const APIKEY = 'aghfck8a52fhv8vd7b5ssxt3';

  public function __construct(){
    $this->client = new Client([
      'base_uri' => self::URL
    ]);
  }
    //
    public function index()
    {
      $response = $this->client->request('GET','tournaments.json',['query' => ['api_key'=>self::APIKEY]]);

      $torneos = json_decode($response->getBody());
      $tournaments = $torneos->tournaments;
      $result = array();
      foreach ($tournaments as $torneo) {
        if ($torneo->category->id == 'sr:category:4') {
          if (empty($torneo->season_coverage_info->max_coverage_level) ||
          $torneo->season_coverage_info->max_coverage_level == 'platinum') {
            array_push($result, $torneo);
          }
        }
      }
      return view('intl.index',compact('result'));
    }


}
