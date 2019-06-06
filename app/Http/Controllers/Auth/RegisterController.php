<?php

namespace App\Http\Controllers\Auth;

use Auth;

use App\Company;
use App\Constant;
use App\StudentIndividual;
use App\StudentOrganization;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class Registercontroller extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    protected $redirectPath = 'login';

    public function showStudentRegistrationForm()
    {
        return view ('auth.registerStudent');
    }

    public function registerStudentIndividual(Request $request)
    {
        $this->validator($request->all())->validate();
        $users = new User;
        $users->name =  $request->name;
        $users->email =  $request->email;
        $users->role =  $request->role;
        $users->password = Hash::make($request->password);
        $users->save();

        event(new Registered($user = $this->createStudentIndividual($request->all(), $users->id)));
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath);
    }

    public function registerStudentOrganization(Request $request)
    {
        $this->validator($request->all())->validate();
        $users = new User;
        $users->name =  $request->name;
        $users->email =  $request->email;
        $users->role =  $request->role;
        $users->password = Hash::make($request->password);
        $users->save();

        event(new Registered($user = $this->createStudentOrganization($request->all(), $users->id)));
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath);
    }

    public function showCompanyRegistrationForm()
    {
        return view ('auth.registerCompany');
    }

    public function registerCompany(Request $request)
    {
        $this->validator($request->all())->validate();
        $users = new User;
        $users->name =  $request->name;
        $users->email =  $request->email;
        $users->role =  $request->role;
        $users->password = Hash::make($request->password);
        $users->save();

        event(new Registered($user = $this->createCompany($request->all(), $users->id)));
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function createStudentIndividual(array $data, $id)
    {
        $hash = substr(sha1(time()), 0, 8);
        $fileExtension = $data['picture']->guessExtension();
        $fileName = $hash.'.'.$fileExtension;

        $data['picture']->storeAs('public/pictures', $fileName);

        return StudentIndividual::create([
            'dob' => $data['dob'],
            'city' => $data['city'],
            'major' => $data['major'],
            'faculty' => $data['faculty'],
            'university' => $data['university'],
            'picture' => $fileName,
            'user_id' => $id,
        ]);
    }

    protected function createStudentOrganization(array $data, $id)
    {
        return StudentOrganization::create([
            'established_in' => $data['dob'],
            'address' => $data['Address'],
            'description' => $data['desc'],
            'major' => $data['major'],
            'university' => $data['university'],
            'user_id' => $id,
        ]);
    }

    protected function createCompany(array $data, $id)
    {
        return Company::create([
            'established_in' => $data['established_in'],
            'address' => $data['address'],
            'description' => $data['description'],
            'status' => Constant::COMPANY_STATUS_AVAILABLE,
            'user_id' => $id,
        ]);
    }
}
