<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Showtimes Controller
 *
 *
 * @method \App\Model\Entity\Showtime[] paginate($object = null, array $settings = [])
 */
class ShowtimesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        

        $showtimes = $this->paginate = [
            'contain' => ['Movies', 'Rooms']
        ];

        $this->set('showtimes', $this->paginate($this->Showtimes));
        $this->set('_serialize', ['showtimes']);
    }
 
    /**
     * View method
     *
     * @param string|null $id Showtime id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        
        $showtime = $this->Showtimes->get($id, [
            'contain' => ['Movies', 'Rooms']
        ]);

        $this->set('showtime', $showtime);
        $this->set('_serialize', ['showtime']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $showtime = $this->Showtimes->newEntity();
        $movies = $this->Showtimes->Movies->find('List');
        $rooms = $this->Showtimes->Rooms->find('List');
        if ($this->request->is('post')) {
            $showtime = $this->Showtimes->patchEntity($showtime, $this->request->getData());
            if ($this->Showtimes->save($showtime)) {
                $this->Flash->success(__('The showtime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The showtime could not be saved. Please, try again.'));
        }
        
        $this->set(compact('showtime'));
        $this->set(compact('movies'));
        $this->set(compact('rooms'));
        $this->set('_serialize', ['showtime']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Showtime id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movies = $this->Showtimes->Movies->find('List');
        $rooms = $this->Showtimes->Rooms->find('List');
        $showtime = $this->Showtimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $showtime = $this->Showtimes->patchEntity($showtime, $this->request->getData());
            if ($this->Showtimes->save($showtime)) {
                $this->Flash->success(__('The showtime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The showtime could not be saved. Please, try again.'));
        }
        $this->set(compact('rooms'));
        $this->set(compact('movies'));
        $this->set(compact('showtime'));
        $this->set('_serialize', ['showtime']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Showtime id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $showtime = $this->Showtimes->get($id);
        if ($this->Showtimes->delete($showtime)) {
            $this->Flash->success(__('The showtime has been deleted.'));
        } else {
            $this->Flash->error(__('The showtime could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
