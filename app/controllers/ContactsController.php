<?php

 
class ContactsController extends Controller
{
  
    // function render()
    // {

    //     $template=new Template;
    //     echo $template->render('index.html');
    // }

    function beforeroute()
    {
    }

    public function index()
    {
        $Contacts = new Contacts($this->db);
        $this->f3->set('contacts',$Contacts->all());
        $this->f3->set('page_head','Contacts List');
        $this->f3->set('message', $this->f3->get('PARAMS.message'));
        $this->f3->set('view','Contacts/list.htm');
	}

    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $Contacts = new Contacts($this->db);
            $Contacts->add();

            $this->f3->reroute('/user/success/New Contacts Created');
        } else
        {
            $this->f3->set('page_head','Create Contacts');
            $this->f3->set('view','Contacts/create.htm');
        }

    }

    public function update()
    {

        $Contacts = new Contacts($this->db);

        if($this->f3->exists('POST.update'))
        {
            $Contacts->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/success/Contacts Updated');
        } else
        {
            $Contacts->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('Contacts',$Contacts);
            $this->f3->set('page_head','Update Contacts');
            $this->f3->set('view','Contacts/update.htm');
        }

    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $Contacts = new Contacts($this->db);
            $Contacts->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/success/Contacts Deleted');
    }
}