<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
abstract class TrackStarActiveRecord extends CActiveRecord
{
    /**
     * prepares create_time, create_user_id, update_time, and update_user_id attributes before performing validation
     * 
     */
    protected function beforeValidate() {
        if($this->isNewRecord)
        {
            //set the created date, last update date and the usser doing  the creacting
            $this->create_time= $this->update_time= date('Y-m-d H:i:s',time());// new CDbException('NOW()');
            $this->create_user_id=  $this->update_user_id=  Yii::app()->user->id;
                       
        }
       else
       {
           // not a  new record, so just set the last update time and the last update user
           $this->update_time= new CDbExpression ('NOW()');
           $this->update_user_id= Yii::app()->user->id;
       }
       return parent::beforeValidate();
           
      
           
    }
    
            
}
?>
