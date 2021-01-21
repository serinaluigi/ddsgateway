<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Response; // Response Components
    use App\Traits\ApiResponser; // <-- use to standardizedour code for api response
    use Illuminate\Http\Request; // <-- handling http request in lumen
    use App\Services\User1Service; // user1 Services
    use App\Services\User2Service;

    Class User1Controller extends Controller {   
        use ApiResponser;

        /**
         * The service to consume the User1 Microservice
         * @var User1Service
         */
        public $user1Service;

        /**
         * The service to consume the User1 Microservice
         * @var User2Service
         */
        public $user2Service;


        /**
         * Create a new controller instance
         * @return void
         */

        private $request;

        public function __construct(User1Service $user1Service,User2Service $user2Service){ 
            $this->user1Service = $user1Service; 
            $this->user2Service = $user2Service;
        }

        // public function __construct(Request $request){
        //     $this->request = $request;
        // }
        
        // Add User
        public function addUser(Request $request){ 

            $jobid1 =  $this->user1Service->findJobId($request->jobid);
            $jobid2 =  $this->user2Service->findJobId($request->jobid);

            if($jobid1 != null){
                return $this->successResponse($this->user1Service->addUser1($request->all()));
            }else if ($jobid2 != null){
                return $this->successResponse($this->user2Service->addUser2($request->all()));
            }else {
                return $this->errorResponse("JobId Doesnt Exist",404);
            }
            
        }


        // Read Users
        public function getUsers(){
            return $this->successResponse($this->user1Service->obtainUsers1()); 
        }

        // Read one User
        public function getUser($id){
            return $this->successResponse($this->user1Service->obtainUser1($id)); 
        }

        // Update User
        public function updateUser(Request $request, $id){
            return $this->successResponse($this->user1Service->editUser1($request->all(),$id));
        }
        
        // Delete User
        public function deleteUser($id){
            return $this->successResponse($this->user1Service->deleteUser1($id));
        }

    }