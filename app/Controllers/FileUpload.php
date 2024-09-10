<?php 
namespace App\Controllers;
// use App\Models\FormModel;
use CodeIgniter\RESTful\ResourceController;

class FileUpload extends ResourceController{
    public function index() 
	{
        return view('home');
    }
    function upload() { 
    
         
            $img = $this->request->getFile('file');
            $img->move(WRITEPATH . 'uploads');
    
            $data = [
               'name' =>  $img->getName(),
               'type'  => $img->getClientMimeType()
            ];
    
            print_r('File has successfully uploaded');        
        
    }
}