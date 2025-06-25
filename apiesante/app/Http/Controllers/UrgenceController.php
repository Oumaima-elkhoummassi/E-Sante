<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urgence;
use App\Models\Typeurgence;
use App\Models\Soustype;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Centreurgence;
use Illuminate\Support\Facades\DB;
class UrgenceController extends Controller
{
    //

    public function index()
    {
      $response =Urgence::all() ;
    
    
        return response()->json($response);
    }


    public function type(Request $request)
    {
      $response =  Typeurgence::Where('id_urgence','=',$request->id)->get() ;
    
    
      return response()->json($response);


    }



    public function untype(Request $request)
    {
      $response = Urgence::Where('id','=',$request->id)->get() ;
    
    
      return response()->json($response);


    }



    

    public function secondtype(Request $request)
    {
      $response = TypeUrgence::Where('id','=',$request->id)->get() ;
    
    
      return response()->json($response);


    }



    public function login(Request $request)
    {
      $response1 = Patient::Where('email','=',$request->email)->where('mdp','=',$request->mdp)->get() ;
      $response2 = Medecin::Where('email','=',$request->email)->where('mdp','=',$request->mdp)->get() ;

    if(sizeof($response1)!=0)
    {
     return response()->json($response1);
      

    }
    else if(sizeof($response2)!=0)
    {
     return response()->json($response2);
     
    }


    else{
      return response()->json(false);
      
     }
    }

    public function finder(Request $request)
    {
      $response1 = Patient::Where('id_p','=',$request->id)->get() ;
      $response2 = Medecin::Where('id_me','=',$request->id)->get() ;

    if(sizeof($response1)!=0)
    {
     return response()->json($response1);
      

    }
    else if(sizeof($response2)!=0)
    {
     return response()->json($response2);
     
    }


    else{
      return response()->json(false);
      
     }
    
    
    


    }





    public function demandeurgence(Request $request)
    {
      $centre =new Centreurgence();
      $centre->idp = $request->id;
      $centre->accepte = "";
      $centre->nomurgence =$request->nom;
      $centre->idu =$request->idu;
      $centre->idtype =$request->idtype;
      $centre->save();
      return response()->json("ok");
    }



    public function medurgence(Request $request)
    {
      $response2 = DB::select("SELECT centreurgences.*,patients.`id_p`, patients.`cin`, patients.`nom`, patients.`mdp`, patients.`email`, patients.`sex`, patients.`age`,patients.`tel`,patients.`type`,patients.`img` , typeurgences.nom as typeof FROM centreurgences,patients,typeurgences 
      WHERE centreurgences.idp=patients.id_p and centreurgences.idtype=typeurgences.id   and  centreurgences.idm=$request->id;");
      return response()->json($response2);
    }

    public function boitepatient(Request $request)
    {
      $response2 = DB::select("SELECT * FROM centreurgences,patients,medecins WHERE centreurgences.idp=patients.id_p
      and centreurgences.idm=medecins.id_me
       and
      centreurgences.idp=$request->id and  centreurgences.accepte='accepter' ; ");
      return response()->json($response2);
    }



    public function ifdemande(Request $request)
    {
      $response2 = DB::select("SELECT * FROM centreurgences WHERE idp=$request->idp
      and idu=$request->idu and idtype=$request->idtype; ");
      return response()->json($response2);
    }







    public function connect(Request $request)
    {
     
           $response2 = DB::update("UPDATE   medecins  set online=1  WHERE id_me='$request->id'");
    
    
           return response()->json($response2);
    }


    public function deconnect(Request $request)
    {
     
           $response2 = DB::update("UPDATE   medecins  set online=0  WHERE id_me='$request->id'");
    
    
           return response()->json($response2);
    }




    public function medaccept(Request $request)
    {
     
           $response2 = DB::update("UPDATE  centreurgences  set accepte='accepter'  WHERE id='$request->id'");
    
    
           return response()->json($response2);
    }


   
  
    public function  medrefuse(Request $request)
    {
     
           $response2 = DB::update("UPDATE  centreurgences  set accepte='refuse'  WHERE id='$request->id'");
    
    
           return response()->json($response2);
    }



    public function  terminer(Request $request)
    {
     
           $response2 = DB::update("UPDATE  centreurgences  set accepte='terminer'  WHERE id='$request->id'");
    
    
           return response()->json($response2);
    }














  }


