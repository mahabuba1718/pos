<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Purchase;
use App\Models\Setting;
use App\Models\Subpurchase;
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

    // search
    // public function searchmed(Request $request)
    // {
    //     if($request->search)
    //     {
    //         $searchmed = Medicine :: where('name', 'LIKE', '%'. $request->search . '%')->latest()->paginate(15);
    //         return view('backend.layout.dashboard');
    //     }
    // }


    // contact= pharmacist
    public function contact_pharmacist()
    {
        $pharma=User::where('role_id','2')->get();
        $supplier=Supplier::all();
        return view('backend.layout.contact', compact('pharma','supplier'));
    }
    public function deltpharm($pharm_id)
    {
        $pharme = User::find($pharm_id);
        return response([
           'pharme' => $pharme,
        ]);
    }
    public function editpharma($pharm_id)
    {
        $pharm = User::find($pharm_id);
        // dd($pharm);
        return view('backend.layout.editpharma', compact('pharm'));
    }
    public function pharma(Request $request)
    {
        // dd($request->all());
        $request->validate
        (
            [
            'name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required'],
            ]
        );
        $filename = '';
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            if($file ->isValid())
            {
                $filename = date('Ymdhms'). '.'.$file->getClientOriginalExtension();
                $file -> storeAs('pharmacist',$filename);
            }
        }
        User::create(
            [
                'name'=>$request->name,
                'contact_id'=>$request->contact_id,
                'email'=>$request->email,
                'password'=> Hash::make($request ->password),
                'phone'=>$request->phone,
                'image'=>$filename,
            ]
        );
        return redirect()-> back();
    }

    public function updatepharm(Request $request)
    {
        // dd($request->all());
        // $request->validate(
        //     [
        //     'name' => ['required'],
        //     'email' => ['required','email'],
        //     'password' => ['required'],  
        //     ]
        // );
        $pharm = User::find($request->id);
        $filename = $pharm -> image;
        if ($request->hasFile('image'))
        {
            $destination = 'uploads/pharmacist/'.$pharm->image;
            if(File :: exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            if($file->isValid())
            {
                $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file-> storeAs('pharmacist',$filename);
            }
        }
        User::find($request->id)->update(
            [
                'name'=>$request->name,
                'contact_id'=>$request->contact_id,
                'email'=>$request->email,
                'password'=> Hash::make($request ->password),
                'phone'=>$request->phone,
                'image'=>$filename,
            ]
        );
        return redirect()->route('contact_pharmacist');
    }
    public function deletepharma($pharm_id)
    {
        $pharm = User::find($pharm_id);
        $destination = 'uploads/pharmacist/'.$pharm->image;
        if(File :: exists($destination))
        {
            File :: delete($destination);
        }
        $pharm ->delete();
        return redirect()-> back();
    }


    // contact = supplier
    public function contact_supplier()
    {
        $pharma=User::all();
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
    public function deltsupe($sup_id)
    {
        $supe = User::find($sup_id);
        return response([
           'supe' => $supe,
        ]);
    }
    public function editsup($sup_id)
    {
        $sup = Supplier::find($sup_id);
        // dd($pharm);
        return view('backend.layout.editsup', compact('sup'));
    }

    public function updatesup(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
            'name' => ['required'],
            'email' => ['required','email'],
            ]
        );
        $sup = Supplier::find($request->id);
        $filename = $sup -> image;
        if ($request->hasFile('image'))
        {
            $destination = 'uploads/supplier/'.$sup->image;
            if(File :: exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            if($file->isValid())
            {
                $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file-> storeAs('supplier',$filename);
            }
        }
        Supplier::find($request->id)->update(
            [
                'name'=>$request->name,
                'supplier_id'=>$request->supplier_id,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'image'=>$filename,
            ]
        );
        return redirect()-> route('contact_supplier');
    }
    public function deletesup($sup_id)
    {
        $sup = Supplier::find($sup_id);
        $destination = 'uploads/supplier/'.$sup->image;
        if(File :: exists($destination))
        {
            File :: delete($destination);
        }
        $sup ->delete();
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
     public function editcat($cat_id)
     {
         $cat = Category::find($cat_id);
         return response([
            'cat' => $cat,
         ]);
     }
 
     public function updatecat(Request $request)
     {
        //  dd($request->all());
         Category::find($request->cat_id)->update(
             [
                 'name'=>$request->name,
                 'description'=>$request->description,
             ]
         );
         return redirect()-> route('category');
     }
     public function deletecat(Request $request)
     {
        // dd($request->all());
        Category::find($request->DelCatId)->delete();
         return redirect()-> back();
     }


    //  unit
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
     public function editunit($unit_id)
     {
         $unit = Unit::find($unit_id);
         return response([
            'unit' => $unit,
         ]);
     }
 
     public function updateunit(Request $request)
     {
        //  dd($request->all());
         Unit::find($request->unit_id)->update(
             [
                 'name'=>$request->name,
                 'description'=>$request->description,
             ]
         );
         return redirect()-> route('unit');
     }
     public function deleteunit(Request $request)
     {
        // dd($request->all());
        Unit::find($request->DelUnitId)->delete();
         return redirect()-> back();
     }


    //  type
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
             'type' => ['required'],
             ]
         );
         Type::create(
             [
                 'name'=>$request->type,
                 'description'=>$request->description,
             ]
         );
         return redirect()-> back();
     }
     public function edittype($type_id)
     {
         $type = Type::find($type_id);
         return response([
            'type' => $type,
         ]);
     }
 
     public function updatetype(Request $request)
     {
        //  dd($request->all());
         Type::find($request->type_id)->update(
             [
                 'name'=>$request->name,
                 'description'=>$request->description,
             ]
         );
         return redirect()-> route('type');
     }
     public function deletetype(Request $request)
     {
        // dd($request->all());
        Type::find($request->DelTypeId)->delete();
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
    
    public function deletemed($med_id)
     {
         $med = Medicine::find($med_id);
         return response([
            'med' => $med,
         ]);
     }
    public function viewmed($med_id)
     {
         $med = Medicine::find($med_id);
         return response([
            'med' => $med,
         ]);
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
        $adpurchase=Purchase::all();
        return view('backend.layout.account', compact('adpurchase'));
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
            ]
        );
        return redirect()-> back();
    }

    // account =income
    public function account_income()
    {
        $adpurchase=Purchase::all();
        return view('backend.layout.account', compact('adpurchase'));
    }

    // purchase
    public function purchase()
    {
        $adpurchase=Subpurchase::Join('purchases','purchases.id','=','subpurchases.purchase_id')->Join('medicines','medicines.id','=','subpurchases.madicine_id')->get(['subpurchases.*','purchases.*','medicines.name']);
        // dd($adpurchase);
        return view('backend.layout.purchase',compact('adpurchase' ));
    }

    public function purchase_find_med($id){
        $find_med = Medicine::find($id);
        return response([
            'status' => '200',
            'med' => $find_med,
        ]);
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
        $count = count($request->medicine);       
        // dd($request->all(),$count);
        $purchase = Purchase::create(
            [
                'date'=>$request->date,
                'time'=>$request->time,
                'supplier'=>$request->supplier,
                'purchase_no'=>$request->purchase_no,
                'vat'=>$request->vat,
                'discount_amount'=>$request->discount_amount,
                'total_amount'=>$request->total_amount,
                'paid_amount'=>$request->paid_amount,
                'description'=>$request->description,
            ]
        );

        for ($i=0; $i<$count; $i++)
        {
            Subpurchase::create(
                [
                'purchase_id' => $purchase->id,
                'madicine_id'=>$request->medicine[$i],
                'expire_date'=>$request->expire_date[$i],
                'batch_id'=>$request->batch_id[$i],
                'price'=>$request->price[$i],
                'quantity'=>$request->quantity[$i],
                ]
            );
        }


        for($i=0; $i<$count; $i++){
            Medicine::find($request->medicine[$i])->update([
                'stock_status' => '1',
            ]);
        }

        return redirect()-> back();
    }


    // stock
    public function stock_report()
    {
        $adpurchase=Subpurchase::Join('purchases','purchases.id','=','subpurchases.purchase_id')->Join('medicines','medicines.id','=','subpurchases.madicine_id')->get(['subpurchases.*','purchases.*','medicines.name']);
        return view('backend.layout.stock',compact('adpurchase'));
    }
    public function expiry_report()
    {
        $adpurchase=Subpurchase::Join('purchases','purchases.id','=','subpurchases.purchase_id')->Join('medicines','medicines.id','=','subpurchases.madicine_id')->get(['subpurchases.*','purchases.*','medicines.name']);
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
        return redirect('/')->with('success','Register Successfully');
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
                if (Auth::user()->role_id == 2) 
                {
                    return redirect()->route('dashboard')->with('message', 'Pharmacist Login Successful');
                }
            } 
            return redirect('/')->with('fail','unauthoried');  


        // return back()->withErrors([
        // 'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }

    // logout
    public function logout(Request $request)
    {
            
        Auth::logout();
    
        return redirect('/');
    }

       
}