<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ContractorServieceType;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Contractor;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\ContractorType;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContractorRegisterController extends Controller
{
    use MediaUploadingTrait;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // override functions 

    public function showRegistrationForm()
    {
        $contractor_types = ContractorType::pluck('name', 'id');
        $services = ContractorServieceType::pluck('name', 'id');

        return view('auth.contractor-register', compact('contractor_types', 'services'));
    }
    public function storeCKEditorImages(Request $request)
    {
        $model         = new Contractor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Get all available Contractor type IDs from the ContractorType model
        $contractor_types = ContractorType::pluck('id')->toArray();
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'position' => 'required|max:50',
            'website' => 'required|string|max:150',
            'contractor_type_id' => 'required|in:' . implode(',', $contractor_types),
            'services.*' => ['integer'],
            'services' => ['required', 'array'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // create Organization user 
        $contractor_user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'position' => $data['position'],
            'user_type' => 'contractor',
            'mobile_number' => $data['mobile_number'],
        ]);

        // create Contractor  
        $contractor = Contractor::create([
            'position' => $data['position'],
            'website' => $data['website'],
            'user_id' => $contractor_user->id,
            'contractor_type_id' => $data['contractor_type_id'],
        ]);

        $contractor->services()->sync($data['services']);

        if (request()->input('commercial_record', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename(request()->input('commercial_record'))))->toMediaCollection('commercial_record');
        }

        if (request()->input('safety_certificate', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename(request()->input('safety_certificate'))))->toMediaCollection('safety_certificate');
        }

        if (request()->input('tax', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename(request()->input('tax'))))->toMediaCollection('tax');
        }

        if (request()->input('income', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename(request()->input('income'))))->toMediaCollection('income');
        }

        if (request()->input('social_insurance', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename(request()->input('social_insurance'))))->toMediaCollection('social_insurance');
        }

        if (request()->input('human_resources', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename(request()->input('human_resources'))))->toMediaCollection('human_resources');
        }

        if (request()->input('bank_certificate', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename(request()->input('bank_certificate'))))->toMediaCollection('bank_certificate');
        }

        if (request()->input('commitment_letter', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename(request()->input('commitment_letter'))))->toMediaCollection('commitment_letter');
        }

        if ($media = request()->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contractor->id]);
        }


        return $contractor_user;
    }
}
