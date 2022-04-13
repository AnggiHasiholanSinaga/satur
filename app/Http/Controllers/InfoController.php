<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class InfoController extends Controller
{
    public function dokumen()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://172.100.31.33:8000/api/detail/1');
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
       return view ('dokumen', compact('data'));
   
    }
}
