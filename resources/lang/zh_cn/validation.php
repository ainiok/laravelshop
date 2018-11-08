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

    'accepted'             => '您必须接受 :attribute ',
    'active_url'           => ' :attribute 不是一个有效的网址',
    'after'                => ' :attribute 必须在 :date 之后',
    'after_or_equal'       => ' :attribute 必须大于等于 :date 的一个日期',
    'alpha'                => ' :attribute 只能由字母组成',
    'alpha_dash'           => ' :attribute 只能由字母、数字和斜杠组成',
    'alpha_num'            => ' :attribute 只能由字母和数字组成',
    'array'                => ' :attribute 必须是一个数组',
    'before'               => ' :attribute 必须在 :date 之前',
    'before_or_equal'      => ' :attribute 必须小于等于 :date 的一个日期',
    'between'              => [
        'numeric' => ' :attribute 必须介于 :min - :max 之间',
        'file'    => ' :attribute 必须介于 :min - :max KB 之间',
        'string'  => ' :attribute 必须介于 :min - :max 个字符之间',
        'array'   => ' :attribute 必须只有 :min - :max 个元素',
    ],
    'boolean'              => ':attribute 必须为布尔值',
    'confirmed'            => ':attribute 两次输入不一致',
    'date'                 => ':attribute 不是一个有效的日期',
    'date_format'          => ':attribute 的格式必须为 :format',
    'different'            => ':attribute 和 :other 必须不同',
    'digits'               => ':attribute 必须是 :digits 位的数字',
    'digits_between'       => ':attribute 必须是介于 :min 和 :max 位的数字',
    'dimensions'           => ':attribute 图片尺寸不正确',
    'distinct'             => ':attribute 已经存在',
    'email'                => ':attribute 不是一个合法的邮箱',
    'exists'               => ':attribute 不存在',
    'file'                 => ':attribute 必须是文件',
    'filled'               => ':attribute 不能为空',
    'gt'                   => [
        'numeric' => ':attribute 必须大于 :value',
        'file'    => ':attribute 必须大于 :value KB',
        'string'  => ':attribute 必须多于 :value 个字符',
        'array'   => ':attribute 必须多于 :value 个元素',
    ],
    'gte'                  => [
        'numeric' => ':attribute 必须大于或等于 :value',
        'file'    => ':attribute 必须大于或等于 :value KB',
        'string'  => ':attribute 必须多于或等于 :value 个字符',
        'array'   => ':attribute 必须多于或等于 :value 个元素',
    ],
    'image'                => ':attribute 必须是图片',
    'in'                   => '已选的属性 :attribute 非法',
    'in_array'             => ':attribute 没有在 :other 中',
    'integer'              => ':attribute 必须是整数',
    'ip'                   => ':attribute 必须是有效的 IP 地址',
    'ipv4'                 => ':attribute 必须是有效的 IPv4 地址',
    'ipv6'                 => ':attribute 必须是有效的 IPv6 地址',
    'json'                 => ':attribute 必须是正确的 JSON 格式',
    'max'                  => [
        'numeric' => ':attribute 不能大于 :max',
        'file'    => ':attribute 不能大于 :max KB',
        'string'  => ':attribute 不能大于 :max 个字符',
        'array'   => ':attribute 最多只有 :max 个单元',
    ],
    'mimes'                => ':attribute 必须是一个 :values 类型的文件',
    'mimetypes'            => ':attribute 必须是一个 :values 类型的文件',
    'min'                  => [
        'numeric' => ':attribute 必须大于等于 :min',
        'file'    => ':attribute 大小不能小于 :min KB',
        'string'  => ':attribute 至少为 :min 个字符',
        'array'   => ':attribute 至少有 :min 个单元',
    ],
    'not_in'               => '已选的属性 :attribute 非法',
    'not_regex'            => ':attribute 的格式错误',
    'numeric'              => ':attribute 必须是一个数字',
    'present'              => ':attribute 必须存在',
    'regex'                => ':attribute 格式不正确',
    'required'             => ':attribute 不能为空',
    'required_if'          => '当 :other 为 :value 时 :attribute 不能为空',
    'required_unless'      => '当 :other 不为 :value 时 :attribute 不能为空',
    'required_with'        => '当 :values 存在时 :attribute 不能为空',
    'required_with_all'    => '当 :values 存在时 :attribute 不能为空',
    'required_without'     => '当 :values 不存在时 :attribute 不能为空',
    'required_without_all' => '当 :values 都不存在时 :attribute 不能为空',
    'same'                 => ':attribute 和 :other 必须相同',
    'size'                 => [
        'numeric' => ':attribute 大小必须为 :size',
        'file'    => ':attribute 大小必须为 :size KB',
        'string'  => ':attribute 必须是 :size 个字符',
        'array'   => ':attribute 必须为 :size 个单元',
    ],
    'string'               => ':attribute 必须是一个字符串',
    'timezone'             => ':attribute 必须是一个合法的时区值',
    'unique'               => ':attribute 已经存在',
    'uploaded'             => ':attribute 上传失败',
    'url'                  => ':attribute 格式不正确',

    'captcha' => '验证码错误',
    'phone_code' => '手机验证码错误',
    'safe_input' => ':attribute 不能包含特殊字符\'"><;/\()=?#|&%!+`$*',
    'safe_input_es' => '仅支持数字字母.()[]{}（）【】｛｝@-_+|?空格和中文',
    'image_extension' => ':attribute 的文件扩展名必须是:extensions',
    'phone' => '手机号码格式非法',
    'telephone' => '固定电话如有区号和分机号，请用-分隔，如0755-88888888或0755-88888888-4321',
    'safe_password' => '密码必须包含数字和字母',
    'letter_num' => ':attribute 必须全部由字母和数字构成',
    'letter_dash' => ':attribute 必须全部由字母、数字、中划线或下划线字符构成',
    'chinese' => ':attribute 必须填写中文',
    'strength_pwd' => ':attribute 必须包含数字、大写字母、小写字母和特殊字符',
    'domain' => ':attribute 必须是一个合法的域名地址',
    'link' => ':attribute 必须是一个合法的URL地址',
    'domain_or_ip' => ':attribute 必须是一个合法的域名或者IP地址',
    'array_email' => ':attribute 必须全部是合法的邮箱地址',
    'dict_safe' => ':attribute 不能包含特殊字符\'"><;/\()=?#|&%!+`$*',
    'json_array_required' => ':attribute 不能为空',
    'pwd_diff_last_four_times' => '新密码不能与前四次修改的密码中任意一个相同',
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
        'id_card_photo' => [
            'max' => '证件照片 最大支持 2M',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => '用户名或邮箱',
        'captcha' => '验证码',
        'phone' => '手机号码',
        'password' => '密码',
    ],

];
