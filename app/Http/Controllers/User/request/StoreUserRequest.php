<?php

namespace App\Http\Controllers\User\request;

use App\Interfaces\DetailParent\DetailParentInterface;
use App\Interfaces\Helpers\Operator\OperatorInterface;
use App\Interfaces\Helpers\Validator\ValidatorInterface;
use App\Interfaces\Location\LocationInterface;
use App\Interfaces\Occupation\OccupationInterface;
use App\Interfaces\Referred\ReferredInterface;
use App\Interfaces\Sector\SectorInterface;
use App\Interfaces\User\UserInterface;
use App\Interfaces\UserDetail\UserDetailInterface;
use App\Request\FormRequestApi;

class StoreUserRequest extends FormRequestApi
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

    }//end authorize()
    private function rulesTextUser(){
        return [
            ValidatorInterface::REQUIRED,
            ValidatorInterface::CAMP_STRING,
            ValidatorInterface::MIN_CAMP. OperatorInterface::ONE
        ];
    }
    public function rulesSomeTimes(){
        return [
            ValidatorInterface::SOMETIMES,
            ValidatorInterface::CAMP_STRING,
            ValidatorInterface::MIN_CAMP. OperatorInterface::ONE
        ];
    }
    private function rulesTextEmail(){
        return [
            ValidatorInterface::REQUIRED,
            ValidatorInterface::UNIQUE_CAMP . UserInterface::TABLE_NAME.','. UserInterface::CAMP_EMAIL,
            UserInterface::CAMP_EMAIL
        ];
    }
    private function rulesDetailParents(){
        return [
            ValidatorInterface::NULLABLE
        ];
    }
    private function rulesCampsParents(string $detail_parent){
        return [
            $detail_parent.'.'.DetailParentInterface::NAME => $this->rulesSomeTimes(),
            $detail_parent.'.'.DetailParentInterface::BUSINESS => $this->rulesSomeTimes(),
            $detail_parent.'.'.DetailParentInterface::OCCUPATION_ID => [
                ValidatorInterface::SOMETIMES,
                ValidatorInterface::UNIQUE_CAMP . OccupationInterface::TABLE_NAME.','.'id',

            ],
            $detail_parent.'.'.DetailParentInterface::PHONE_NUMBER => $this->rulesSomeTimes()

        ];
    }
    private function rulesLocation(){
        return [
            ValidatorInterface::REQUIRED,
            ValidatorInterface::UNIQUE_CAMP.UserDetailInterface::TABLE_NAME.','.'id'

        ];
    }
    private function rulesToUnique($camp_unique,$unique_by,$type){
        return [
            ValidatorInterface::SOMETIMES,
            ValidatorInterface::UNIQUE_CAMP.$camp_unique.','.$unique_by,
            $type
        ];
    }


    public function rules(){
        $detail_parents_camps = array_merge($this->rulesCampsParents('detail_mother'),$this->rulesCampsParents('detail_father'));
        $general_rules =  [
            UserInterface::NAME => $this->rulesTextUser(),
            UserInterface::CAMP_EMAIL => $this->rulesTextEmail(),
            UserInterface::LAST_NAME => $this->rulesTextUser(),
            UserInterface::IDENTITY_CARD => $this->rulesTextUser(),
            UserInterface::NUMBER => $this->rulesTextUser(),
            'detail_mother'=> $this->rulesDetailParents(),
            'detail_father' => $this->rulesDetailParents(),
            'user_detail'=> [
                ValidatorInterface::NULLABLE
            ],
            'user_detail.born-date'=> [
                ValidatorInterface::SOMETIMES
                ,ValidatorInterface::DATE,
                ValidatorInterface::DATE_FORMAT_FORMAT_STANDAR
            ],
            'user_detail.location_id'=> $this->rulesToUnique(LocationInterface::TABLE_NAME,'id',ValidatorInterface::INTEGER),
            'user_detail.sector_id' => $this->rulesToUnique(SectorInterface::TABLE_NAME, 'id' ,ValidatorInterface::INTEGER),
            'referred' => [
                ValidatorInterface::NULLABLE
            ],
            'referred.name' => $this->rulesSomeTimes(),
            'referred.number' => $this->rulesSomeTimes(),
            'referred.email'=> $this->rulesToUnique(ReferredInterface::TABLE_NAME,ReferredInterface::EMAIL, ValidatorInterface::EMAIL_CAMP)
        ];

        return array_merge($detail_parents_camps,$general_rules);
    }

    public function messages()
    {
        return [
        ];
    }
}
