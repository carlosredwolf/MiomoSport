<?php

namespace MiomoSport\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IntlController extends Controller
{
  const URL = 'https://api.sportradar.us/soccer-xt3/intl/es/';
  const APIKEY = '4jmn6ukdynyrw8fwf3yv29fq';

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
      return view('intl.index',compact('tournaments'));
    }


}
