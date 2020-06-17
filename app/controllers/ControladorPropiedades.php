<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Propiedad;

class ControladorPropiedades extends Controller
{
    public function __construct()
    {
        $this->model = new Propiedad();
    }

    public function index()
    {
        $tasks = $this->model->get();
        return view('tasks', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function save()
    {
        $task = [
            'description' => $_POST['description'],
            'completed' => (isset($_POST['completed'])) ? 1 : 0
        ];
        $this->model->insert($task);
        return redirect('tasks');
    }
}
