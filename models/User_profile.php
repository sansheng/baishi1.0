<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $uid
 * @property integer $tel_num
 * @property string $password
 * @property string $reg_at
 * @property integer $IMEI
 * @property string $channel
 *
 * @property Article[] $articles
 * @property Article[] $articles0
 * @property Blacklist $blacklist
 * @property DoyenInfo $doyenInfo
 * @property O2mAct[] $o2mActs
 * @property O2mactEntrytable[] $o2mactEntrytables
 * @property O2oAct[] $o2oActs
 * @property O2oactTimetable[] $o2oactTimetables
 * @property Order[] $orders
 * @property Order[] $orders0
 * @property RelDoyenAct $relDoyenAct
 * @property RelUserAct $relUserAct
 * @property RelUserTag[] $relUserTags
 * @property UserDetail $userDetail
 * @property ValueAdd $valueAdd
 */
class User_profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'tel_num', 'IMEI'], 'integer'],
            [['reg_at'], 'safe'],
            [['password', 'channel'], 'string', 'max' => 45],
            [['uid'], 'unique'],
            [['tel_num'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'tel_num' => 'Tel Num',
            'password' => 'Password',
            'reg_at' => 'Reg At',
            'IMEI' => 'Imei',
            'channel' => 'Channel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['last_uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles0()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlacklist()
    {
        return $this->hasOne(Blacklist::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoyenInfo()
    {
        return $this->hasOne(DoyenInfo::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getO2mActs()
    {
        return $this->hasMany(O2mAct::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getO2mactEntrytables()
    {
        return $this->hasMany(O2mactEntrytable::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getO2oActs()
    {
        return $this->hasMany(O2oAct::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getO2oactTimetables()
    {
        return $this->hasMany(O2oactTimetable::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['saler_id' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders0()
    {
        return $this->hasMany(Order::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelDoyenAct()
    {
        return $this->hasOne(RelDoyenAct::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelUserAct()
    {
        return $this->hasOne(RelUserAct::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelUserTags()
    {
        return $this->hasMany(RelUserTag::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDetail()
    {
        return $this->hasOne(UserDetail::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValueAdd()
    {
        return $this->hasOne(ValueAdd::className(), ['uid' => 'uid']);
    }
}
