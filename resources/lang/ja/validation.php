<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attributeを承認してください。',
    'active_url' => ':attributeは正しいURLではありません。',
    'after' => ':attributeは:date以降の日付にしてください。',
    'after_or_equal' => ':attributeは:dateと同日もしくは:date以降の日付にしてください。',
    'alpha' => ':attributeは英字のみにしてください。',
    'alpha_dash' => ':attributeは英数字とハイフンのみにしてください。',
    'alpha_num' => ':attributeは英数字のみにしてください。',
    'array' => ':attributeは配列にしてください。',
    'before' => ':attributeは:date以前の日付にしてください。',
    'before_or_equal' => ':attributeは:dateと同日もしくは:date以前の日付にしてください。',
    'between' => [
        'numeric' => ':attributeは:min〜:maxまでにしてください。',
        'file'    => ':attributeは:min〜:max KBまでのファイルにしてください。',
        'string'  => ':attributeは:min〜:max文字にしてください。',
        'array'   => ':attributeは:min〜:max個までにしてください。',
    ],
    'boolean' => ':attributeはtrueかfalseにしてください。',
    'confirmed' => ':attributeは確認用項目と一致していません。',
    'date' => ':attributeは正しい日付ではありません。',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':attributeは":format"書式と一致していません。',
    'different' => ':attributeは:otherと違うものにしてください。',
    'digits' => ':attributeは:digits桁にしてください',
    'digits_between' => ':attributeは:min〜:max桁にしてください。',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':attributeを正しいメールアドレスにしてください。',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => '選択された:attributeは正しくありません。',
    'file' => 'The :attribute must be a file.',
    'filled' => ':attributeは必須です。',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ':attributeは画像にしてください。',
    'in' => '選択された:attributeは正しくありません。',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => ':attributeは整数にしてください。',
    'ip' => ':attributeを正しいIPアドレスにしてください。',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attributeは:max以下にしてください。',
        'file'    => ':attributeは:max KB以下のファイルにしてください。.',
        'string' => ':attributeは:max文字以内で入力してください。',
        'array' => ':attributeは:max個以下にしてください。',
    ],
    'mimes' => ':attributeは:valuesタイプのファイルにしてください。',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attributeは:min以上にしてください。',
        'file'    => ':attributeは:min KB以上のファイルにしてください。.',
        'string'  => ':attributeは:min文字以上にしてください。',
        'array'   => ':attributeは:min個以上にしてください。',
    ],
    'not_in' => '選択された:attributeは正しくありません。',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attributeは数字にしてください。',
    'present' => 'The :attribute field must be present.',
    'regex' => ':attributeの書式が正しくありません。',
    'required' => ':attributeに入力が必要です。',
    'required_if' => ':otherが:valueの時、:attributeは必須です。',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => ':valuesが存在する時、:attributeは必須です。',
    'required_with_all'    => ':valuesが存在する時、:attributeは必須です。',
    'required_without'     => ':valuesが存在しない時、:attributeは必須です。',
    'required_without_all' => ':valuesが存在しない時、:attributeは必須です。',
    'same'                 => ':attributeと:otherは一致していません。',
    'size' => [
        'numeric' => ':attributeは:sizeにしてください。',
        'file'    => ':attributeは:size KBにしてください。.',
        'string'  => ':attribute:size文字にしてください。',
        'array'   => ':attributeは:size個にしてください。',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => ':attributeは文字列にしてください。',
    'timezone' => ':attributeは正しいタイムゾーンを指定してください。',
    'unique' => ':attributeは既に存在します。',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => ':attributeを正しい書式にしてください。',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'title' => 'タイトル',
        'travel_destination' => '旅行先',
        'body' => '投稿文',
        'nickname' => 'ニックネーム',
        'favorite_travel_destination' => '好きな旅行先',
        'self_introduction' => '自己紹介',
        'email'=>'メールアドレス',
        'password'=>'パスワード',
    ],

];
