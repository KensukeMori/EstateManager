<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Resident Controller
 *
 * @property \App\Model\Table\ResidentTable $Resident
 *
 * @method \App\Model\Entity\Resident[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResidentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $resident = $this->paginate($this->Resident);

        $this->set(compact('resident'));
    }

    /**
     * View method
     *
     * @param string|null $id Resident id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resident = $this->Resident->get($id, [
            'contain' => []
        ]);

        $this->set('resident', $resident);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resident = $this->Resident->newEntity();
        if ($this->request->is('post')) {
            $resident = $this->Resident->patchEntity($resident, $this->request->getData());
            if ($this->Resident->save($resident)) {
                $this->Flash->success(__('The resident has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resident could not be saved. Please, try again.'));
        }
        $this->set(compact('resident'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Resident id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resident = $this->Resident->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resident = $this->Resident->patchEntity($resident, $this->request->getData());
            if ($this->Resident->save($resident)) {
                $this->Flash->success(__('The resident has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resident could not be saved. Please, try again.'));
        }
        $this->set(compact('resident'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resident id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resident = $this->Resident->get($id);
        if ($this->Resident->delete($resident)) {
            $this->Flash->success(__('The resident has been deleted.'));
        } else {
            $this->Flash->error(__('The resident could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
