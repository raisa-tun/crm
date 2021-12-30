<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enumeration\Role;
use App\Models\Company;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use SeedsStd\JpValidationRules\ZenkakuKatakana;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'required|string',
            'address' => 'required|string',
           // 'phone_number' => 'nullable|string',
            'summery' => 'nullable|string',
            'email' => 'required|email',
            'logo' => 'nullable|mimes:jpg,jpeg',
            'file' => 'nullable|mimes:pdf,docx,doc'
        ];
    }
    public function passedValidation()
    {

        $request = $this->request->all();
        $current_logo = Company::where('company_name', $request['company_name'])->first();

        if ($this->company_logo) {

            
            if(!Storage::disk('public')->exists('company')){
                Storage::disk('public')->makeDirectory('company');
            }

            if (File::exists('storage/' . $current_logo->logo)) {
                //dd($current_image->images);
                File::delete('storage/' . $current_logo->logo);
            }
            $fileName = $this->uploadFile();
            //dd($fileName);
            $this->request->add([
                'logo' =>  'company/' . time() . '_' . $fileName,
                
                
            ]);
        //dd($this->logo);
        } 
        else {
           
            $data = $this->request->all();
            //dd($data);
            if (!empty($data['old_logo'])) {
                $this->request->add([
                    'logo' => $data['old_logo'],

                ]);
            } else {
                $this->request->add([
                    'logo' => null,

                ]);
            }
           
        }
        if ($this->company_file) {



            if (!Storage::disk('public')->exists('file_attachment')) {
                Storage::disk('public')->makeDirectory('file_attachment');
            }
            $fileName = $this->uploadFile();
            //dd($fileName);
            $this->request->add([
                'file' =>  'file_attachment/' . time() . '_' . $fileName,


            ]);
        } else {

            $data = $this->request->all();
            //dd($data);
            if (!empty($data['old_file'])) {
                $this->request->add([
                    'file' => $data['old_file'],

                ]);
            } else {
                $this->request->add([
                    'file' => null,

                ]);
            }
        }
        
    }

    public function uploadFile()
    {

        if ($this->company_logo) {
            //echo('logo');
            $imageName = time() . '-' . uniqid() . '.' . $this->company_logo->getClientOriginalExtension();
            $canvas = Image::canvas(400, 490);
            $image = Image::make($this->company_logo->getRealPath())->resize(
                400,
                490,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $canvas->insert($image, 'center');
            $canvas->save(storage_path("app/public/company/" . time() . '_' . $imageName));

            return $imageName;
        }
        if ($this->company_file) {
            // echo('file');
            $file = $this->company_file;
            $fileName = time() . '-' . uniqid() . '.' . $this->company_file->getClientOriginalExtension();

            $path = $file->move(storage_path("app/public/file_attachment/" . time() . '_' . $fileName));

            return $fileName;
        }
        //dd("dfvgdf");

    }
}
