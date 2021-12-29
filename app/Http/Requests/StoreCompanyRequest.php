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
           // 'phone_number' => 'required|string',
            'summery' => 'nullable',
            'email' => 'required|email',
            'logo' => 'nullable',

        ];
    }

    public function passedValidation()
    {
        if ($this->category_image) {

            
            if(!Storage::disk('public')->exists('category')){
                Storage::disk('public')->makeDirectory('category');
            }

            $fileName = $this->uploadFile();
            //dd($fileName);
            $this->request->add([
                'images' =>  'category/' . time() . '_' . $fileName,
                
                
            ]);
        
        } else {
           
           
                $this->request->add([
                    'images' => null,
                   
                    
                ]);
           
        }
        
    }

    public function uploadFile() {
       
        $imageName = time().'-'.uniqid().'.'.$this->category_image->getClientOriginalExtension();
        $canvas = Image::canvas(400, 490);
        $image = Image::make($this->category_image->getRealPath())->resize(400, 490,
            function ($constraint) {
                $constraint->aspectRatio();
            });
           
        $canvas->insert($image, 'center');
        $canvas->save(storage_path("app/public/category/" . time() . '_' . $imageName));
    
        return $imageName;
    }
}
