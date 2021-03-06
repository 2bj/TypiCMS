<?php
namespace TypiCMS\Modules\Files\Services\Form;

use TypiCMS\Services\Validation\AbstractLaravelValidator;

class FileFormLaravelValidator extends AbstractLaravelValidator
{

    /**
     * Validation rules
     *
     * @var Array
     */
    protected $rules = array(
        'file' => 'mimes:jpeg,gif,png,pdf|max:2000',
    );
}
