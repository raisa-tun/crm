<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enumeration\Role;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use SeedsStd\JpValidationRules\ZenkakuKatakana;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class StoreCompanyRequest extends FormRequest
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
            //'phone_number' => 'required|string',
            'summery' => 'nullable',
            'email' => 'required|email',
            'logo' => 'nullable|mimes:jpg,jpeg',
            'file' => 'nullable|mimes:pdf,docx,doc'

        ];
    }

    public function passedValidation()
    {
        if ($this->company_logo) {



            if (!Storage::disk('public')->exists('company')) {
                Storage::disk('public')->makeDirectory('company');
            }

            $fileName = $this->uploadFile();
            //dd($fileName);
            $this->request->add([
                'logo' =>  'company/' . time() . '_' . $fileName,


            ]);
            //dd($this->logo);
        } else {

            $this->request->add([
                'logo' => null,


            ]);
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

            $this->request->add([
                'file' => null,


            ]);
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

            $path = $file->storeAs(storage_path("app/public/file_attachment/" . time() . '_' . $fileName));

            return $fileName;
        }
        //dd("dfvgdf");

    }
    /* public function uploadFile() {
       //dd($this->company_file);
        $file = $this->company_file;
        $fileName = time().'-'.uniqid().'.'.$this->company_file->getClientOriginalExtension();
       
        $path = $file->move(storage_path("app/public/file_attachment/" . time() . '_' . $fileName));
    
        return $fileName;
    }*/
}
