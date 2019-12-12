<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UssdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        error_reporting(0);
        header('Content-type: text/plain');
        set_time_limit(100);

        //get inputs
        $sessionId = $_REQUEST["sessionId"];
        $serviceCode = $_REQUEST["serviceCode"];
        $phoneNumber = $_REQUEST["phoneNumber"];
        $text = $_REQUEST["text"];   //


         //Explode the text to get the value of the latest interaction - think 1*1
         $textArray=explode('*', $text);
         $userResponse=trim(end($textArray));

         //Set the default level of the user
         $level=0;

         //Check the level of the user from the DB and retain default level if none is found for this session

         $qlevel = DB::table('session')->where('sessionId',$sessionId)->value('level');

         if($qlevel){
               $level = $qlevel;
         }


         //Check if the user is in the db
         $riderId = DB::table('phone')->where('phone',$phoneNumber)->value('rider');
         $user = DB::table('rider')->where('id',$riderId);

         //Check if the user is available (yes)->Serve the menu;
         if($user->exists())
         {
             //Serve the Services Menu (if the user is fully registered,
             //level 0 and 1 serve the basic menus, while the rest allow for financial transactions)

             if($level==0 || $level==1)
             {
                 //Check that the user actually typed something, else demote level and start at home
                 switch ($userResponse)
                 {

                     case "1":




                         break;

                      default:
                          //9b. Graduate user to next level & Serve Main Menu
                             DB::table('session')->insert(['sessionId'=> $sessionId , 'phoneNumber'=>$phoneNumber , 'level'=>1]);

                             //Serve our services menu
                             $response = "CON BODA MANAGEMNET SYSTEM \n";
                             $response .= " 1. Accept Ride\n";
                             $response .= " 2. Report Boda Crime\n";
                             $response .= " 3. Check My Details\n";
                             $response .= " 4. Boda Logs\n";

                               // Print the response onto the page so that our gateway can read it
                               header('Content-type: text/plain');
                                echo $response;
                                break;


                 }

             }
         }
         else{
             //person is a passenger

             if($level==0 || $level==1)
             {
                 //Check that the user actually typed something, else demote level and start at home
                 switch ($userResponse) {

                     case "1":
                         if($level==1){

                             // Request for a ride

                             $response = "CON please Enter The number plate";

                             //Update sessions to level 10
                             DB::table('session')->where('sessionId',$sessionId)->update(['level'=>10]);

                             // Print the response onto the page so that our gateway can read it
                             header('Content-type: text/plain');
                             echo $response;
                         }
                         break;


                     case "2":
                        // crime number plate
                        $response = "CON please Enter The number plate";

                        //Update sessions to level 11
                        DB::table('session')->where('sessionId',$sessionId)->update(['level'=>11]);

                        // Print the response onto the page so that our gateway can read it
                        header('Content-type: text/plain');
                        echo $response;

                         break;
                     case "3":
                          if($level==1){
                              //check ride logs
                              //still gat issues will be solved\

                             $trips = DB::table('logs')->where('passPhone',$phoneNumber)->exists();

                             $response = "END RIDING HISTORY \n";
                             if($trips){
                                $trips = DB::table('logs')->where('passPhone',$phoneNumber)->get();
                                foreach($trips as $trip){
                                    $response .= $trip->plate ."  ";
                                    $response .= $trip->riderphone;
                                }

                             }
                             else{
                                 $reponse .= "No ride history!!!!";
                             }


                             }
                             header('Content-type: text/plain');
                             echo $response;



                          break;

                     default:
                         //set passenger session level
                         DB::table('session')->insert(['sessionId'=> $sessionId , 'phoneNumber'=>$phoneNumber , 'level'=>1]);
                         //if user not boda driver
                         $response = "CON BODA MANAGEMNET SYSTEM \n";
                         $response .= " 1. Request Ride\n";
                         $response .= " 2. Report Boda Crime\n";
                         $response .= " 3. Boda Logs\n";
                         header('Content-type: text/plain');
                         echo $response;
                         break;
                    }


            }
             else{
                 switch ($level){

                     case 10:
                         $plate = $userResponse;

                         $crimes = DB::table('report')->where([['progress','ACTIVE'],['plate',$plate]])->exists();

                         //check if the boda is involved in crime
                         if($crimes){
                                $crimes = DB::table('report')->where([['progress','ACTIVE'],['plate',$plate]])->get();
                                $riders = DB::table('rider')->where('plate',$plate)->get();
                                $response = "CON      CRIME REPORT \n\n";
                                foreach($riders as $rider){
                                    foreach($crimes as $crime){
                                        $response .= "CRIME: ".$crime->category ."\n";
                                        $response .= "Rider Name:  ".$rider->FirstName." ";
                                        $response .= $rider->LastName."\n";
                                        $response .= "Rider District: ".$rider->District."\n";
                                        $response .="..........................\n";
                                    }
                                }


                         }
                         else{
                             $response = "END Processing Ride ........\n";

                             $id = DB::table('rider')->where('plate',$plate)->value('id');
                             $phone = DB::table('phone')->where([['active','YES'],['rider',2]])->value('phone');

                             if($phone){
                                 DB::table('logs')->insert(['passPhone'=>$phoneNumber,'plate'=>$plate,'riderPhone'=>$phone]);
                                 $response .= "\n Waiting for approval";
                             }
                             else{
                                 $response .="\n BODA NOT USABLE";
                             }

                        }
                         header('Content-type: text/plain');
                         echo $response;
                         break;

                     case 11:
                            $plate = $userResponse;
                            DB::table('report')->insert(['plate'=>$plate,'phoneNumber'=>$phoneNumber]);

                             //Report crime
                             $response = "CON Select Nature of crime.\n";
                             $response .= "1. Murder \n";
                             $response .= "2. Rape \n";
                             $response .= "3. Theft \n";
                             $response .= "4. Others \n";
                             $response .= "0. Back";
                               // Print the response onto the page so that our gateway can read it
                               header('Content-type: text/plain');
                                echo $response;

                             //Update sessions to level 12
                             DB::table('session')->where('sessionId',$sessionId)->update(['level'=>12]);

                     break;

                     case 12:
                        switch ($userResponse){

                            case "1":
                                DB::table('report')->where([["phone"=>$phoneNumber],['category'=>'NULL']])->update(['category'=>'MURDER']);

                                break;

                            case "2":
                                DB::table('report')->where([["phone"=>$phoneNumber],['category'=>'NULL']])->update(['category'=>'RAPE']);

                                break;

                            case "3":
                                DB::table('report')->where([["phone"=>$phoneNumber],['category'=>'NULL']])->update(['category'=>'THEFT']);
                                break;

                            default:
                                 DB::table('report')->where([["phone"=>$phoneNumber],['category'=>'NULL']])->update(['category'=>'OTHERS']);
                                break;

                        }
                         $response = "END Report placed to Authories";
                         header('Content-type: text/plain');
                         echo $response;
                         break;
                 }

             }
         }

     }
}
