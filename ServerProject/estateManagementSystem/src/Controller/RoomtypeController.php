<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Roomtype Controller
 *
 * @property \App\Model\Table\RoomtypeTable $Roomtype
 *
 * @method \App\Model\Entity\Roomtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoomtypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $roomtype = $this->paginate($this->Roomtype);

        $this->set(compact('roomtype'));
    }

    /**
     * View method
     *
     * @param string|null $id Roomtype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roomtype = $this->Roomtype->get($id, [
            'contain' => []
        ]);

        $this->set('roomtype', $roomtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roomtype = $this->Roomtype->newEntity();
        if ($this->request->is('post')) {
            $roomtype = $this->Roomtype->patchEntity($roomtype, $this->request->getData());
            if ($this->Roomtype->save($roomtype)) {
                $this->Flash->success(__('The roomtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The roomtype could not be saved. Please, try again.'));
        }
        $this->set(compact('roomtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Roomtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roomtype = $this->Roomtype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roomtype = $this->Roomtype->patchEntity($roomtype, $this->request->getData());
            if ($this->Roomtype->save($roomtype)) {
                $this->Flash->success(__('The roomtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The roomtype could not be saved. Please, try again.'));
        }
        $this->set(compact('roomtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Roomtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roomtype = $this->Roomtype->get($id);
        if ($this->Roomtype->delete($roomtype)) {
            $this->Flash->success(__('The roomtype has been deleted.'));
        } else {
            $this->Flash->error(__('The roomtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
