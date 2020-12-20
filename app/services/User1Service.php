<?php
    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class User1Service{
        use ConsumesExternalService;
        /**
         * The base uri to consume the User1 Service
         * @var string
         */
        public $baseUri;

        public $secret;

        public function __construct(){
            $this->baseUri = config('services.users1.base_uri');
            $this->secret = config('services.users1.secret');

        }
        public function addUser($data){
            return $this->performRequest('POST','/', $data);
        }
        public function obtainUsers1(){
            return $this->performRequest('GET','/users');
        }
        public function obtainUser1($id){
            return $this->performRequest('GET',"/{$id}");
        }
        public function editUser1($data,$id){
            return $this->performRequest('PUT',"/users1/put/{$id}", $data);
        }
        public function deleteUser1($id){
            echo $id;
            return $this->performRequest('DELETE',"/users1/delete/{$id}");
        }



    }
