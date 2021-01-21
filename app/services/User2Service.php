<?php
    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class User2Service{
        use ConsumesExternalService;
        /**
         * The base uri to consume the User1 Service
         * @var string
         */
        public $baseUri;
        public $secret;

        public function __construct(){
            $this->baseUri = config('services.users2.base_uri');
            $this->secret = config('services.users2.secret');
        }

        public function obtainUsers2(){
            return $this->performRequest('GET','/api/users');
        }

        public function obtainUser2($id){
            return $this->performRequest('GET',"/api/users/{$id}");
        }

        public function editUser2($data,$id){
            return $this->performRequest('PUT',"/api/users/update/{$id}", $data);
        }

        public function deleteUser2($id){
            return $this->performRequest('DELETE',"/api/users/delete/${id}");
        }

        public function addUser2($data){
            return $this->performRequest('POST',"/api/users/add", $data);
        }

        public function findJobId($id){
        
            return $this->performRequest('GET',"/api/userjob/${id}");
           
        }
    }