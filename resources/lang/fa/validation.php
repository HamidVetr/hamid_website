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

    'accepted'             => 'باید با :attribute موافقت شود.',
    'active_url'           => 'آدرس :attribute معتبر نمی باشد.',
    'after'                => 'مقدار :attribute باید تاریخی پس از :date باشد.',
    'after_or_equal'       => 'مقدار :attribute باید تاریخی پس از یا مساوی با :date باشد.',
    'alpha'                => 'مقدار :attribute باید تنها شامل حروف باشد.',
    'alpha_dash'           => 'مقدار :attribute می تواند تنها شامل حرف، عدد و خط تیره باشد.',
    'alpha_num'            => 'مقدار :attribute می تواند تنها شامل حرف و عدد باشد.',
    'array'                => 'مقدار :attribute باید آرایه باشد.',
    'before'               => 'مقدار :attribute باید تاریخی پیش از :date باشد.',
    'before_or_equal'      => 'مقدار :attribute باید تاریخی پیش از یا مساوی با :date باشد.',
    'between'              => [
        'numeric' => 'مقدار :attribute باید بین :min و :max باشد.',
        'file'    => 'حجم فایل :attribute باید بین :min و :max کیلوبایت باشد.',
        'string'  => 'مقدار :attribute باید بین :min و :max کاراکتر باشد.',
        'array'   => 'مقدار :attribute باید بین :min و :max آیتم داشته باشد.',
    ],
    'boolean'              => 'مقدار :attribute باید درست یا اشتباه باشد.',
    'confirmed'            => 'تاییدیه :attribute با مقدار اصلی مطابقت ندارد.',
    'date'                 => 'مقدار :attribute تاریخ متعبری نمی باشد.',
    'date_format'          => 'تاریخ :attribute با فرمت :format مطابقت ندارد.',
    'different'            => 'مقدار :attribute و :other باید متفاوت باشد.',
    'digits'               => 'مقدار :attribute باید :digits عدد باشد.',
    'digits_between'       => 'مقدار :attribute باید بین :min و :max عدد باشد.',
    'dimensions'           => 'ابعاد تصویر :attribute نامعتبر می باشند.',
    'distinct'             => 'مقدار :attribute دو مقدار مشابه دارد.',
    'email'                => 'مقدار :attribute باید یک ایمیل معتبر باشد.',
    'exists'               => 'مقدار :attribute انتخاب شده معتبر نمی باشد.',
    'file'                 => 'مورد انتخابی :attribute باید یک فایل باشد.',
    'filled'               => 'مقدار :attribute نمی تواند خالی باشد.',
    'image'                => 'فایل انتخابی برای :attribute باید یک تصویر باشد.',
    'in'                   => 'مقدار انتخاب شده برای :attribute نامعتبر می باشد.',
    'in_array'             => 'مقدار انتخاب شده :attribute در :other وجود ندارد.',
    'integer'              => 'مقدار :attribute باید از نوع صحیح باشد.',
    'ip'                   => 'مقدار :attribute باید یک IP معتبر باشد.',
    'ipv4'                 => 'مقدار :attribute باید یک IP ورژن 4 معتبر باشد.',
    'ipv6'                 => 'مقدار :attribute باید یک IP ورژن 6 معتبر باشد.',
    'json'                 => 'مقدار :attribute باید یک JSON معتبر باشد.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
