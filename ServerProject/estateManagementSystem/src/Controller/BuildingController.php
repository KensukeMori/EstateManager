<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Building Controller
 *
 * @property \App\Model\Table\BuildingTable $Building
 *
 * @method \App\Model\Entity\Building[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuildingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $building = $this->paginate($this->Building);

        $this->set(compact('building'));
    }

    /**
     * View method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $building = $this->Building->get($id, [
            'contain' => []
        ]);

        $this->set('building', $building);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $building = $this->Building->newEntity();
        if ($this->request->is('post')) {
            $building = $this->Building->patchEntity($building, $this->request->getData());
            if ($this->Building->save($building)) {
                $this->Flash->success(__('The building has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The building could not be saved. Please, try again.'));
        }
        $this->set(compact('building'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $building = $this->Building->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $building = $this->Building->patchEntity($building, $this->request->getData());
            if ($this->Building->save($building)) {
                $this->Flash->success(__('The building has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The building could not be saved. Please, try again.'));
        }
        $this->set(compact('building'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $building = $this->Building->get($id);
        if ($this->Building->delete($building)) {
            $this->Flash->success(__('The building has been deleted.'));
        } else {
            $this->Flash->error(__('The building could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
