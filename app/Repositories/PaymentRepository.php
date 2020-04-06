<?php
namespace App\Repositories;

use App\Admin\Payment;
use DotenvEditor;
/**
 * Class UserRepository
 * @package App\Repositories
*/
class PaymentRepository
{
    /**
     * @var array
     */
    // protected $fieldSearchable = [
    //     'name'
    // ];

    public function model()
    {
        return Payment::class;
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
