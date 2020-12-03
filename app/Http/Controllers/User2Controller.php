<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;
    use App\Services\User2Service;

    Class User2Controller extends Controller {   
        use ApiResponser;

        /**
         * The service to consume the User1 Microservice
         * @var User2Service
         */
        public $user2Service;
        /**
         * Create a new controller instance
         * @return void
         */

      

        public function __construct(User2Service $user2Service){
            $this->user2Service = $user2Service;
        }
    
        public function getUsers(){
            return $this->successResponse($this->user2Service->obtainUsers2());
        }
    
        public function index()
        {
            return $this->successResponse($this->user2Service->obtainUsers2());
        }
    
        public function addUser(Request $request)
        {
            return $this->successResponse($this->user2Service->addUser2($request->all()));//, Response::HTTP_CREATED//
        }
    
        public function show($id){
            return $this->successResponse($this->user2Service->obtainUser2($id));
        }
    
        public function update(Request $request, $id){
            return $this->successResponse($this->user2Service->editUser2($request->all(), $id));
        }
    
        public function delete($id){
            return $this->successResponse($this->user2Service->deleteUser2($id));
        }
    
    }