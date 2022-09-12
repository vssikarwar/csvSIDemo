<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Import method
     */
    public function import()
    {
        $this->viewBuilder()->layout(false);

        if($this->request->is('post'))
        {
            $i = 0;
            $file = $this->request->data['file'];
            $validateCsv = ['text/x-comma-separated-values', 'text/comma-separated-values', 
            'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 
            'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', '
            text/plain'];

            if(!empty($file['name']) && in_array($file['type'], $validateCsv))
            {
                if(is_uploaded_file($file['tmp_name']))
                {
                    $errors = [];

                    //open csv in read only mode
                    $csvFile = fopen($file['tmp_name'], 'r');
                    //skip line
                    $head = fgetcsv($csvFile);
                    for($j=0; $j<4; $j++)
                    {
                        $head[$j] = strtolower($head[$j]);
                    }
                    $headSheet = ['name','email','phone','age'];

                    if($headSheet != $head)
                    {
                        $errors[] = "Head Fields are not matching.";
                    }

                    if (empty($errors))
                    {
                        // Parse data from CSV file line by line
                        while(($line = fgetcsv($csvFile)) !== FALSE)
                        {
                            //Get row data
                            $name  = $line[0];
                            $email  = strtolower($line[1]);
                            $phone  = $line[2];
                            $age = $line[3];
                            
                            //Name validations
                            if (!preg_match ("/^[a-z A-z]*$/", $name) ) 
                            {
                                $errors[] = "Please enter a valid name in row ".$i;
                            }

                            //email validations
                            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
                            if (!preg_match ($pattern, $email) )
                            {
                                $errors[] = "Please enter a valid email in row ".$i;
                            }

                            //phone validations
                            if (!preg_match ("/^[0-9]*$/", $phone) )
                            {
                                $errors[] = "Please enter a valid phone number in row ".$i."<br>";
                            }

                            //age validations
                            if(!is_numeric($age) || $age > 200)
                            {
                                $errors[] = "Please enter a valid age in row ".$i;
                            }

                            if (empty($errors))
                            {
                                $data = $this->Users->query();

                                $queryData = $this->Users->find('all')->where(['email'=>$email])->toArray();
                                $i++;

                                if($queryData)
                                {
                                    echo "email in row ".$i." already exists <br>"; 
                                }
                                else
                                {
                                    $data->insert(['name','email','phone','age','created','modified'])
                                    ->values(['name'=>$line[0],'email'=>$line[1],'phone'=>$line[2],'age'=>$i,'created'=>date('Y-m-d h:i'),'modified'=>date('Y-m-d h:i')])
                                    ->execute();
                                }
                            }
                            else
                            {
                                for($i=0; $i<count($errors); $i++)
                                {
                                    echo $errors[$i] . "<br>";
                                }
                            }

                        }
                    }
                    else
                    {
                        for($i=0; $i<count($errors); $i++)
                        {
                            echo $errors[$i] . "<br>";
                        }
                    }
                }
            }
        }
    }
}
