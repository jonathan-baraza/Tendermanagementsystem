<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tender;
use App\Models\Application;

class TenderController extends Controller
{
    public function homepage(){
    	$tenders=Tender::orderBy('created_at','DESC')->get();
    	return view('home',compact('tenders'));
    }
    public function addTenderForm(){
    	if(Auth::user()->role=='officer'){
    		return view('tenders/add-tender');
    	}
    	else{
    		return view('errors/unauthorized');
    	}

    }
    public function addTender(Request $req){
    	$data=request()->validate([
    		'name'=>"required|string|max:100",
    		'description'=>"required|string|max:200",
    		'requirements'=>"required|string|max:255",
    		'application_deadline'=>"required|date",
    	]);

    	$tender_ref="TMS".rand(0,99).time();
    	
    	Tender::create([
    		'tender_ref'=>$tender_ref,
    		'tender_name'=>$data['name'],
    		'description'=>$data['description'],
    		'requirements'=>$data['requirements'],
    		'application_deadline'=>$data['application_deadline'],
    	]);

    	return redirect('/home')->with('tender_added','You have successfully added the tender.');
    }
    public function editTender($id){
        if(Auth::user()->role=='officer' || Auth::user()->role='applicant'){
            $tender=Tender::find($id);
            return view('tenders/edit-tender',compact('tender'));
        }
        else{
            return view('errors/unauthorized');
        }
        
    }
    public function updateTender(Request $req){
        $tender=Tender::find($req->id);
        $data=request()->validate([
            'name'=>"required|string|max:100",
            'description'=>"required|string|max:200",
            'requirements'=>"required|string|max:255",
            'application_deadline'=>"required|date",
        ]);
        $tender->update([
            'tender_name'=>$data['name'],
            'description'=>$data['description'],
            'requirements'=>$data['requirements'],
            'application_deadline'=>$data['application_deadline'],
        ]);
        return redirect('/edit-tender/'.$tender->id)->with('tender_updated','You have successfully updated the tender.');
    }
    public function confirmDeleteTenderForm($id){
        $tender=Tender::find($id);
        return view('tenders/confirm-delete-tender',compact('tender'));
    }
    public function deleteTender($id){
         $tender=Tender::find($id);
         $tender->delete();
         return redirect('/home')->with('tender_deleted','You have successfully deleted the tender.');
    }
    public function applicationForm(){
        return view('tenders/apply');
    }
    public function applyTender(Request $req){
        Application::create([
            'tender_id'=>$req->tender_id,
            'applicant_id'=>$req->applicant_id,
            'payment_id'=>$req->payment_id,
            'application_letter'=>$req->application_letter,
        ]);
        return redirect('/home')->with('tender_applied','You have successfully applied for the tender.');
    }

}
