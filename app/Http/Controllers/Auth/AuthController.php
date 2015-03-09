<?php namespace SimdesApp\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use SimdesApp\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
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
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var OrganisasiRepository
     */
    protected $organisasi;

    /**
     * @param Guard                $auth
     * @param UserRepository       $user
     * @param OrganisasiRepository $organisasi
     */
    public function __construct(Guard $auth, UserRepository $user, OrganisasiRepository $organisasi)
    {
        $this->auth = $auth;
        $this->user = $user;
        $this->organisasi = $organisasi;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Post the login session
     *
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function postLogin()
    {
        $credentials = $this->inputOnly(['password', 'email']);
        $remember = $this->input('remember', true);
        if (\Auth::attempt($credentials, $remember)) {
            $user_id = \Auth::user()->_id;
            $organisasi_id = \Auth::user()->organisasi_id;

            if ($organisasi_id == '') {
                \Session::put('desa', 'BPMD');
            } else {
                $organisasi = $this->organisasi->findById($organisasi_id);

                \Session::put('desa', $organisasi->desa);
            }

            \Session::put('nama', \Auth::user()->nama);
            \Session::put('level', \Auth::user()->level);
            \Session::put('avatar', \Auth::user()->avatar);
            \Session::put('organisasi_id', \Auth::user()->organisasi_id);
            \Session::put('user_id', $user_id);

            $level = $this->getLevel();
            if ($level >= 200) {
                return redirect('/');
            }

            return redirect('/front');
        }

        // set response with flash message
        return $this->redirectBack(['login_errors' => true]);
    }

    /**
     * Destroy the session login
     *
     * @return mixed
     */
    public function getLogout()
    {
        \Auth::logout();

        return $this->redirectURLTo('login');
    }
}
