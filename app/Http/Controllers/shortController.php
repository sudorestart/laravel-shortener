<?php
  
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\ShortLink;
  
class shortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
   
        return view('shortenLink', compact('shortLinks'));
        
    }
   public function expand(Request $request)
   {

    $var = $request->link2;
    $expanded = ShortLink::where('code', $var )->get('link');
      return redirect('generate-short-link')
     ->with('success', $expanded . ' is the expanded link');
   }

public function custom(Request $request)

{
   
    $input['link'] = $request->link3; 
    $input['code'] = $request->link4 ;
    ShortLink::create($input);
    return redirect('generate-short-link')
    ->with('success', 'Short link generated!');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input['link'] = $request->link;  
        $input['code'] = Str::random(6);
        Shortlink::create($input);
   
      //  Shortlink::create(DB::raw('BINARY `code`'), $input);

  
        return redirect('generate-short-link')
             ->with('success', 'Short Link Generated Successfully!');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        return redirect($find->link);
    }
}