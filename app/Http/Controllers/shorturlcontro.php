<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\url_list;


class shorturlcontro extends Controller
{
    //url short

    public function short(Request $req){



        $currenturl = $req->original_url;
        $currentIP = $req->ip();

        $x = url_list::where('Original_url', "$currenturl")->first();
        $saved_url=$x['Original_url'];

        //checking for existing shortened

        if ( $saved_url==$currenturl){

            $new_url=$x['short_url'];
            $main_url=$saved_url;


            $ipAddress = $x['user_ip'];
            
            $visit=$x['visits'];
            $t_vist = $visit+1;
            $x->update(["visits"=>$t_vist]);

            print("Your current visits");
            print($x['visits']);
            if ($x['visits']>=3 && ($ipAddress == $currentIP)){
                $x->update(["Total_visits"=>3]);
                return view('userBlock');
            }   
            
        } 
        
        else{
            //Saving input url

             $new_url= url_list::create( ['Original_url'=>$currenturl] );

             //saving user IP address 

             $ipAddress = $req->ip();
             $new_url->update(["user_ip"=>$ipAddress]);

             //Counting visits
             $new_url->update(["visits"=>1]);
             //$new_url->update(["Total_visits"=>1]);


            //  $visit=$new_url['visits'];
            //  $t_vist = $visit+1;
            //  $new_url->update(["Total_visits"=>$t_vist]);


               //Converting it to 6-alphanumeric char 

                //$limit = 5;
                $char ='0123456789@#~.?/&,&lt;|\!£$%^&abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

                $short_url=base_convert($new_url->id, 10,36);

                if(strlen($short_url)< 6 ){

                    $limit = 6 - strlen($short_url);
                    
                    $short_url=$short_url . substr(str_shuffle($char), 0, $limit);
                    $new_url->update(["short_url"=>$short_url]);

                    $main_url=$new_url['Original_url'];
                    $new_url=$new_url['short_url'];
                   


                }else{
                    $new_url->update(["short_url"=>$short_url]);
                    $main_url=$new_url['Original_url'];
                    $new_url= $new_url['short_url'];
                } 

            }
        
        return view("shorted",["data"=>$new_url,"url"=>$main_url,"ip"=>$ipAddress]);
        

        }


}
