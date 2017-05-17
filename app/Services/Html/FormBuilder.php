<?php
/**
 * Created by PhpStorm.
 * User: prasanna
 * Date: 5/17/17
 * Time: 11:19 AM
 */

namespace App\Services\Html;

class FormBuilder extends \Collective\Html\FormBuilder{
    public function submits($value=null,$options){
        return sprintf(
            '<div class="form-group %s">
                %s
            </div>',
            empty($options)? '':$options[0],
            parent::submit($value,['class'=>'btn btn-default'])
        );
    }

    public function control($type,$col,$name,$errors,$label=null,$value=null,$placeholder=''){
        $attributes = ['class'=>'form-control', 'placeholder'=>$placeholder];
        return sprintf(
            '<div class="form-group %s %s">
                    %s
                    %s
                    %s
            </div>',
            ($col==0) ? '' : 'col-lg-'.$col,
            $errors->has($name)? 'has-error' : '',
            $label ? $this->label($name,$label,['class'=>'control-label']) : '',
            call_user_func_array(['form',$type],($type=='password')? [$name,$attributes] : [$name, $value, $attributes]),
            $errors->first($name,'<small class="help-block">:message</small>')
        );
    }
}