<?php
Yii::import('application.modules.user.components.YumWebUser');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Remi
 */
class User extends YumWebUser{
    
    public function relations()
    {
        $relations = parent::relations();
        $relations['traject'] = array(self::MANY_MANY, 'Traject',
            'assign(user_id, traject_id)');
        $relations['courseoffer'] = array(self::MANY_MANY, 'Courseoffer',
            'enroll(user_id, courseoffer_id');
        return $relations;
    }
}

?>
