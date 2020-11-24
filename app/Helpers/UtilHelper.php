<?php


namespace App\Helpers;


use Illuminate\Http\Request;

class UtilHelper
{
    /**
     * Add toast message to array data
     *
     * @param array $data
     * @param bool  $destroy
     */
    public static function addToastToData(array &$data, $destroy = false)
    {
        if ($data['success']) {
            $data['toast']['type'] = 'success';
            $data['toast']['title'] = __('toast.title.success');
            $data['toast']['message'] = __('toast.body.success');

            if ($destroy){
                $data['toast']['message'] = __('toast.body_delete.success');
            }
        } else {
            $data['toast']['type'] = 'error';
            $data['toast']['title'] = __('toast.title.error');
            $data['toast']['message'] = __('toast.body.error');

            if ($destroy){
                $data['toast']['message'] = __('toast.body_delete.error');
            }
        }
    }

    /**
     * @return string
     */
    public static function generateCode()
    {
        return md5(uniqid() . rand(0, 99999));
    }

    /**
     * @param $class
     * @param $request
     * @param null $id
     * @return mixed
     */
    public static function updateOrCreate($class, $request, $id = null){

        return $class::updateOrCreate((is_array($id))?$id:['id' => $id], ($request instanceof Request)?$request->all():$request);

    }
}
