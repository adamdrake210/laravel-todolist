<?php namespace Acme\Services;

use Acme\Validators\TaskValidator;
use Acme\Validators\ValidationException;
use Task;

class TaskCreatorService {

    protected $validator;

    public function __construct(TaskValidator $validator)
    {
        $this->validator = $validator;
    }


    public function make(array $attributes)
    {
        // determine whether data is valid
        if ($this->validator->isValid($attributes))
        {
            Task::create([
                'title'   => $attributes['title'],
                'body'    => $attributes['body'],
                'user_id' => $attributes['assign']
            ]);

            return true;
        }
        // If not throw exception
        throw new ValidationException('Task validation fucked up', $this->validator->getErrors());
    }

}