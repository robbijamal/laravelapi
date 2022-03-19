<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase_credentials.json');
        //dd($factory);
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
       $brgRef = $database->collection('MenuWeb')->newDocument();
       //$brgRef = $database->collection('LogBarang');

       //$query = $brgRef->orderBy('time','desc');
       //$documents = $query->documents();  
       //$data = array();
        /*foreach($documents as $stu) {  
        if($stu->exists()){  
         print_r('Barang ID = '.$stu->id());  
         print_r('Barang Name = '.$stu->data()['nama']);  
            }  
        } */ 
       
        $brgRef->set([
            'menu'=>'Menu Makan Siang',
            'parent_id'=>'900',
            'foto'=>'',
            'deskripsi'=>'Hayo LOOOOOOO',
            'url'=>'gantol',
            'status'=>'2',
            'urut'=>'1444',
        ]);
    }
}
