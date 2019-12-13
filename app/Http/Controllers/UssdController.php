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

         //Check if the user is rider (yes)->Serve the menu;
         if($user->exists())
         {

             if($level==0 || $level==1)
             {
                 //Check that the user actually typed something, else demote level and start at home
                 switch ($userResponse)
                 {

                    case "1":
                        $response ="CON Please enter pass pin\n";
                        DB::table('session')->where('sessionId',$sessionId)->update(['level'=>10]);
                        header('Content-type: text/plain');
                        echo $response;

                        break;

                    case "6":
                        $response ="CON Please enter pass pin \n";
                        DB::table('session')->where('sessionId',$sessionId)->update(['level'=>11]);
                        header('Content-type: text/plain');
                        echo $response;


                        break;

                    case "2":
                        $request = DB::table('logs')->where([['riderPhone',$phoneNumber],['approved','NO']])->exists();
                        if($request){
                            $response ="CON Enter PIN to approve";
                            DB::table('session')->where('sessionId',$sessionId)->update(['level'=>12]);

                        }
                        else{
                            $response = " CON No Boda request available\n";
                            $response .=" 0. Back \n";

                        }
                        header('Content-type: text/plain');
                        echo $response;

                        break;

                    case "3":
                        // crime number plate
                        $response = "CON please Enter The number plate";

                        //Update sessions to level 11
                        DB::table('session')->where('sessionId',$sessionId)->update(['level'=>13]);

                        // Print the response onto the page so that our gateway can read it
                        header('Content-type: text/plain');
                        echo $response;

                        break;

                    case "4":
                        //rider details.... be put there soon


                        break;

                    case "5":
                        //boda logs... see that later

                        break;

                    default:
                          //9b. Graduate user to next level & Serve Main Menu
                             DB::table('session')->insert(['sessionId'=> $sessionId , 'phoneNumber'=>$phoneNumber , 'level'=>1]);

                             //Serve our services menu
                             $response = "CON BODA MANAGEMNET SYSTEM \n";
                             $response .= " 1. Activate Service\n";
                             $response .= " 2. Accept Ride\n";
                             $response .= " 3. Report Boda Crime\n";
                             $response .= " 4. Check My Details\n";
                             $response .= " 5. Boda Logs\n";
                             $response .= " 6. De-activate Service";

                            // Print the response onto the page so that our gateway can read it
                            header('Content-type: text/plain');
                            echo $response;
                            break;


                 }

             }
             else{
                 switch($level){

                    case 10:
                        $pin = $userResponse;
                        $correct = DB::table('phone')->where([['phone',$phoneNumber],['pin',$pin]])->exists();
                        if($correct){
                            DB::table('phone')->where([['phone',$phoneNumber],['pin',$pin]])->update(['active'=>'YES']);
                            $response ="CON Service Activated\n";
                            $response .= "0. Back \n";
                            DB::table('session')->where('sessionId',$sessionId)->update(['level'=>1]);


                        }
                        else{
                            $response="CON Wrong PIN \n Try again...\n";

                        }
                        header('Content-type: text/plain');
                        echo $response;

                        break;

                    case 11:
                        $pin = $userResponse;
                        $correct = DB::table('phone')->where([['phone',$phoneNumber],['pin',$pin]])->exists();
                        if($correct){
                            DB::table('phone')->where([['phone',$phoneNumber],['pin',$pin]])->update(['active'=>'NO']);
                            $response ="CON Service De-activated\n";
                            $response .= "0. Back \n";
                            DB::table('session')->where('sessionId',$sessionId)->update(['level'=>1]);


                        }
                        else{
                            $response="CON Wrong PIN \n Try again...\n";

                        }
                        header('Content-type: text/plain');
                        echo $response;

                        break;

                    case 12:
                        $pin = $userResponse;
                        $rider = DB::table('phone')->where([['phone',$phoneNumber],['pin',$pin],['active','YES']]);
                        $correct = $rider->exists();
                        $riderId = $rider->value('id');
                        $plate   = DB::table('rider')->where('id',$riderId)->value('plate');

                        if($correct){
                            DB::table('logs')->where([['plate',$plate],['approved','NO']])->update(['approved'=>'YES']);
                            $response = "END Ride Approved";

                        }
                        else{
                            $response="CON Wrong PIN \n Try again...\n";

                        }
                        header('Content-type: text/plain');
                        echo $response;

                        break;

                    case 13:
                        $plate = $userResponse;
                        DB::table('report')->insert(['plate'=>$plate,'phone'=>$phoneNumber]);

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

                         //Update sessions to level 14
                         DB::table('session')->where('sessionId',$sessionId)->update(['level'=>14]);

                        break;

                    case 14:
                        switch ($userResponse){

                            case "1":
                                DB::table('report')->where([['phone',$phoneNumber],['category','NULL']])->update(['category'=>'MURDER']);

                                break;

                            case "2":
                                DB::table('report')->where([['phone',$phoneNumber],['category','NULL']])->update(['category'=>'RAPE']);

                                break;

                            case "3":
                                DB::table('report')->where([['phone',$phoneNumber],['category','NULL']])->update(['category'=>'THEFT']);
                                break;

                            default:
                                DB::table('report')->where([['phone',$phoneNumber],['category','NULL']])->update(['category'=>'OTHERS']);
                                break;

                        }
                        $response = "END Report placed to Authories";
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

                                $trips = DB::table('logs')->where([['passPhone',$phoneNumber],['approved','YES']])->exists();

                                $response = "CON RIDING HISTORY \n";
                                if($trips){
                                    $trips = DB::table('logs')->where([['passPhone',$phoneNumber],['approved','YES']])->get();
                                    foreach($trips as $trip){
                                        $response .= $trip->plate ."---->";
                                        $response .= $trip->riderPhone."\n";
                                    }

                                }
                                else{
                                    $response .= "\n No ride history!!!!";
                                }

                                $response .="\n 0. Back";
                                DB::table('session')->where('sessionId',$sessionId)->update(['level'=>1]);

                                header('Content-type: text/plain');
                                echo $response;


                             }




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
                             $phone = DB::table('phone')->where([['active','YES'],['rider',$id]])->value('phone');

                             if($phone){
                                 DB::table('logs')->insert(['passPhone'=>$phoneNumber,'plate'=>$plate,'riderPhone'=>$phone,'approved'=>'NO']);
                                 $response .= "\n Waiting for approval";
                             }
                             else{
                                 $response .="\n BODA NOT USABLE\n";
                                 $response .=" 0. Back";
                                 DB::table('session')->where('sessionId',$sessionId)->update(['level'=>1]);

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
                                DB::table('report')->where([['phone',$phoneNumber],['category','NULL']])->update(['category'=>'MURDER']);

                                break;

                            case "2":
                                DB::table('report')->where([['phone',$phoneNumber],['category','NULL']])->update(['category'=>'RAPE']);

                                break;

                            case "3":
                                DB::table('report')->where([['phone',$phoneNumber],['category','NULL']])->update(['category'=>'THEFT']);
                                break;

                            default:
                                 DB::table('report')->where([['phone',$phoneNumber],['category','NULL']])->update(['category'=>'OTHERS']);
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
