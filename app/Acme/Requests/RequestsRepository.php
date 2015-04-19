<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/16/15
 * Time: 5:11 PM
 */
namespace App\Acme\Requests;

use App\Acme\AbstractRepository;
use App\Acme\InterfaceRepository;
use App\Acme\Users\UserRepository;
use App\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestsRepository extends AbstractRepository implements InterfaceRepository{

    public $model;

    public function __construct(Request $model) {

        $this->model = $model;

    }

    public function getProviderRequests($provider_id,$status) {

        /*
         * all requests according to a provider
         * */
        return $this->model->where('provider_id','=',$provider_id)
            ->where('provider_response','=',$status)->take(10)->get();

    }

    public function getCustomerRequests($status) {
        /*
         * all requests according to a customer
         * */
        return $this->model->where('customer_id','=',Auth::id())
            ->where('provider_response','=',$status)->take(10)->get();

    }

    public function getRequest($id)
    {
        if ($this->model->find($id)) {
            return DB::table('requests')->join('users', 'requests.provider_id', '=', 'users.id')
                ->join('users_professions', 'requests.provider_id', '=', 'users_professions.id')
                ->where('requests.id', '=', $id)
                ->select('requests.*', 'users.name', 'users.area')->get();
        }
        return ['No Such Record !!!'];
    }


    public function updateResponse($provider_id,$provider_response,$request_id) {

        if ($this->model->find($request_id)) {

        return DB::table('requests')->where('id','=',$request_id)
                ->where('provider_id','=',$provider_id)
                ->update(['provider_response'=>$provider_response]);
        }

        return ['No Such Record !!!'];
    }

}
