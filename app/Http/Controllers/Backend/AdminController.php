<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Medicine;
use App\Models\Purchase;
use App\Models\Setting;
use App\Models\Supplier;
use App\Models\Type;
use App\Models\Unit;
use App\Models\User;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class AdminController extends Controller
{
    public function master()
    {
        return view('backend.layout.home');
    }
    // dashboard
    public function dashboard()
    {
        return view('backend.layout.dashboard');
    }

    // contact= pharmacist
    public function contact_pharmacist()
    {
        $pharma=Contact::all();
        $supplier=Supplier::all();
        return view('backend.layout.contact', compact('pharma','supplier'));
    }
    public function pharma(Request $request)
    {
        $request->validate(
            [
            'name' => ['required'],
            'contact_id' => ['required'],
            'email' => ['required','email'],
            'password' => ['required'],
            ]
        );
        Contact::create(
            [
                'name'=>$request->name,
                'contact_id'=>$request->contact_id,
                'email'=>$request->email,
                'password'=> Hash::make($request ->password),
                'phone'=>$request->phone,
                'image'=>$request->image,
            ]
        );
        return redirect()-> back();
    }

    // contact = supplier
    public function contact_supplier()
    {
        $pharma=Contact::all();
        $supplier=Supplier::all();
        return view('backend.layout.contact', compact('supplier','pharma'));
    }
    public function supplier(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
            'name' => ['required'],
            'supplier_id' => ['required'],
            'email' => ['required','email'],
            ]
        );
        $filename = '';
        if ($request->hasFile('image'))
        {
            $file = $request ->file('image');
            if($file-> isValid())
            {
                $filename = date('Ymdhms'). '.' .$file->getClientOriginalExtension();
                $file -> storeAs('supplier',$filename);
            }
        }
        Supplier::create(
            [
                'name'=>$request->name,
                'supplier_id'=>$request->supplier_id,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'image'=>$filename,
            ]
        );
        return redirect()-> back();
    }

     // category
     public function category()
     {
         $categories=Category::all();
         $units=Unit::all();
         $types=Type::all();
         return view('backend.layout.category',compact('categories','units','types'));
     }
     public function categories(Request $request)
     {
         $request->validate(
             [
             'name' => ['required'],
             ]
         );
         Category::create(
             [
                 'name'=>$request->name,
                 'description'=>$request->description,
             ]
         );
         return redirect()-> back();
     }
     public function unit()
     {
        $units=Unit::all();
        $categories=Category::all();
        $types=Type::all();
        return view('backend.layout.category',compact('units','categories','types'));
     }
     public function units(Request $request)
     {
         $request->validate(
             [
             'name' => ['required'],
             ]
         );
         Unit::create(
             [
                 'name'=>$request->name,
                 'description'=>$request->description,
             ]
         );
         return redirect()-> back();
     }
     public function type()
     {
         $categories=Category::all();
         $units=Unit::all();
         $types=Type::all();
         return view('backend.layout.category',compact('types','categories','units'));
     }
     public function types(Request $request)
     {
         $request->validate(
             [
             'name' => ['required'],
             ]
         );
         Type::create(
             [
                 'name'=>$request->name,
                 'description'=>$request->description,
             ]
         );
         return redirect()-> back();
     }
     
    
    // medicine
    public function medicine()
    {
        $admedicine=Medicine::all();
        $categories=Category::all();
        $units=Unit::all();
        $types=Type::all();
        return view('backend.layout.medicine', compact('admedicine','categories','units','types'));
  
    }
    public function editmedicine($med_id)
    {
        $med = Medicine::find($med_id);
        $categories=Category::all();
        $units=Unit::all();
        $types=Type::all();
        // dd($med);
        return view('backend.layout.editmedicine',compact('med','categories','units','types'));
    }
    
    public function admedicine(Request $request)
        {
            // dd($request->all());
            $request->validate
            (
                [
                'name' => ['required'],
                'genericname' => ['required'],
                'category_id' => ['required'],
                'unit_id' => ['required'],
                'type_id' => ['required'],
                'price' => ['required'],
                ]
            );
            $filename = '';
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                if($file->isValid())
                {
                    $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
                    $file->storeAs('medicine',$filename);
                }
            }
           
            Medicine::create(
                [
                    'image'=>$filename,
                    'name'=>$request->name,
                    'genericname'=>$request->genericname,
                    'category_id'=>$request->category_id,
                    'unit_id'=>$request->unit_id,
                    'type_id'=>$request->type_id,
                    'price'=>$request->price,
                    'purchaseprice'=>$request->purchaseprice,
                    'description'=>$request->description,
                ]
            );
            return redirect()-> back();
        }

        public function updatemedicine(Request $request)
        {
            // dd($request->all());

            // $request->validate(
            //     [
            //     'name' => ['required'],
            //     'genericname' => ['required'],
            //     'category_id' => ['required'],
            //     'unit_id' => ['required'],
            //     'type_id' => ['required'],
            //     'price' => ['required'],
            //     ]
            // );
            $med = Medicine::find($request->medicine_id);
            $filename = $med->image;
            if($request->hasFile('image'))
            {
                $destination = 'uploads/medicine/'.$med->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                if($file->isValid())
                {
                    $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
                    $file->storeAs('medicine',$filename);
                }
            }
           
            Medicine::find($request->medicine_id)->update(
                [
                    'image'=>$filename,
                    'name'=>$request->name,
                    'genericname'=>$request->genericname,
                    'category_id'=>$request->category,
                    'unit_id'=>$request->unit,
                    'type_id'=>$request->type,
                    'price'=>$request->price,
                    'purchaseprice'=>$request->purchaseprice,
                    'description'=>$request->description,
                ]
            );
            return redirect()->route('medicine');
        }

        public function deletemedicine($med_id)
        {
            $med = Medicine::find($med_id);

            $destination = 'uploads/medicine/'.$med->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $med->delete();
            return redirect()-> back();
        }

    // account= expense
    public function account_expense()
    {
        $expense=Account::all();
        return view('backend.layout.account', compact('expense'));
    }
    public function expense(Request $request)
    {
        $request->validate(
            [
            'title' => ['required'],
            'amount' => ['required'],
            ]
        );
        Account::create(
            [
                'title'=>$request->title,
                'amount'=>$request->amount,
                'description'=>$request->description,
            ]
        );
        return redirect()-> back();
    }

    // account =income
    public function account_income()
    {
        $expense=Account::all();
        return view('backend.layout.account', compact('expense'));
    }

    // purchase
    public function purchase()
    {
        $adpurchase=Purchase::all();
        return view('backend.layout.purchase',compact('adpurchase' ));
    }

    // purchase= addpurchase
    public function addpurchase()
    {
        $adpurchase=Purchase::all();
        $admedicine=Medicine::all();
        $supplier=Supplier::all();
        return view('backend.layout.add_purchase', compact('adpurchase','admedicine','supplier'));
    }
    public function adpurchase(Request $request)
    {
        // dd($request->all());
        // $request->validate(
        //     [
        //     'date' => ['required'],
        //     'time' => ['required'],
        //     'supplier' => ['required'],
        //     'purchase_no' => ['required'],
        //     'madicine_name' => ['required'],
        //     'expire_date' => ['required'],
        //     'batch_id' => ['required'],
        //     'price' => ['required'],
        //     'total_amount' => ['required'],
        //     'paid_amount' => ['required'],
        //     ]
        // );
        Purchase::create(
            [
                'date'=>$request->date,
                'time'=>$request->time,
                'supplier'=>$request->supplier,
                'purchase_no'=>$request->purchase_no,
                'madicine_id'=>$request->medicine,
                'expire_date'=>$request->expire_date,
                'batch_id'=>$request->batch_id,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'vat'=>$request->vat,
                'discount_amount'=>$request->discount_amount,
                'total_amount'=>$request->total_amount,
                'paid_amount'=>$request->paid_amount,
                'description'=>$request->description,
            ]
        );

        Medicine::find($request->medicine)->update([
            'stock_status' => '1',
        ]);

        return redirect()-> back();
    }


    // stock
    public function stock_report()
    {
        $adpurchase=Purchase::all();
        return view('backend.layout.stock',compact('adpurchase'));
    }
    public function expiry_report()
    {
        $adpurchase=Purchase::all();
        return view('backend.layout.stock',compact('adpurchase'));
    }
    
    // pos
    public function pos()
    {
        $medicines = Medicine::where('stock_status','1')->get();
        return view('backend.layout.pos',compact('medicines'));
    }

    public function possale()
    {
        return view('backend.layout.possale');
    }

    public function invoice()
    {
        return view('backend.layout.invoice');
    }

    // settings
    public function setting()
    {
        $change=Setting::all();
        return view('backend.layout.setting', compact('change'));
    }
    public function change(Request $request)
    {
        $request->validate(
            [
            'sitename' => ['required'],
            'pharmacyname' => ['required'],
            'email' => ['required','email'],
            ]
        );
        Setting::create(
            [
                'sitename'=>$request->sitename,
                'pharmacyname'=>$request->pharmacyname,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'logo'=>$request->logo,
                'favicon'=>$request->favicon,
                'address'=>$request->address,
            ]
        );
        return redirect()-> back();
    }

   
    public function add_more()
    {
        return view('backend.layout.add_more');
    }

    // registration
    public function registration()
    {
        return view('backend.layout.registration');
    }

    public function register(Request $request)
    {
        User::create(
            [
                'name'=> $request -> name,
                'email'=> $request -> email,
                'password'=> Hash::make($request ->password),
            ]
        );
        return redirect('/')->with('message','Register Successfully');
    }

    // login
    public function login_post(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
          ]);
      
          if (Auth::attempt($credentials)) 
            {
                $request->session()->regenerate();
                if (Auth::user()->role_id == 1)
                {
                return redirect()->route('dashboard')->with('message', 'Admin Login Successful');
                }
                elseif (Auth::user()->role_id == 2) 
                {
                    return redirect()->route('dashboard')->with('message', 'Pharmacist Login Successful');
                }
                return redirect('/')->with('message','unauthoried');  
            } 

        return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // logout
    public function logout(Request $request)
    {
            
        Auth::logout();
    
        return redirect('/');
    }

       
}