<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    //
    public function index(){
        $urls = ShortUrl::all();
        return view('index',compact('urls'));
    }
    public function create(){
        $count = ShortUrl::count();
        //dd($count);
        if ($count >= 10){
            return 'เกินกำหนด';
        }
        return view('create');
    }
    public function store(Request $request){
        //dd($request->all());
        //dd($this->randString());
        $long_url = $request->get('long_url');

        $short_url = $this->randString();
        ShortUrl::create([
            'long_url'=>$long_url,
            'short_url'=>$short_url
        ]);

        return redirect('/')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function randString(){
        $Characters = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '01234567789';

        //dd(rand(0,5));
        //dd(strlen(($Characters)));
        //dd($Characters[1]);

        $CharLength = strlen($Characters);
        $numberLength = strlen($numbers);
        $string = '343';
        for ($i=0;$i<3;$i++){
            $string.=$Characters[rand(0,$CharLength-1)];
        }
        for ($i=0;$i<2;$i++){
            $string.=$numbers[rand(0,$numberLength-1)];

        }
        return $string;

    }
    public function check($code){
        //dd($code);
        $result = ShortUrl::Where('short_url',$code)->first();
        //dd($result);
        if($result){
            return redirect()->away($result->long_url);
        }
        return "ไม่พบรหัส Short URL นี้";
    }
}
