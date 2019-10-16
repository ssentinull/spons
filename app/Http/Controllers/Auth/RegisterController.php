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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'picture' => ['required', 'image', 'max:512']
        ]);
    }

    protected function saveProfilePicture($picture)
    {
        $hash = substr(sha1(time()), 0, 8);
        $fileExtension = $picture->guessExtension();
        $fileName = $hash.'.'.$fileExtension;

        $picture->storeAs('public/pictures', $fileName);

        return $fileName;
    }

    protected function createStudentIndividual(array $data, $id)
    {
        $fileName = $this->saveProfilePicture($data['picture']);

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
        $fileName = $this->saveProfilePicture($data['picture']);

        return StudentOrganization::create([
            'established_in' => $data['established_in'],
            'address' => $data['address'],
            'major' => $data['major'],
            'university' => $data['university'],
            'description' => $data['desc'],
            'picture' => $fileName,
            'user_id' => $id,
        ]);
    }

    protected function createCompany(array $data, $id)
    {
        $fileName = $this->saveProfilePicture($data['picture']);

        return Company::create([
            'established_in' => $data['established_in'],
            'address' => $data['address'],
            'description' => $data['description'],
            'status' => Constant::COMPANY_STATUS_AVAILABLE,
            'picture' => $fileName,
            'user_id' => $id,
        ]);
    }
}
