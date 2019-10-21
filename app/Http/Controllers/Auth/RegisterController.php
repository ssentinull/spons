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
use Illuminate\Database\QueryException;
use GuzzleHttp\Client;

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
        list($users, $user) = $this->createStudentIndividualApi($request);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath);
    }

    public function registerStudentOrganization(Request $request)
    {
        list($users, $user) = $this->createStudentOrganizationApi($request);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath);
    }

    public function showCompanyRegistrationForm()
    {
        return view ('auth.registerCompany');
    }

    public function registerCompany(Request $request)
    {
        list($users, $user) = $this->createCompanyApi($request);

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

    protected function createStudentIndividualApi(Request $request)
    {
        try{
            $users = new User;
            $users->name =  $request->name;
            $users->email =  $request->email;
            $users->role =  $request->role;
            $users->password = Hash::make($request->password);
            $users->save();

            $fileName = $this->saveProfilePicture($request->picture);

            $user = StudentIndividual::create([
                'dob' => $request->dob,
                'city' => $request->city,
                'major' => $request->major,
                'faculty' => $request->faculty,
                'university' => $request->university,
                'picture' => $fileName,
                'user_id' => $users->id,
            ]);

            $returnObj = (object) [
                'code' => 200,
                'message' => 'success',
                'payload' => $user
            ];

            return json_encode($returnObj);
        }catch(QueryException $e){
            $returnObj = (object) [
                'code' => 400,
                'message' => $e->getMessage(),
                'payload' => []
            ];

            return json_encode($returnObj);
        }
    }

    protected function createStudentOrganizationApi(Request $request)
    {
        try{
            $users = new User;
            $users->name =  $request->name;
            $users->email =  $request->email;
            $users->role =  $request->role;
            $users->password = Hash::make($request->password);
            $users->save();

            $fileName = $this->saveProfilePicture($request->picture);

            $user =  StudentOrganization::create([
                'established_in' => $request->established_in,
                'address' => $request->address,
                'major' => $request->major,
                'university' => $request->university,
                'description' => $request->desc,
                'picture' => $fileName,
                'user_id' => $users->id,
            ]);

            $returnObj = (object) [
                'code' => 200,
                'message' => 'success',
                'payload' => $user
            ];

            return json_encode($returnObj);
        }catch(QueryException $e){
            $returnObj = (object) [
                'code' => 400,
                'message' => $e->getMessage(),
                'payload' => []
            ];

            return json_encode($returnObj);
        }
    }

    protected function createCompanyApi(Request $request)
    {
        try{
            $users = new User;
            $users->name =  $request->name;
            $users->email =  $request->email;
            $users->role =  $request->role;
            $users->password = Hash::make($request->password);
            $users->save();

            $fileName = $this->saveProfilePicture($request->picture);

            $user = Company::create([
                'established_in' => $request->established_in,
                'address' => $request->address,
                'description' => $request->description,
                'status' => Constant::COMPANY_STATUS_AVAILABLE,
                'picture' => $fileName,
                'user_id' => $users->id,
            ]);

            $returnObj = (object) [
                'code' => 200,
                'message' => 'success',
                'payload' => $user
            ];

            return json_encode($returnObj);
        }catch(QueryException $e){
            $returnObj = (object) [
                'code' => 400,
                'message' => $e->getMessage(),
                'payload' => []
            ];

            return json_encode($returnObj);
        }
    }
}
