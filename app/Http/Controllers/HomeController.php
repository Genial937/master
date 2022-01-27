<?php

namespace App\Http\Controllers;

use App\Models\Cand;
use Illuminate\Http\Request;
use SimpleXMLElement;

class HomeController extends Controller
{
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        $url = 'https://www.opensecrets.org/api/?method=candSummary&cid=N00007360&cycle=2022&apikey=35cd2e15b7014316417b76fb72b9fb1d';
        $data = $this->get_request_curl($url);
        $str = $this->parse_xml($data);
        $response = new SimpleXMLElement($str);
        $cid = (array)$response->summary['cid'];
        $arr = (array)$response->summary;
        $cand = Cand::where('cid', $cid[0])->first();
        //cid exists ? update : create
        if ($cand) {
            $cand->update(array_merge($arr['@attributes']));
        } else {
            $cand = Cand::create(array_merge($arr['@attributes']));
        }
        return view('welcome', compact('cand'));
    }

    /**
     * Method get_request_curl
     *
     * @param $url $url [explicite description]
     *
     * @return void
     */
    private function get_request_curl($url)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type:application/json, Accept: application/json'),
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => true,
            )
        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }

    /**
     * Method parse_xml
     *
     * @param $data $data [explicite description]
     *
     * @return void
     */
    private function parse_xml($data)
    {
        $str = <<<XML
                 $data
               XML;

        return $str;
    }
}
