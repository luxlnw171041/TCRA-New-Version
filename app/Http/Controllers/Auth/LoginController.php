<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
  
class LoginController extends Controller
{
  
    use AuthenticatesUsers;
    
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {   
        $input = $request->all();

        $backurl = $_SERVER['HTTP_REFERER'] ;

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            $data_user = Auth::user();

            if ($data_user->member_status !== 'Active') {
                Auth::logout();
                return redirect('login_fail');
            }else{

                if ( !empty($data_user->member_count_login) ) {
                    $count_login = intval($data_user->member_count_login) + 1 ;
                }else{
                    $count_login = 1 ;
                }

                DB::table('users')
                ->where([ 
                        ['id', $data_user->id],
                    ])
                ->update([
                        'member_count_login' => $count_login,
                    ]);

                return redirect()->route('home');

            }

            
        }else{
            return redirect($backurl)->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}