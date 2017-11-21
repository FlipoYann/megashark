<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Phinxlog Controller
 *
 *
 * @method \App\Model\Entity\Phinxlog[] paginate($object = null, array $settings = [])
 */
class PhinxlogController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $phinxlog = $this->paginate($this->Phinxlog);

        $this->set(compact('phinxlog'));
        $this->set('_serialize', ['phinxlog']);
    }

    /**
     * View method
     *
     * @param string|null $id Phinxlog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phinxlog = $this->Phinxlog->get($id, [
            'contain' => []
        ]);

        $this->set('phinxlog', $phinxlog);
        $this->set('_serialize', ['phinxlog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phinxlog = $this->Phinxlog->newEntity();
        if ($this->request->is('post')) {
            $phinxlog = $this->Phinxlog->patchEntity($phinxlog, $this->request->getData());
            if ($this->Phinxlog->save($phinxlog)) {
                $this->Flash->success(__('The phinxlog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phinxlog could not be saved. Please, try again.'));
        }
        $this->set(compact('phinxlog'));
        $this->set('_serialize', ['phinxlog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Phinxlog id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phinxlog = $this->Phinxlog->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phinxlog = $this->Phinxlog->patchEntity($phinxlog, $this->request->getData());
            if ($this->Phinxlog->save($phinxlog)) {
                $this->Flash->success(__('The phinxlog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phinxlog could not be saved. Please, try again.'));
        }
        $this->set(compact('phinxlog'));
        $this->set('_serialize', ['phinxlog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Phinxlog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phinxlog = $this->Phinxlog->get($id);
        if ($this->Phinxlog->delete($phinxlog)) {
            $this->Flash->success(__('The phinxlog has been deleted.'));
        } else {
            $this->Flash->error(__('The phinxlog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
