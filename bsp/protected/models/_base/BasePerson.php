<?php

/**
 * This is the model base class for the table "{{person}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Person".
 *
 * Columns in table "{{person}}" available as properties of the model,
 * followed by relations of table "{{person}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 *
 * @property Users $users
 */
abstract class BasePerson extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{person}}';
    }

    public static function representingColumn() {
        return 'firstname';
    }

    public function rules() {
        return array(
            array('firstname, lastname, email', 'required'),
            array('firstname, lastname, email', 'length', 'max'=>100),
            array('id, firstname, lastname, email', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'users' => array(self::HAS_ONE, 'Users', 'personid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'firstname' => Yii::t('app', 'Firstname'),
                'lastname' => Yii::t('app', 'Lastname'),
                'email' => Yii::t('app', 'Email'),
                'users' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('email', $this->email, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}