<?php

namespace Vendor\CrudPackage\Controllers;

use CodeIgniter\Controller;

class CrudController extends Controller
{
    protected $model;

    public function __construct()
    {
        $modelName = $this->request->uri->getSegment(2);
        $modelClass = 'App\\Models\\' . ucfirst($modelName) . 'Model';

        if (!class_exists($modelClass)) {
            throw new \Exception("Model not found: " . $modelClass);
        }

        $this->model = new $modelClass();
    }

    public function index()
    {
        $data['items'] = $this->model->findAll();
        return view('Vendor\CrudPackage\Views\index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();
            $this->model->insert($data);
            return redirect()->to('/crud/' . strtolower(class_basename($this->model)));
        }
        return view('Vendor\CrudPackage\Views\create');
    }

    public function edit($id)
    {
        $data['item'] = $this->model->find($id);

        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();
            $this->model->update($id, $data);
            return redirect()->to('/crud/' . strtolower(class_basename($this->model)));
        }

        return view('Vendor\CrudPackage\Views\edit', $data);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/crud/' . strtolower(class_basename($this->model)));
    }
}
