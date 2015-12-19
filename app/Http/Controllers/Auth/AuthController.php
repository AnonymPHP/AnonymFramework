<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace App\Http\Controllers\Auth;

use Anonym\Database\Exceptions\QueryException;
use Anonym\Crypt\SecurityKeyGenerator;
use Anonym\Facades\Database;
use Anonym\Mail\DriverInterface;
use Anonym\Route\Controller;
use Anonym\Support\TemplateGenerator;
use Anonym\Facades\Register;
use Anonym\Facades\Element;
use Anonym\Facades\Request;
use Anonym\Facades\Config;
use Anonym\Facades\Crypt;
use Anonym\Facades\Mail;
use Anonym\Support\Str;
use OAuthException;
/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{

    /**
     * create a new user
     *
     * @param array $data
     * @return mixed
     */
    protected function create($data){

        $results = [];

        array_walk($data, function($key, $value) use(&$results){

            $login = Config::get('database.tables.login');
            $table = $login[1];

            if($key === $table){

                $value = Crypt::encode($value);
            }
            $results[] = [$key,$value];
        });

        return Register::register($results);
    }


    /**
     * login a user with username and password
     *
     * @param string $username
     * @param string $password
     * @param bool|false $remember
     * @return mixed
     */
    protected function entry($username, $password, $remember = false){
        return Login::login($username, Crypt::encode($password), $remember);
    }

    /**
     * send forget mail to user
     *
     * @param array $parameters
     * @param string $column
     * @return mixed
     * @throws OAuthException
     * @throws QueryException
     */
    protected function sendForgetMail(array $parameters = [], $column = null)
    {
        $username = isset($parameters['username']) ? $parameters['username']: '';
        $mailDriver = isset($parameters['mail_driver']) ? $parameters['mail_driver'] : 'default';
        $callback = isset($parameters['callback']) ? $parameters['callback'] : 'auth/forget';

        $table = Config::get('database.tables.table');

        $database = Database::table($table);
        $userColumn = null === $column ? first(Config::get('database.tables.login')): $column;


        $userInformation = $database->select(['email', 'id'])->where($userColumn, $username);

        if(!$userInformation->rowCount()){
            throw new OAuthException(sprintf('%s Username is not exists', $username));
        }

        $datas = $userInformation->first();

        // we will find user email now
        $mailAddress = $datas->email;

        $generator = new SecurityKeyGenerator();
        $key = $generator->random($username.$mailAddress);

        $forgets = Database::table('forgets');
        $add = $forgets->insert([
            'key' => $key,
            'user_id' => $datas->id
        ]);

        if (!$add->isSuccess()) {
            throw new QueryException('Forget keys and user_id could not added to database, please try agein later');
        }

        $url = Request::getBaseWithoutQuery();

        if(!Str::endsWith($callback, "/")){
            $callback .= "/";
        }

        $url .= $callback.$key;

        $template = new TemplateGenerator(file_get_contents(RESOURCE.'migrations/forget_mail.php.dist'));
        $content = $template->generate([
            'url' => $url,
            'username' => $username
        ]);

        $yourAddress = config('mail.your_address');
        $send = Mail::send($mailDriver, function(DriverInterface $mail) use($mailAddress, $username, $content, $yourAddress){
            return $mail->from($yourAddress, '')
                ->subject('Password Recovery')
                ->to($mailAddress, $username)
                ->body($content)
                ->send();
        });

        return $send;
    }

    /**
     * determine forget key is exists
     *
     * @param string $key
     * @return mixed
     */
    protected function forgetKeyIsExists($key = ''){
        $table = Element::table('forgets');
        $where = $table->where('key', $key);

        return $where->rowCount() ? $where->fetch():false;
    }
    /**
     * reset  the password
     *
     * @param string $key
     * @param string $newPassword
     * @return bool
     */
    protected function forgetResetPassword($key = '', $newPassword = ''){
        if ($information = $this->forgetKeyIsExists($key)) {
            $userid = $information->user_id;
            $table = Config::get('database.tables.table');
            $user = Element::table($table);

            $findId = $user->find($userid);

            if (!$findId->rowCount()) {
                return false;
            }

            $update = $user->set([
                'password' => Crypt::encode($newPassword)
            ])->update();

            Element::table('forgets')->where('key', $key)->delete();

            return $update ? true:false;
        }else{
            return false;
        }
    }
}
