<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MembershipNo;
use Illuminate\Http\Request;

class UpdateMember extends FormRequest
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
    public function rules(Request $request)
    {
        return [
          'membership_no'=>[
            'required',
            'unique:members,membership_no,'. $request->segment(2),
            new MembershipNo,
            //'regex:/^([A-Z]{3})([0-9]{7})$/'
          ],
          'nric'=>[
            'required',
            'regex:/^([0-9]{2})([0-1]{1})([0-9]{1})([0-3]{1})([0-9]{1})([0-9]{6})$/'
          ],
          'name'=> 'required|max:100',
          'address'=>'required|max:500',
          'postcode'=>[
            'required',
            'regex:/^([0-9]{5})$/'
          ],
          'city'=>'required|max:50',
          'phone'=>[
            'required',
            'regex:/^([0-9]{2,3})\-([0-9]{6,8})$/',
          ],
          'division_id'=>'required',
            //
        ];
    }
}
