<?php

class MainController extends Controller
{

    function render() 
    {
        $this->f3->set('view', 'index.html');
        $template=new Template;
        echo $template->render('layout.htm');
    }

    function displayContacts()
    {
        $contacts = new Contacts($this->db);
        
        $this->f3->set('contacts', $contacts->all());
        $this->f3->set('view', 'contacts.htm');
        $template=new Template;
        echo $template->render('layout.htm');    
    }

    function viewContacts()
    {
        $contacts = new Contacts($this->db);
        
        $this->f3->set('contacts', $contacts->all());
        $this->f3->set('view', 'user/list.htm');
        $template=new Template;
        echo $template->render('layout.htm');    
    }

}