<?php
/**
 * Created by PhpStorm.
 * User: TNT
 * Date: 12/13/2015
 * Time: 4:38 PM
 */
namespace App\Repositories;


use App\Task;

class TaskRepository extends AbstractRepository
{
    public $task;
    public function __construct(Task $task)
    {
        $this->task = $task;
        parent::__construct($this->task);
    }

    public function create(array $data)
    {
        $this->task->name = $data['name'];
        $this->task->save();
    }
    public function edit(array $id)
    {

    }


}