<?php

namespace MiomoSport\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IntlTorneoController extends Controller
{

  const URL = 'https://api.sportradar.us/soccer-xt3/intl/es/';
  const APIKEY = '4jmn6ukdynyrw8fwf3yv29fq';

  public function __construct(){
    $this->client = new Client([
      'base_uri' => self::URL
    ]);
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

  public function equipos($id)
  {
    $response = $this->client->request('GET','tournaments/'.$id.'/info.json',['query' => ['api_key'=>self::APIKEY]]);

    $responseData = json_decode($response->getBody());

    $name = $responseData->tournament->current_season->name;
    $id = $responseData->tournament->id;
    $groups = $responseData->groups;

    return view('intl.equipos',compact('name','id','groups'));
  }

  public function posiciones($id)
  {
    $response = $this->client->request('GET','tournaments/'.$id.'/standings.json',['query' => ['api_key'=>self::APIKEY]]);

    $responseData = json_decode($response->getBody());

    $name = $responseData->tournament->current_season->name;
    $id = $responseData->tournament->id;
    $standings = $responseData->standings;

    return view('intl.posiciones',compact('name','id','standings'));
  }

  public function partidos($id)
  {
    $response = $this->client->request('GET','tournaments/'.$id.'/schedule.json',['query' => ['api_key'=>self::APIKEY]]);

    $responseData = json_decode($response->getBody());

    $name = $responseData->tournament->name;
    $id = $responseData->tournament->id;
    $partidos = $responseData->sport_events;

    $jornadas = collect($partidos)->groupBy('tournament_round.number')->toArray();
    $jornadas = collect($jornadas)->sortBy('tournament_round.group')->toArray();

    //return $jornadas;
    return view('intl.partidos',compact('name','id','jornadas'));
  }
}
