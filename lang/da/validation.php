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

    'accepted' => ':Attribute skal accepteres.',
    'accepted_if' => ':Attribute skal accepteres, når :other er :value.',
    'active_url' => ':Attribute er ikke en gyldig webadresse (URL).',
    'after' => ':Attribute skal være en dato efter :date.',
    'after_or_equal' => ':Attribute skal være en dato efter eller lig med :date.',
    'alpha' => ':Attribute må kun indeholde bogstaver.',
    'alpha_dash' => ':Attribute må kun indeholde bogstaver, tal, bindestreger og underscores.',
    'alpha_num' => ':Attribute må kun indeholde bogstaver og tal.',
    'array' => ':Attribute skal være en matrix.',
    'before' => ':Attribute skal være en dato før :date.',
    'before_or_equal' => ':Attribute skal være en dato før eller lig med :date.',
    'between' => [
        'array' => ':Attribute skal have mellem :min og :max elementer.',
        'file' => ':Attribute skal være mellem :min og :max kilobytes.',
        'numeric' => ':Attribute skal være mellem :min og :max.',
        'string' => ':Attribute skal være mellem :min og :max tegn.',
    ],
    'boolean' => ':Attribute feltet skal være sandt eller falsk.',
    'confirmed' => ':Attribute bekræftelsen stemmer ikke overens.',
    'current_password' => 'Adgangskoden er forkert.',
    'date' => ':Attribute er ikke en gyldig dato.',
    'date_equals' => ':Attribute skal være en dato lig med :date.',
    'date_format' => ':Attribute matcher ikke formatet :format.',
    'declined' => ':Attribute skal afvises.',
    'declined_if' => ':Attribute skal afvises, når :other er :value.',
    'different' => ':Attribute og :other skal være forskellige.',
    'digits' => ':Attribute skal være :digits cifre.',
    'digits_between' => ':Attribute skal være mellem :min og :max cifre.',
    'dimensions' => ':Attribute har ugyldige billeddimensioner.',
    'distinct' => ':Attribute feltet har en duplikatværdi.',
    'email' => ':Attribute skal være en gyldig e-mail-adresse.',
    'ends_with' => ':Attribute skal slutte med en af følgende: :values.',
    'enum' => 'Den valgte :attribute er ugyldig.',
    'exists' => 'Den valgte :attribute er ugyldig.',
    'file' => ':Attribute skal være en fil.',
    'filled' => ':Attribute feltet skal have en værdi.',
    'gt' => [
        'array' => ':Attribute skal have mere end :value elementer.',
        'file' => ':Attribute skal være større end :value kilobytes.',
        'numeric' => ':Attribute skal være større end :value.',
        'string' => ':Attribute skal være længere end :value tegn.',
    ],
    'gte' => [
        'array' => ':Attribute skal have :value elementer eller mere.',
        'file' => ':Attribute skal være større end eller lig med :value kilobytes.',
        'numeric' => ':Attribute skal være større end eller lig med :value.',
        'string' => ':Attribute skal være længere end eller lig med :value tegn.',
    ],
    'image' => ':Attribute skal være et billede.',
    'in' => 'Den valgte :attribute er ugyldig.',
    'in_array' => ':Attribute feltet findes ikke i :other.',
    'integer' => ':Attribute skal være et heltal.',
    'ip' => ':Attribute skal være en gyldig IP-adresse.',
    'ipv4' => ':Attribute skal være en gyldig IPv4-adresse.',
    'ipv6' => ':Attribute skal være en gyldig IPv6-adresse.',
    'json' => ':Attribute skal være en gyldig JSON-streng.',
    'lt' => [
        'array' => ':Attribute skal have færre end :value elementer.',
        'file' => ':Attribute skal være mindre end :value kilobytes.',
        'numeric' => ':Attribute skal være mindre end :value.',
        'string' => ':Attribute skal være kortere end :value tegn.',
    ],
    'lte' => [
        'array' => ':Attribute må ikke have mere end :value elementer.',
        'file' => ':Attribute skal være mindre end eller lig med :value kilobytes.',
        'numeric' => ':Attribute skal være mindre end eller lig med :value.',
        'string' => ':Attribute skal være kortere end eller lig med :value tegn.',
    ],
    'mac_address' => ':Attribute skal være en gyldig MAC-adresse.',
    'max' => [
        'array' => ':Attribute må ikke have mere end :max elementer.',
        'file' => ':Attribute må ikke være større end :max kilobytes.',
        'numeric' => ':Attribute må ikke være større end :max.',
        'string' => ':Attribute må ikke være større end :max tegn.',
    ],
    'mimes' => ':Attribute skal være en fil af typen: :values.',
    'mimetypes' => ':Attribute skal være en fil af typen: :values.',
    'min' => [
        'array' => ':Attribute skal have mindst :min elementer.',
        'file' => ':Attribute skal være mindst :min kilobytes.',
        'numeric' => ':Attribute skal være mindst :min.',
        'string' => ':Attribute skal være mindst :min tegn.',
    ],
    'multiple_of' => ':Attribute skal være et multiplum af :value.',
    'not_in' => 'Den valgte :attribute er ugyldig.',
    'not_regex' => ':Attribute formatet er ugyldigt.',
    'numeric' => ':Attribute skal være et tal.',
    'present' => ':Attribute feltet skal være til stede.',
    'prohibited' => ':Attribute feltet er forbudt.',
    'prohibited_if' => ':Attribute feltet er forbudt, når :other er :value.',
    'prohibited_unless' => ':Attribute feltet er forbudt, medmindre :other er i :values.',
    'prohibits' => ':Attribute feltet forbyder :other fra at være til stede.',
    'regex' => ':Attribute formatet er ugyldigt.',
    'required' => ':Attribute feltet er påkrævet.',
    'required_array_keys' => ':Attribute feltet skal indeholde poster for: :values.',
    'required_if' => ':Attribute feltet er påkrævet, når :other er :value.',
    'required_unless' => ':Attribute feltet er påkrævet, medmindre :other er i :values.',
    'required_with' => ':Attribute feltet er påkrævet, når :values er til stede.',
    'required_with_all' => ':Attribute feltet er påkrævet, når :values er til stede.',
    'required_without' => ':Attribute feltet er påkrævet, når :values ikke er til stede.',
    'required_without_all' => ':Attribute feltet er påkrævet, når ingen af :values er til stede.',
    'same' => ':Attribute og :other skal matche.',
    'size' => [
        'array' => ':Attribute skal indeholde :size elementer.',
        'file' => ':Attribute skal være :size kilobytes.',
        'numeric' => ':Attribute skal være :size.',
        'string' => ':Attribute skal være :size tegn.',
    ],
    'starts_with' => ':Attribute skal starte med en af følgende: :values.',
    'string' => ':Attribute skal være en streng.',
    'timezone' => ':Attribute skal være en gyldig tidszone.',
    'unique' => ':Attribute er allerede taget.',
    'uploaded' => ':Attribute kunne ikke uploades.',
    'url' => ':Attribute skal være en gyldig webadresse (URL).',
    'uuid' => ':Attribute skal være en gyldig UUID.',

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

    'attributes' => [],

];