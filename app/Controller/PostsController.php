<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostsController
 *
 * @author Eduardo
 */
class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Posts';
    
    function index(){
        $this->set('posts',$this->Post->find('all'));
    }
    
    public function view($id = null){
        $this->Post->id = $id;
        $this->set('post',$this->Post->read());
    }
    
    public function add(){
        if($this->request->is('post')){
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash("Seu post foi salvo com sucesso.");
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    function edit($id = null){
        $this->Post->id = $id;
        if($this->request->is('get')){
            $this->request->data = $this->Post->read();
        } else {
            $this->Post->save($this->request->data);
            $this->Session->setFlash("Seu Post foi atualizado com sucesso.");
            $this->redirect(array('action' , 'index'));
        }
    }
}
