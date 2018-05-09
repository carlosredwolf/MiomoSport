<?php

namespace MiomoSport\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EuropeController extends Controller
{
    //
    const URL = 'https://api.sportradar.us/soccer-xt3/eu/es/';
    const APIKEY = 'prw33zuhvpnv78rejpxr28um';

    public function __construct(){
      $this->client = new Client([
        'base_uri' => self::URL
      ]);
    }

    public function index()
    {
      $response = $this->client->request('GET','tournaments.json',['query' => ['api_key'=>self::APIKEY]]);

      $torneos = json_decode($response->getBody());
      $tournaments = $torneos->tournaments;
      $result = array();
      foreach ($tournaments as $torneo) {
          if (empty($torneo->season_coverage_info->max_coverage_level) ||
          $torneo->season_coverage_info->max_coverage_level == 'platinum') {
            array_push($result, $torneo);
          }
      }
      return view('eu.index',compact('result'));
    }

    public function show($id)
    {
      $response = $this->client->request('GET','tournaments/'.$id.'/info.json',['query' => ['api_key'=>self::APIKEY]]);

      $responseData = json_decode($response->getBody());

      $name = $responseData->tournament->current_season->name;
      $id = $responseData->tournament->id;

    session(['nombreTorneo' => $name]);

      return view('intl.show',compact('name','id'));

    }
}
