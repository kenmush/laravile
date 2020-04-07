<?php
namespace App\Repositories;

use App\Admin\Setting;
use App\Models\PaymentHistoryLog;
use DotenvEditor;
/**
 * Class UserRepository
 * @package App\Repositories
*/
class SettingRepository
{
    /**
     * @var array
     */
    // protected $fieldSearchable = [
    //     'name'
    // ];

    public function model()
    {
        return Setting::class;
    }

    public function Payment()
    {
        return PaymentHistoryLog::class;
    }

    public function setEnvVariables($data){

        $env = DotenvEditor::load();
        foreach($data['value'] as $key => $i){
            $env_key = preg_replace('/[^A-Za-z0-9_\-]/', '', $key);
            $env->setKey($env_key, $i);
            $env->save();
        }


    }
}
