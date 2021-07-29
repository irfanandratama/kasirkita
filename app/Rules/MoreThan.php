<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MoreThan implements Rule
{

    private $total = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $total)
    {
        $this->total = $total;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value < \request()->input($this->total);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This value must greater than Total.';
    }
}
