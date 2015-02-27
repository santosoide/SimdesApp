<?php namespace SimdesApp\Http\Controllers\Auth;

use SimdesApp\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use SimdesApp\Repositories\Organisasi\OrganisasiRepository;
use SimdesApp\Repositories\User\UserRepository;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    protected $user;

    protected $organisasi;

    public function __construct(Guard $auth, Registrar $registrar, UserRepository $user, OrganisasiRepository $organisasi)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->user = $user;
        $this->organisasi = $organisasi;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

//    /**
//     * Post login
//     *
//     * @return mixed
//     */
//    public function postLogin()
//    {
//        $credentials = $this->inputOnly(['password', 'email']);
//        $remember = $this->input('remember', true);
//
//        if (\Auth::attempt($credentials, $remember)) {
//            $user_id = \Auth::user()->_id;
//            $user = $this->user->findById($user_id);
//
//            if ($user->organisasi_id == '') {
//                \Session::put('desa', 'BPMD');
//            } else {
//                $organisasi = $this->organisasi->findById($user->organisasi_id);
//
//                \Session::put('desa', $organisasi->desa);
//            }
//
//            \Session::put('nama', $user->nama);
//            \Session::put('level', $user->level);
//            \Session::put('avatar', $user->avatar);
//            \Session::put('organisasi_id', $user->organisasi_id);
//            \Session::put('user_id', $user_id);
//
//            $level = $this->getLevel();
//            if ($level >= 200) {
//                //return $this->redirectURLTo('/');
//                return [
//                    'success' => true,
//                    'message' => [
//                        'msg' => 'Backoffice',
//                    ]];
//            }
//            //return $this->redirectURLTo('front');
//            return [
//                'success' => true,
//                'message' => [
//                    'msg' => 'Frontoffice',
//                ]];
//        }
//
//        // send error login
//        //return $this->redirectBack(['login_errors' => true]);
//        return [
//            'success' => false,
//            'message' => [
//                'msg' => 'Error',
//            ]];
//    }

    public function postLogin()
    {
        if (\Auth::attempt(['email' => $this->input('email'), 'password' => $this->input('password')]))
        {
            $user_id = \Auth::user()->_id;
            $user = $this->user->findById($user_id);

            if ($user->organisasi_id == '') {
                \Session::put('desa', 'BPMD');
            } else {
                $organisasi = $this->organisasi->findById($user->organisasi_id);

                \Session::put('desa', $organisasi->desa);
            }

            \Session::put('nama', $user->nama);
            \Session::put('level', $user->level);
            \Session::put('avatar', $user->avatar);
            \Session::put('organisasi_id', $user->organisasi_id);
            \Session::put('user_id', $user_id);

            $level = $this->getLevel();
            if ($level >= 200) {
                //return $this->redirectURLTo('/');
                return [
                    'success' => true,
                    'message' => [
                        'msg' => 'Backoffice',
                    ]];
            }
            //return $this->redirectURLTo('front');
            return [
                'success' => true,
                'message' => [
                    'msg' => 'Frontoffice',
                ]];
        }
        // send error login
        //return $this->redirectBack(['login_errors' => true]);
        return [
            'success' => false,
            'message' => [
                'msg' => 'Error',
            ]];
    }
}
