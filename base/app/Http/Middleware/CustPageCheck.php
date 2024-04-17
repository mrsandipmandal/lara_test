<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\CustMenu;

class CustPageCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $isaccess=false;
        $accchk=0;
        $menus=[];
        if(session()->has("isCustLoged"))
        {
            $user_loged=session()->get("username");
        }
        else
        {
            $user_loged="XXXXXXXXXXXX";
        }
        $rmenus=CustMenu::where('root_menu', '=', '0')
        ->whereRaw('(isall=1 OR FIND_IN_SET(?, user))',[$user_loged])->get()->toArray();
        foreach($rmenus as $rmenu)
        {
            $rsl=$rmenu['sl'];
            if($accchk==0)
            {
                $isc=$request->is($rmenu['route_name']);
                if($isc){$isaccess=true;$accchk=1;}
            }
            $smenus=CustMenu::where('root_menu', '=', $rsl)
            ->whereRaw('(isall=1 OR FIND_IN_SET(?, user))',[$user_loged])->get()->toArray();
            foreach($smenus as $smenu)
            {
                if($accchk==0)
            {
                $isc=$request->is($smenu['route_name']);
                $iscw=$request->is($smenu['route_name']."/*");
                if($isc or $iscw){$isaccess=true;$accchk=1;}
            }
            }
            $rmenu["sub_menus"]=$smenus;
            $menus[]=$rmenu;
        }
        session()->put("menu",$menus);
        if($isaccess or $request->is("change-custpassword") or $request->is("get-custdata") or $request->is("aaaesse_update"))
        {
        return $next($request);
        }
        else
        {
            return redirect("/noaccess");
        }
    }
}
