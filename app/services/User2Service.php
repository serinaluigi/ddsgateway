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

        public function __construct(){
            $this->baseUri = config('services.users2.base_uri');
        }
        public function addUser2($data){
            return $this->performRequest('POST','/', $data);
        }
        public function obtainUsers2(){
            return $this->performRequest('GET','/users');
        }
        public function obtainUser2($id){
            return $this->performRequest('GET',"/{$id}");
        }
        public function editUser2($data,$id){
            return $this->performRequest('PUT',"/users2/put/{$id}", $data);
        }
        public function deleteUser2($id){
            echo $id;
            return $this->performRequest('DELETE',"/users2/delete/{$id}");
        }
    }