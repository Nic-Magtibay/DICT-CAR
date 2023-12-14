<?php

namespace App\Controllers;
/**
 * @property IncomingRequest $request 
 */
//use App\Controllers\BaseController;

class Item extends BaseController
{
    public function index(): string
    {
        
        $item_model = new \App\Models\ItemModel();
        $data['items'] = $item_model->findAll();
        return view('item/index', $data);
}
    public function add()
    {
        $data = array();
        helper(['form']);// facilitate the execution of validation in codeigniter

        if($this->request->getMethod()=='post'){
            $post = $this->request->getPost(['name','price','description']);
            $rules=[
                'name' =>['label'=> 'Item name', 'rules' => 'required'],
                'price' =>['label'=> 'Price', 'rules' => 'required'],
                'description' =>['label'=> 'Description', 'rules' => 'required']
            ];
            if(! $this->validate($rules))
            {
                $data['validation'] = $this->validator;
            }else {
                $item_model = new \App\Models\ItemModel();
                $item_model->save($post);
                return redirect()->to('item/index');
            }
        }
        return view('item/add',$data);
    }
 

    public function view($id)
    {
        $item_model = new \App\Models\ItemModel();
        $data['item']= $item_model->find($id);
        return view('item/view',$data);
    }


    public function edit($id)
    {
        helper(['form']);// facilitate the execution of validation in codeigniter

        if($this->request->getMethod()=='post'){
            $post = $this->request->getPost(['name','price','description']);
            $rules=[
                'name' =>['label'=> 'Item name', 'rules' => 'required'],
                'price' =>['label'=> 'Price', 'rules' => 'required'],
                'description' =>['label'=> 'Description', 'rules' => 'required']
            ];
            if(! $this->validate($rules))
            {
                $data['validation'] = $this->validator;
            }else {
                $item_model = new \App\Models\ItemModel();
                $item_model->update($id,$post);
                return redirect()->to('item/index');
            }
        }
        $item_model = new \App\Models\ItemModel();
        $data['item'] = $item_model->find($id);
        return view('item/edit',$data);
    }

    public function delete($id)
    {
        
        if($this->request->getMethod()=='post'){
            
                $item_model = new \App\Models\ItemModel();
                $item_model->delete($id);
                return redirect()->to('item/index');
            }
        
        $item_model = new \App\Models\ItemModel();
        $data['item'] = $item_model->find($id);
        return view('item/delete',$data);


    }

}