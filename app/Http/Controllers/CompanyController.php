<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Users;
use Laravel\Socialite\One\User;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {      
            abort_unless(auth()->user()->role === 'admin', 404);
            return $next($request);
        });
    }

    public function index(){

        $companies   = Company::all();
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        
        $companies = Company::select('id','name')->get();
        return view('company.create', compact('companies'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [ 'required', 'string', 'max:255'],
            'email' => [ 'required', 'email', 'max:255'],
        ]);
        $company = new Company();
        $company->name = $request->name;

        $company->save();

        $company->users()->create([
            'title' => $company->name,
            'email' => $request->email,
            'role' => 'company',
            'company_id' => $company->id,
        ]);
       
        return redirect()->route('company.index');
    }

    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {

        $validatedData = $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
  
        ]);
        $company->name = $request->name;  
        $company->save();
        return redirect()->route('company.index');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
    }

}
