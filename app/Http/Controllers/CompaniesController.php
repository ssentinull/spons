<?php

namespace App\Http\Controllers;

use App\User;
use App\Constant;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function changeStatus($companyId){
        $company = User::find($companyId)->company;

        if(!$company){
            return redirect('errorPage');
        }

        if($company->status == Constant::COMPANY_STATUS_AVAILABLE){
            $company->status = Constant::COMPANY_STATUS_UNAVAILABLE;
        } else {
            $company->status = Constant::COMPANY_STATUS_AVAILABLE;
        }

        $company->save();

        return redirect()->route('profilePage');
    }
}
