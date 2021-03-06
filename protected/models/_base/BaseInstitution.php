<?php

/**
 * This is the model base class for the table "{{institution}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Institution".
 *
 * Columns in table "{{institution}}" available as properties of the model,
 * followed by relations of table "{{institution}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $iname
 * @property string $acronym
 * @property string $pic
 * @property string $description
 *
 * @property InstitutionAlias[] $institutionAliases
 * @property BankAccount[] $bankAccounts
 * @property WorkRelation[] $workRelations
 * @property ActivityNonEu[] $activityNonEus
 * @property Clock[] $clocks
 * @property TimeRecord[] $timeRecords
 */
abstract class BaseInstitution extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{institution}}';
    }

    public static function representingColumn() {
        return 'iname';
    }

    public function rules() {
        return array(
            array('iname, pic', 'required'),
            array('iname', 'length', 'max'=>100),
            array('acronym', 'length', 'max'=>10),
            array('pic', 'length', 'max'=>9),
            array('description', 'length', 'max'=>600),
            array('acronym, description', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, iname, acronym, pic, description', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'institutionAliases' => array(self::HAS_MANY, 'InstitutionAlias', 'institutionid'),
            'bankAccounts' => array(self::HAS_MANY, 'BankAccount', 'institutionid'),
            'workRelations' => array(self::HAS_MANY, 'WorkRelation', 'institutionid'),
            'activityNonEus' => array(self::HAS_MANY, 'ActivityNonEu', 'institutionid'),
            'clocks' => array(self::HAS_MANY, 'Clock', 'institutionid'),
            'timeRecords' => array(self::HAS_MANY, 'TimeRecord', 'institutionid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'iname' => Yii::t('app', 'Iname'),
                'acronym' => Yii::t('app', 'Acronym'),
                'pic' => Yii::t('app', 'Pic'),
                'description' => Yii::t('app', 'Description'),
                'institutionAliases' => null,
                'bankAccounts' => null,
                'workRelations' => null,
                'activityNonEus' => null,
                'clocks' => null,
                'timeRecords' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('iname', $this->iname, true);
        $criteria->compare('acronym', $this->acronym, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}