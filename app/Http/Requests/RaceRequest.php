<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RaceRequest extends FormRequest
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
            'name'                  => 'required',
            'description'           => 'required',
            'location'              => 'required',
            'img'                   => 'required|image|mimes:jpeg,png,jpg',
            'date'                  => 'required',

            //Category 1
            'name_category_0'       => 'required',
            'kms_0'                 => 'required',
            'elevation_gain_0'      => 'required',
            'location_start_0'      => 'required',
            'location_finish_0'     => 'required',
            'start_time_0'          => 'required',
            'price_0'               => 'required',
            'num_aid_station_0'     => 'required',
            'num_participants_0'    => 'required',
            'elevation_img_0'       => 'image|mimes:jpeg,png,jpg',
            // 'gpx_0'                 => 'file|mimes:jpg,csv,gpx',
        ];
    }
}
