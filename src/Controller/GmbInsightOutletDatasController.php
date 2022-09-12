<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GmbInsightOutletDatas Controller
 *
 * @property \App\Model\Table\GmbInsightOutletDatasTable $GmbInsightOutletDatas
 *
 * @method \App\Model\Entity\GmbInsightOutletData[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GmbInsightOutletDatasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public $components = ['ImportExport'];

    public function index()
    {
        $this->paginate = [
            'contain' => [],
        ];
        $gmbInsightOutletDatas = $this->paginate($this->GmbInsightOutletDatas);

        $this->set(compact('gmbInsightOutletDatas'));
    }

    /**
     * View method
     *
     * @param string|null $id Gmb Insight Outlet Data id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gmbInsightOutletData = $this->GmbInsightOutletDatas->get($id, [
            'contain' => [],
        ]);

        $this->set('gmbInsightOutletData', $gmbInsightOutletData);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gmbInsightOutletData = $this->GmbInsightOutletDatas->newEntity();
        if ($this->request->is('post')) {
            $gmbInsightOutletData = $this->GmbInsightOutletDatas->patchEntity($gmbInsightOutletData, $this->request->getData());
            if ($this->GmbInsightOutletDatas->save($gmbInsightOutletData)) {
                $this->Flash->success(__('The gmb insight outlet data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gmb insight outlet data could not be saved. Please, try again.'));
        }
        // $masterOutlets = $this->GmbInsightOutletDatas->MasterOutlets->find('list', ['limit' => 200]);
        // $outlets = $this->GmbInsightOutletDatas->Outlets->find('list', ['limit' => 200]);
        // $locations = $this->GmbInsightOutletDatas->Locations->find('list', ['limit' => 200]);
        $this->set(compact('gmbInsightOutletData'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gmb Insight Outlet Data id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gmbInsightOutletData = $this->GmbInsightOutletDatas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gmbInsightOutletData = $this->GmbInsightOutletDatas->patchEntity($gmbInsightOutletData, $this->request->getData());
            if ($this->GmbInsightOutletDatas->save($gmbInsightOutletData)) {
                $this->Flash->success(__('The gmb insight outlet data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gmb insight outlet data could not be saved. Please, try again.'));
        }
        $this->set(compact('gmbInsightOutletData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gmb Insight Outlet Data id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gmbInsightOutletData = $this->GmbInsightOutletDatas->get($id);
        if ($this->GmbInsightOutletDatas->delete($gmbInsightOutletData)) {
            $this->Flash->success(__('The gmb insight outlet data has been deleted.'));
        } else {
            $this->Flash->error(__('The gmb insight outlet data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function import()
    {
        $this->viewBuilder()->layout(false);
        if($this->request->is('post'))
        {
            $file = $this->request->data['file'];
            $validHead = ["master outlet id","outlet id","search views","total views","visit website", "total phone calls", "queries direct", "queries indirect","views maps","views search","request directions","location name","location id"];
            if(empty($file['name']))
            {
                $data[] = "Please select a .csv format file";
            }
            else
            {
                $data = $this->ImportExport->importFile($file,$validHead);
            }
            for($m=0; $m<count($data); $m++)
            {
                echo $data[$m] . "<br>";
            }

            // if($data['entered']>0)
            // {image.png
            //     echo $data['v'] . " Record(s) entered successfully.";
            // }
            // else
            // {
            //     echo $data['entered'] . " Record(s) entered.";
            // }
        }
    }
}
