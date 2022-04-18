<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class ExtensionValidator extends Validator
{
    /**
     * validateHiragana ひらがなのバリデーション（ブランクを許容）
     *
     * @param string $value
     * @access public
     * @return bool
     */
    public static function validateHiragana($attribute, $value, $parameters) {
        return (bool) preg_match('/^[ぁ-ゞ 　〜ー−]+$/u', $value);
    }

    /**
     * validateKatakana カタカナのバリデーション（ブランクを許容）
     *
     * @param string $value
     * @access public
     * @return bool
     */
    public function validateKatakana($attribute, $value, $parameters) {
        return (bool) preg_match('/^[ァ-ヾ 　〜ー−]+$/u', $value);
    }


    /**
      * validateYmd YYYY-MM-DD の形式かをチェック
      *
      * @param string $value
      * @access public
      * @return void
      */
     public static function validateYmd($attribute, $value, $parameters) {
         return (bool) preg_match('/(^$|(19|20|21)[0-9]{2}-[0-1][0-9]-[0-3][0-9])/', $value);
     }

     /**
      * validateYmd YYYY-MM の形式かをチェック
      *
      * @param string $value
      * @access public
      * @return void
      */
     public static function validateYm($attribute, $value, $parameters) {
         return (bool) preg_match('/(^$|(19|20|21)[0-9]{2}-[0-1][0-9])/', $value);
     }

    /**
     * validateMaxLength
     * 最大文字長
     * @access public
     * @param  attribute
     * @param  value
     * @param  parameters
     * @return bool
     */
    public function validateMaxLength($attribute, $value, $parameters) {
        $this->requireParameterCount(1, $parameters, 'max_length');

        return mb_strlen($value) <= $parameters[0];
    }

    /**
     * _validation_valid_keitai_email
     *
     * 通常は携帯電話アドレスがあると FALSE を返す
     * $type が false のときは携帯電話アドレスのとき TRUE を返す
     *
     * @param string $val
     * @param bool   $type
     * @access public
     * @return void
     */
    public function validateKeitaiEmail($attribute, $value, $parameters) {
        $result = true;

        $domains = [
            'docomo.ne.jp',
            'mopera.net',
            'softbank.ne.jp',
            'vodafone.ne.jp',
            'disney.ne.jp',
            'i.softbank.jp',
            'ezweb.ne.jp',
            'biz.ezweb.ne.jp',
            'augps.ezweb.ne.jp',
            'ido.ne.jp',
            'emnet.ne.jp',
            'emobile.ne.jp',
            'emobile-s.ne.jp',
            'ymobile1.ne.jp',
            'ymobile.ne.jp',
            'pdx.ne.jp',
            'willcom.com',
            'wcm.ne.jp',
            'y-mobile.ne.jp',
        ];

        foreach ($domains as $d)
        {
            $res = preg_match('/.*@.*'.$d.'$/', $value);
            (bool) $res and $result = false;
        }

        return $result;
    }

    /**
     * validateValidBirthday
     * 登録可能な誕生日かどうか
     * @access public
     * @param  attribute
     * @param  value
     * @param  parameters
     * @return bool
     */
    public function validateValidBirthday($attribute, $value, $parameters) {
        $birthday = new Carbon($value);
        if ($birthday === false) {
            // 日付形式でなければチェックしない
            return true;
        }

        $target = Carbon::now()->setTime(0, 0, 0)->subYears(config('app_settings.registerable_age'));

        return $birthday <= $target;
    }

    /**
     * validateComplexPassword
     * パスワードの複雑性
     * @access public
     * @param  attribute
     * @param  value
     * @param  parameters
     * @return bool
     */
    public function validateComplexPassword($attribute, $value, $parameters) {
        $small  = preg_match('/[a-z]/', $value);
        $big    = preg_match('/[A-Z]/', $value);
        $number = preg_match('/[0-9]/', $value);

        return ($small and $big and $number);
    }

}
