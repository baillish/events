<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    function index(){

        $customers = Customer::paginate();
        return view ('customers/all-customers' , ['customers'=>$customers]);
     }


     function show($id){

        $customer = Customer::find($id);
       
        return view ('customers/show-customer' , ['customer'=>$customer]);
     }


    function createCustomerPage(){
        return view ('customers/create-customers');
     }
     function storeCustomer(Request $request){

        Customer::create([
    
            'first_name'=> $request->fname,
            'last_name'=> $request->lname,
            'phonenumber'=> $request->phoneno,
            'email'=> $request->email,
        ]);
    
        return redirect('/products');
        
     }

     function updatePage(Request $request , $id){

        $customer = Customer::find($id);
    
        return view('customers/update-customers' , ['customer'=>$customer]);
    
        
     }

     function update(Request $request , $id){
        $customer = Customer::find($id);
        $customer->first_name = $request->fname;
        $customer->last_name = $request->lname;
        $customer->phonenumber = $request->phoneno;
        $customer->email = $request->email;
        $customer->save();
         return redirect('/customers');
        
     }

     function delete ($id) {

        $customer = Customer::find($id);
        $customer->delete();
    
        return redirect("/customers");
         
     }
}
